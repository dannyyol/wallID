<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdCardResource extends JsonResource
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
            'user' => $this->whenLoaded('user', new SimpleUserResource($this->user)),
            'firstname'=> $this->firstname,
            'lastname'=> $this->lastname,
            'middle_name'=> $this->middle_name,
            'passport'=> $this->passport,
            'id_card_number'=> $this->id_card_number,
            'qr_code' => $this->qr_code,
            'qr_code_url'=> $this->qr_code_url,
            'issued_date' => $this->issued_date,
            'expiry_date' => $this->expiry_date,
            'template_name' => $this->template_name,
            'category'=>$this->category,
            'logo_url'=>$this->logo_url,
            'passport_url'=>$this->passport_url,

            'logo_path'=>$this->logo_path,
            'passport_path' =>$this->passport_path,
            'created_at' => $this->created_at,
        ];
    }
}
