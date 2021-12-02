<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'venue', 'tickets', 'category_id', 'type', 'status', 'user_id', 'description', 'price', 'isFree', 'start_date', 'end_date', 'pricing', 'unique_id', 'image', 'event'];

    protected $casts = [
        'price' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function attendees()
    {
        return $this->hasMany('App\Models\Attendee');
    }

    public function ticketCategories()
    {
        return $this->hasMany('App\Models\TicketCategory');
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    
    }

}
