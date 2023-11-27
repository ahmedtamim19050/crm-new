<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCrmActivities;


class Lead extends Model
{
    use HasCrmActivities;

    protected $guarded = ['id'];

    protected $casts = [
        'converted_at' => 'datetime',
    ];

    protected $searchable = [
        'title',
        'person.first_name',
        'person.middle_name',
        'person.last_name',
        'person.maiden_name',
        'organisation.name',
    ];

    protected $filterable = [
        'user_owner_id',
        'labels.id',
    ];

    public function getSearchable()
    {
        return $this->searchable;
    }

    // public function getTable()
    // {
    //     return config('laravel-crm.db_table_prefix').'leads';
    // }

    public function setAmountAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['amount'] = $value * 100;
        } else {
            $this->attributes['amount'] = null;
        }
    }
    public function getAmountAttribute($value)
    {
        if (isset($value)) {
            return $value / 100;
        } else {
            return null;
        }
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * Get all of the lead's emails.
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    public function getPrimaryEmail()
    {

        if ($this->person) {
            return $this->person->getPrimaryEmail();
        } else {
            return $this->emails()->first();
        }
    }

    /**
     * Get all of the lead's phone numbers.
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function getPrimaryPhone()
    {
        if ($this->person) {
            return $this->person->getPrimaryPhone();
        } else {
            return $this->phones()->first();
        }
    }

    /**
     * Get all of the leads addresses.
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function getPrimaryAddress()
    {
        if ($this->organisation) {
            return $this->organisation->getPrimaryAddress();
        } else {
            return $this->addresses()->where('primary', 1)->first();
        }
    }

    public function leadStatus()
    {
        return $this->belongsTo(\VentureDrake\LaravelCrm\Models\LeadStatus::class, 'lead_status_id');
    }

    public function leadSource()
    {
        return $this->belongsTo(\VentureDrake\LaravelCrm\Models\LeadSource::class, 'lead_source_id');
    }

    /**
     * Get all of the lead's custom field values.
     */
    public function customFieldValues()
    {
        return $this->morphMany(\VentureDrake\LaravelCrm\Models\FieldValue::class, 'custom_field_valueable');
    }

    public function createdByUser()
    {
        return $this->belongsTo(\App\User::class, 'user_created_id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'user_updated_id');
    }

    public function deletedByUser()
    {
        return $this->belongsTo(User::class, 'user_deleted_id');
    }

    public function restoredByUser()
    {
        return $this->belongsTo(User::class, 'user_restored_id');
    }

    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'user_owner_id');
    }

    public function assignedToUser()
    {
        return $this->belongsTo(User::class, 'user_assigned_id');
    }

    /**
     * Get all of the labels for the lead.
     */
    public function labels()
    {
        return $this->morphToMany(Label::class,'labelable');
    }
    // public function notes()
    // {
    //     return $this->morphMany(Note::class, 'noteable');
    // }
    // public function activities()
    // {
    //     return $this->morphMany(Activity::class, 'timelineable');
    // }

}

