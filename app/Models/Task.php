<?php

namespace App\Models;

use App\Traits\HasCrmActivities;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use HasCrmActivities;

    protected $guarded = ['id'];

    protected $casts = [
        'due_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    protected $searchable = [
        'name',
        'description',
    ];

    public function getSearchable()
    {
        return $this->searchable;
    }

    public function getTable()
    {
        return 'tasks';
    }

    public function setDueAtAttribute($value)
    {
        if ($value) {
            $this->attributes['due_at'] = Carbon::createFromFormat($this->dateFormat().' H:i', $value);
        }
    }

    /**
     * Get all of the owning taskable models.
     */
    public function taskable()
    {
        return $this->morphTo('taskable');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'user_created_id');
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

    public function activity()
    {
        return $this->morphOne(Activity::class, 'recordable');
    }
}
