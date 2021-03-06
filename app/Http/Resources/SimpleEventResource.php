<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EventPriceResource;

class SimpleEventResource extends \App\Http\Resources\BaseCustomResource
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
            'type' => $this->type,
            'status' => $this->status,
            'tickets' => $this->tickets,
            'price' => $this->price,
            'isFree' => $this->isFree,
            'unique_id' => $this->unique_id,
            'description' => $this->description,
            'event_date' => $this->event_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'ticketCategories' => $this->whenLoaded('ticketCategories', EventPriceResource::collection($this->ticketCategories))
        ];
    }
}
