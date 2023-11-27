<?php

namespace App\Models;

use App\Traits\HasCrmActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use HasCrmActivities;

    protected $guarded = [];

    protected $encryptable = [
        'name',
    ];

    protected $searchable = [
        'name',
    ];

    protected $filterable = [
        'user_owner_id',
        'labels.id',
    ];

    public $sortable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function getSearchable()
    {
        return $this->searchable;
    }

    public function getTable()
    {
        return 'clients';
    }

    public function getNameAttribute($value)
    {
        if ($value) {
            return $value;
        } else {
            return $this->clientable->name ?? null;
        }
    }

    /**
     * Get all of the owning clientable models.
     */
    public function clientable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the labels for the person.
     */
    public function labels()
    {
        return $this->morphToMany(Label::class,'labelable');
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
    
    public function ownerUser()
    {
        return $this->belongsTo(Client::class,'user_owner_id');
    }
}
