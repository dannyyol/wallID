<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Member;
use App\Models\Organization;
use App\Http\Resources\MemberResource;

use App\Handlers\NotificationHandler;
use App\Http\Requests\MemberRequest;
use App\Models\Subscription;
use Exception;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    use NotificationHandler;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->status) {
            $members = Member::where('organization_id', Auth::user()->organization->id)
                ->where('status', 'pending')
                ->get();
        } else {
            $members = Member::where('organization_id', '=', auth()->user()->organization->id)->get();
        }
        return response([
            'status' => true,
            'message' => 'Members',
            'data' => MemberResource::collection($members)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $request->validated();

        try {
            $member = Member::firstOrCreate([
                'individual_id' => $request->individual_id,
                'organization_id' => Auth::user()->organization->id,
                'status' => $request->status,
                'amount_paid' => $request->amount_paid,
                'expiry_date' => $request->expiry_date,
                'subscription_id' => $request->subscription_id,
            ]);

            return response([
                'status' => true,
                'message' => 'Member added successfully',
                'data' => new MemberResource($member)
            ]);
        } catch (Exception $e) {
            return response([
                'status' => false,
                'message' => 'Member could not be added',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($this->decodeId($id));
        return response([
            'status' => false,
            'message' => 'Member fetched successfully',
            'data' => new MemberResource($member)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        $request->validated();
        try {
            $model = Member::findOrFail($id);
            $member = $model->update([
                'individual_id' => $request->individual_id,
                'organization_id' => Auth::user()->organization->id,
                'status' => $request->status,
                'amount_paid' => $request->amount_paid,
                'expiry_date' => $request->expiry_date,
                'subscription_id' => $request->subscription_id,
            ]);

            return response([
                'status' => true,
                'message' => 'Member updated successfully',
                'data' => new MemberResource($model)
            ]);
        } catch (Exception $e) {
            return response([
                'status' => false,
                'message' => 'Member could not be updated',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id)
    {

        $org = Organization::where('user_id', Auth::user()->id)->first();
        $member = Member::where('organization_id', $org->id)
            ->where('id', $id)->first();

        if ($member) {

            $member->status = 'approved';
            $member->save();

            try {
                $user = User::findOrFail($member->user_id);
                $this->sendApprovalNotification($user);
            } catch (\Exception $e) {
                info('Error 101 ' . $e->getMessage());
            }

            return response([
                'status' => true,
                'message' => 'Member approved successfully'
            ]);
        }

        return response([
            'status' => false,
            'message' => 'Member ID not recognized'
        ]);
    }

    public function updateStatus($id, $status)
    {
        $org = Organization::where('user_id', Auth::user()->id)->first();

        $member = Member::where('owner_id', $org->id)
            ->where('id', $this->decodeId($id))
            ->where('type', 'organization')->first();

        if ($member) {

            $member->status = $status;
            $member->save();

            return response([
                'status' => true,
                'message' => 'Member status updated successfully'
            ]);
        }

        return response([
            'status' => false,
            'message' => 'Member ID not recognized'
        ]);
    }

    public function requests()
    {
        $requests = Member::where('organization_id', Auth::user()->typeData->id)
            ->where('status', 'pending')
            ->latest()
            ->paginate();

        return $this->jsonPaginatedResponse('Membership Requests', MemberResource::collection($requests));
    }

    public function addApprove(Request $request)
    {

        $request->validate([
            'user' => 'required',
            'category_id' => 'required'
        ]);

        $member = Member::firstOrCreate(
            [
                'org_id' => Auth::user()->typeData->id,
                'individual_id' => $request->individual_id,
            ],
            [
                'status' => 'approved',
                'category_id' => $request->category_id
            ]
        );

        return response([
            'status' => false,
            'message' => 'Member added successfully',
            'data' => new MemberResource($member)
        ]);
    }




    // Individual member(send join request)
    public function createRequest(MemberRequest $request)
    {
        $request->validated();

        $sub = Subscription::find($request->subscription_id);
        if($sub->price != $request->amount_paid){
            return response([
                'status' => false,
                'message' => 'The amount you\'re paying is not equal with this subscription plan',
            ]);
        } 
        try {
            $member = Member::firstOrCreate([
                'individual_id' => Auth::user()->typeData->id,
                'organization_id' => $request->organization_id,
                'status' => 'pending',
                'amount_paid' => $request->amount_paid,
                'subscription_id' => $request->subscription_id,
            ]);

            return response([
                'status' => true,
                'message' => 'Membership request sent',
                'data' => new MemberResource($member)
            ]);
        } catch (Exception $e) {
            return response([
                'status' => false,
                'message' => 'Member could not be added',
            ]);
        }
    }
}
