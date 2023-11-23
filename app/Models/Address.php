<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $encryptable = [
        'address',
        'name',
        'line1',
        'line2',
        'line3',
        'code',
        'city',
        'state',
        'country',
    ];

    public function getTable()
    {
        return config('laravel-crm.db_table_prefix').'addresses';
    }

    /**
     * Get all of the owning addressable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    public function addressType()
    {
        return $this->belongsTo(\VentureDrake\LaravelCrm\Models\AddressType::class);
    }
}
