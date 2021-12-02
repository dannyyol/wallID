<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\UserResource;
use App\Http\Resources\IndividualResource;
use App\Http\Resources\OrganizationResource;
use App\Models\Member;

class MemberResource extends \App\Http\Resources\BaseCustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'amount_paid' => $this->amount_paid,
            'expiry_date'=>$this->expiry_date,
            // 'current_plan_subscribed'=> $this->where('expiry_date', '>', date('Y-m-d'))->where('individual_id', $this->individual_id)->get(),
            // 'subscription_due' => $this->where('expiry_date', '>', date('Y-m-d'))->where('individual_id', $this->individual_id),
            // 'last_subscription_date' =>$this->latest(),
                        // 'last_subscription_date' =>$this->latest(),
            'access_status' => $this->access_status,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'individual'=>$this->whenLoaded('individual', new IndividualResource($this->individual)),
            'organization'=>$this->whenLoaded('organization', new OrganizationResource($this->organization)),
            'subscription' =>$this->whenLoaded('subscription', new SubscriptionResource($this->subscription)),

        ];
    }
}
