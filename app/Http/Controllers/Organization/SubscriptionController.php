<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscribedUserResource;
use Illuminate\Http\Request;

// use Auth;
use App\Models\Subscription;
use App\Http\Resources\SubscriptionResource;
use App\Models\SubscribedUser;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class SubscriptionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = Subscription::with(['expired_subscribers'=> function($q){
            $q->where('expiry_date','<', date('Y-m-d'));
        },
        'valid_subscribers'=> function($q){
            $q->where('expiry_date','>', date('Y-m-d'));
        },
        ])->where('organization_id', Auth::user()->typeData->id)
            ->latest()
            ->paginate(10);

        return $this->jsonPaginatedResponse('Subscriptions', SubscriptionResource::collection($subs));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionRequest $request)
    {
        $request->validated();


        try{
            $sub = Subscription::create([
                'name' => $request->name,
                'status' => $request->status ?? 'active',
                'price' => $request->price,
                'validity' => $request->validity,
                'organization_id' => Auth::user()->organization->id,
    
            ]);
            return response([
                'status' => true,
                'message' => 'Subscription added successfully',
                'data' => new SubscriptionResource($sub)
            ]);
        }
        catch(Exception $e) {

        }
    }

    public function updateSubscription(SubscriptionRequest $request, $id)
    {
        $request->validated();
        //
        try{
            $sub = Subscription::findOrFail($id);

            $sub->update([
                'name' => $request->name,
                'status' => $request->status ?? 'active',
                'price' => $request->price,
                'validity' => $request->validity,
                'organization_id' => Auth::user()->organization->id,
    
            ]);
            return response([
                'status' => true,
                'message' => 'Subscription updated successfully',
                'data' => new SubscriptionResource($sub)
            ]);
        }
        catch(Exception $e) {
            return response([
                'status' => true,
                'message' => 'Subscription could not updated',
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
