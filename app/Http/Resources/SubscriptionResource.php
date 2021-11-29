<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Models\Member;

class SubscriptionResource extends \App\Http\Resources\BaseCustomResource
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
            'name' => $this->name,
            'price' =>$this->price,
            'validity' => $this->validity,
            'created_at' => $this->created_at,
            'organization' => $this->whenLoaded('organization', new OrganizationResource($this->organization))
        ];
    }
}