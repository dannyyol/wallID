<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function typeData()
    {
        if ($this->type == 'individual') {
            return $this->hasOne('App\Models\Individual');
        }
        return $this->hasOne('App\Models\Organization');
    }

    public function ticketPlan()
    {
        return $this->hasOne('App\Models\TicketPlan');
    }   


    public function organization()
    {
        return $this->hasOne('App\Models\Organization');
    }

    public function idcard()
    {
        return $this->hasMany('App\Models\IDCard');
    }




    public function individual()
    {
        return $this->hasOne('App\Models\Individual');
    }
}
