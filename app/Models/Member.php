<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table ="members";

    protected $fillable = ['individual_id','subscription_id','amount_paid','expiry_date', 'status', 'organization_id'];

    
    public function individual()
    {
        return $this->belongsTo('App\Models\Individual');
    }


    public function organization()
    {
        return $this->belongsTo('App\Models\Organization', 'organization_id');
    }


    public function subscription()
    {
        return $this->belongsTo('App\Models\Subscription', 'subscription_id');
    }
}