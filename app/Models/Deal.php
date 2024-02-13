<?php

namespace App\Models;

use App\Models\Traits\HasMeta;
use App\Traits\HasCrmActivities;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Deal extends Model
{
    use HasFactory;
    use HasCrmActivities;
    use HasMeta;

    protected $guarded = ['id'];

    protected $casts = [
        'expected_close' => 'datetime',
        'closed_at' => 'datetime',
    ];
    protected $meta_attributes = [
        "close_date",

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

    public function getTable()
    {
        return 'deals';
    }

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

    public function setExpectedCloseAttribute($value)
    {
        if ($value) {
            $this->attributes['expected_close'] = Carbon::createFromFormat($this->dateFormat(), $value);
        }
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }



    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'user_created_id');
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
    public function labelName()
    {
        return $this->belongsTo(Label::class, 'label');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
    // public function getPrimaryAddress()
    // {
    //     if ($this->organisation) {
    //         return $this->organisation->getPrimaryAddress();
    //     } else {
    //         return $this->addresses()->first();
    //     }
    // }
    // protected static function booted()
    // {
    //     static::addGlobalScope('myDeal', function (Builder $builder) {
    //         $builder->where('user_id', auth()->id());
    //     });
    // }
}
