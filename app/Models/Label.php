<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Label extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getTable()
    {
        return 'labels';
    }

    public function setHexAttribute($value)
    {
        $this->attributes['hex'] = Str::after($value, '#');
    }

    /**
     * Get all of the leads that are assigned this labels.
     */
    public function leads()
    {
        return $this->morphedByMany(Lead::class, 'labelable');
    }

    /**
     * Get all of the deals that are assigned this labels.
     */
    public function deals()
    {
        return $this->morphedByMany(Deal::class, 'labelable');
    }

    /**
     * Get all of the people that are assigned this labels.
     */
    public function people()
    {
        return $this->morphedByMany(Person::class, 'labelable');
    }

    /**
     * Get all of the organisations that are assigned this labels.
     */
    public function organisations()
    {
        return $this->morphedByMany(Organisation::class, 'labelable');
    }
}
