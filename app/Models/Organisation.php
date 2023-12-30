<?php

namespace App\Models;

use App\Models\Traits\HasMeta;
use App\Traits\HasCrmActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory,HasMeta,HasCrmActivities;

    protected $meta_attributes = [
        "post_code",
        "place",
        "street",
        "company_email",
        "company_phone",
        "company_twitter",
        "company_tiktok",
        "company_youtube",
        "company_phone",
        "niche",
        "company_fb",
    ];

    protected $guarded = ['id'];




    public function people()
    {
        return $this->hasMany(Person::class);
    }

    /**
     * Get all of the organisation emails.
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }



    /**
     * Get all of the organisation phone numbers.
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }


    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }





    public function deals()
    {
        return $this->hasMany(Deal::class,'organisation_id');
    }

    /**
     * Get all of the labels for the lead.
     */
    public function labels()
    {
        return $this->morphToMany(Label::class,'labelable');
    }





    /**
     * Get the xero contact associated with the organisation.
     */


    public function client()
    {
        return $this->morphOne(Client::class, 'clientable');
    }
    public function ownerUser()
    {
        return $this->belongsTo(User::class,'user_owner_id');
    }
    public function labelName()
    {
        return $this->belongsTo(Label::class,'label');
    }
}
