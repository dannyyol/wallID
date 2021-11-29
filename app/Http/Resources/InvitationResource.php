<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SimpleEventResource;
use App\Http\Resources\UserResource;

class InvitationResource extends \App\Http\Resources\BaseCustomResource
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
            'status' => $this->status,
            'user' => $this->whenLoaded('user', new UserResource($this->user)),
            'event' => $this->whenLoaded('event', new SimpleEventResource($this->event))
        ];
    }
}
