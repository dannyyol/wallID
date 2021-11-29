<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'employees', 'phone', 'id_card_number'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }



    public function members()
    {
        return $this->hasMany('App\Models\Member');
    }
}
