<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Event;
use App\Models\Member;
use App\Models\Individual;
use App\Models\Organization;
use App\Http\Resources\MemberResource;
use App\Http\Resources\SubscriptionResource;
use App\Http\Resources\UserResource;
use App\Models\Subscription;
use App\Models\User;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:individual');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allOrgs = Member::where('individual_id', Auth::user()->typeData->id)
            ->where('status', '!=', 'pending')->count();

        $pendingOrgs = Member::where('status', 'pending')
            ->where('individual_id', Auth::user()->typeData->id)
            ->latest()
            ->limit(10)->get();

        $events = Event::where('user_id', Auth::user()->id)->count();

        return response([
            'status' => true,
            'message' => 'Info',
            'data' => [
                'totalOrgs' => $allOrgs,
                'organizations' => $pendingOrgs,
                'totalEvents' => $events
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'dob' => 'required',
            'bio' => 'required'
        ]);


        $individual = Individual::where('user_id', Auth::user()->id)->first();

        if ($individual) {
            $individual->firstname = $request->firstname;
            $individual->lastname = $request->lastname;
            $individual->dob = $request->dob;
            $individual->bio = $request->bio;

            $individual->save();

            return response([
                'status' => true,
                'message' => 'Profile updated successfully',
            ]);
        }

        return response([
            'status' => false,
            'message' => 'Profile could not be updated',
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
        //
    }

    public function organizations($status = null)
    {
    //    if ($status == null) {
    //         $m = Member::where('individual_id', Auth::user()->typeData->id)
    //             ->where('status', '!=', 'pending')
    //             ->latest()
    //             ->paginate(10);
    //     }
    //     else {
        $m = Member::where('individual_id', Auth::user()->typeData->id)
            ->where('status', 'pending')
            ->latest()
            ->paginate();
        // }

        return response([
            'status' => true,
            'message' => 'Organizations',
            'data' => MemberResource::collection($m)
        ]);
        
    }

    public function joinOrganization(Request $request)
    {
        $request->validate([
            'name' => 'required|string']);

        $org = Organization::where('name', $request->name)->first();
        if ($org) {
            
            $member = Member::where('org_id', $org->id)
                ->where('individual_id', Auth::user()->typeData->id)
                ->first();

            if ($member) {
                if ($member->status == 'pending') {
                    return response([
                        'status' => false,
                        'message' => 'You already send a request to this Organization'
                    ]);
                }
                else {
                    return response([
                        'status' => false,
                        'message' => 'You already send a member of this Organization'
                    ]);
                }
            }

            $member = Member::create([
                'org_id' => $org->id,
                'status' => 'pending',
                'individual_id' => Auth::user()->typeData->id
            ]);

             return response([
                'status' => true,
                'message' => 'Membership Request sent successfully']);
        }

        return response([
            'status' => false,
            'message' => 'Organization not found'
        ]);
    }





    //  Get my organisations (for individual users)
    // response should include, for each organization
    // public function getMyOrganization(){
    //     $m = Organization::whereHas('user.individual', function($q){
    //         $q->where('user_id', Auth::user()->typeData->id);

    //     })->paginate(10);

    //     return response([
    //         'status' => true,
    //         'message' => 'Organizations',
    //         'data' => MemberResource::collection($m)
    //     ]);
    // }


}
