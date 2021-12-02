<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;

use App\Http\Requests\EventRequest;
use App\Http\Requests\InvitationRequest;

use App\Http\Resources\EventResource;
use App\Http\Resources\EventDetailsResource;
use App\Http\Resources\IndividualResource;
use App\Http\Resources\SimpleEventResource;
use App\Http\Resources\InvitationResource;

use App\Models\Member;
use App\Notifications\EventSharedNotification;

use Excel;
use App\Exports\EventExport;
use App\Models\TicketCategory;
use App\Models\EventRequest as Invitation;

use App\Handlers\NotificationHandler;
use App\Handlers\EmailHandler;
use App\Http\Resources\NotificationResource;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    use NotificationHandler, EmailHandler;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($userid = null)
    {
        if ($userid == null) {
            $events = Event::where('status', 'open')->latest()->paginate(10);
        } else {
            $events = Event::where('user_id', Auth::user()->id)->latest()->paginate(10);
        }

        return response([
            'status' => true,
            'message' => 'Events',
            'data' => EventResource::collection($events)
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $request->validated();


        try {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = sha1(time()) . '.' . $extension;
                $path = public_path() . '/events';
                $file->move($path, $fileName);
                $saved_path = 'events/' . $fileName;
            }

            $event = Event::create([
                'name' => $request->name,
                'type' => $request->type,
                'venue' => $request->venue,
                'image' => $saved_path ?? null,
                'isFree' => $request->isFree,
                'price' => ($request->pricing == 'multiple' || $request->isFree) ? 0 : $request->price,
                'pricing' => $request->pricing,
                'tickets' => $request->tickets,
                'user_id' => Auth::user()->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'category_id' => $request->category_id,
                'unique_id' => $this->generateUniq(),
                'description' => $request->description
            ]);

            if ($request->pricing == 'multiple') {
                foreach ($request->ticketCategories as $key => $row) {
                    TicketCategory::create([
                        'name' => $row['name'],
                        'price' => $row['price'],
                        'event_id' => $event->id
                    ]);
                }
            }

            return response([
                'status' => true,
                'message' => 'Event created Successfully',
                'data' => new SimpleEventResource($event)
            ]);
        } catch (\Exception $e) {
            if (isset($event)) {
                $event->delete();
            }

            throw $e;
        }
    }

    public function userEvents()
    {
        $events = Event::where('user_id', Auth::user()->id)->latest()->paginate();
        return $this->jsonPaginatedResponse('My Events', SimpleEventResource::collection($events));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response([
            'status' => true,
            'message' => 'Event',
            'data' => new EventDetailsResource($event)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $request->validated();
        $event  = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = sha1(time()) . '.' . $extension;
            $path = public_path() . '/events';
            $file->move($path, $fileName);
            $saved_path = 'events/' . $fileName;

            $old_file = public_path() . '/events/' . $event->image;
            if (file_exists($old_file)) {
                unlink($old_file);
            }
        }

        try {
            $event->update([
                'name' => $request->name,
                'type' => $request->type,
                'venue' => $request->venue,
                'image' => $saved_path ?? null,
                'isFree' => $request->isFree,
                'price' => ($request->pricing == 'multiple' || $request->isFree) ? 0 : $request->price,
                'pricing' => $request->pricing,
                'tickets' => $request->tickets,
                'user_id' => Auth::user()->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'category_id' => $request->category_id,
                'unique_id' => $this->generateUniq(),
                'description' => $request->description
            ]);

            if ($request->pricing == 'multiple') {
                $data = [];
                foreach ($request->ticketCategories as $key => $row) {
                    $data['name'] = $row['name'];
                    $data['price'] = $row['price'];
                    TicketCategory::where('event_id', $event->id)->update([
                        'name' => $row['name'],
                        'price' => $row['price'],
                    ]);
                }
            }


            return response([
                'status' => true,
                'message' => 'Event updated successfully',
                'data' => new SimpleEventResource($event)
            ]);
        } catch (Exception $e) {
            return response([
                'status' => false,
                'message' => 'Event could not be updated',
            ]);
        }
    }

    public function updateRequestStatus($id, $status)
    {
        $iv = Invitation::findOrFail($this->decodeId($id));
        $iv->status = $status;
        $iv->save();

        return response([
            'status' => true,
            'message' => 'Request status updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($this->decodeId($id));
        $event->delete();

        return response([
            'status' => true,
            'message' => 'Event deleted Successfully'
        ]);
    }

    public function closeEvent($id)
    {
        $event = Event::findOrFail($this->decodeId($id));
        $event->status = 'closed';
        $event->save();

        return response([
            'status' => true,
            'message' => 'Event closed Successfully'
        ]);
    }

    public function shareEvent($id)
    {
        $event = Event::findOrFail($this->decodeId($id));
        $user = Auth::user();
        $members = Member::where('owner_id', Auth::user()->id)
            ->where('status', 'active')->get();
        try {
            foreach ($members as $key => $row) {
                $user = User::findOrFail($row->user_id);
                $message = array(
                    'body' => 'Event with wallID: ' . $this->encodeId($event->id) . ' has been shared with you!',
                    'from' => Auth::user()->email,
                    'subject' => 'Event Notification'
                );
                $user->notify(new EventSharedNotification($message));
            }

            return response([
                'status' => true,
                'message' => 'Event Shared Successfully'
                // 'data' => 
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    public function allMyEvents()
    {
        return response([
            'status' => true,
            'message' => 'My Events',
            'data' => Event::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function invite(InvitationRequest $request)
    {
        $request->validated();
        // dd($request->event_id);
        $event = Event::where('unique_id', $request->event_id)->first();

        if ($event->user_id == Auth::user()->id) {

            $user = User::where('username', $request->username)->first();
            $invitation = Invitation::firstOrCreate([
                'event_id' => $event->id,
                'user_id' => $user->id
            ]);

            try {
                $this->sendInvitationNotification($user, $event);
            } catch (\Exception $e) {
            }

            return response([
                'status' => true,
                'data' => new InvitationResource($invitation),
                'message' => 'Invitation sent successfully'
            ]);
        } else {
            return response([
                'status' => false,
                'message' => 'You cannot invite to this Event'
            ]);
        }
    }

    public function invites()
    {
        $invites = Invitation::where('user_id', Auth::user()->id)->latest()->paginate();
        return $this->jsonPaginatedResponse('Event Invitations', InvitationResource::collection($invites));
    }

    public function eventRequests($uniqidID)
    {
        $event = Event::where('unique_id', $uniqidID)->first();
        if ($event) {
            $ir = Invitation::where('event_id', $event->id)
                ->latest()->paginate();

            return $this->jsonPaginatedResponse('Event Invitation Requests', InvitationResource::collection($ir));
        } else {
            return response([
                'status' => false,
                'message' => 'Event not found'
            ]);
        }
    }

    public function upcomingEvents()
    {
        $events = Event::where('status', 'open')->where('start_date', '>', date('Y-m-d'))->latest()->paginate(10);
        return response([
            'status' => true,
            'message' => 'Events',
            'data' => EventResource::collection($events)
        ]);
    }

    public function unreadNotification()
    {
        try {
            $notifications = auth()->user()->unreadNotifications()->where('type', 'App\Notifications\InvitationNotification')->get();
            return response([
                'status' => true,
                'message' => 'Event notifications',
                'data' => NotificationResource::collection($notifications)
            ]);
        } catch (Exception $e) {
            return;
        }
    }


    public function categories()
    {
        $categories = Category::all();
        return response([
            'status' => true,
            'message' => 'categories',
            'data' => $categories
        ]);
    }



}
