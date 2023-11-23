<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getTable()
    {
        return 'activities';
    }

    public function causeable()
    {
        return $this->morphTo();
    }

    public function timelineable()
    {
        return $this->morphTo();
    }

    public function recordable()
    {
        return $this->morphTo();
    }
}
