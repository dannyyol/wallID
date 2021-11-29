<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IDCard extends Model
{
    use HasFactory;
    protected $table = "id_cards";
    protected $fillable = ['user_id', 'organization_id', 'firstname', 'lastname', 'middle_name', 'passport', 'id_card_number', 'issued_date', 'expiry_date', 'template_name', 'category', 'logo_url', 'role', 'qr_code', 'qr_code_url'];

    protected $appends = ['passport_path', 'logo_path'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function getPassportPathAttribute()
    {
        return storage_path('app/' .$this->passport);
    }

    public function getLogoPathAttribute()
    {
        return storage_path('app/' .$this->logo_url);

    }
    
}
