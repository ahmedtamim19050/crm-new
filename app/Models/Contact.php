<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTable()
    {
        return 'contacts';
    }

    public function contactTypes()
    {
        return $this->belongsToMany(ContactType::class);
    }

    /**
     * Get all of the owning contactable models.
     */
    public function contactable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the owning entityable models.
     */
    public function entityable()
    {
        return $this->morphTo();
    }
}
