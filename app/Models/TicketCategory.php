<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'event_id'];


    public function event(){
        return $this->belongsTo(Event::class, 'event_id');
    }
}
