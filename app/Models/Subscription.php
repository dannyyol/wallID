<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable  = ['status','name','price','validity','organization_id'];
    
    // protected $appends = ['last_subscription_date'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }   

    // public function subscribed_users()
    // {
    //     return $this->hasMany(SubscribedUser::class);
    // }   


    public function members()
    {
        return $this->hasMany(Member::class);
    }  


    public function expired_subscribers()
    {
        return $this->hasMany(Member::class);
    }  

    public function valid_subscribers(){
        return $this->hasMany(Member::class);
    }

  
}
