<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'noted_at' => 'datetime',
    ];

    public function getTable()
    {
        return 'notes';
    }

    public function setNotedAtAttribute($value)
    {
        if ($value) {
            $this->attributes['noted_at'] = Carbon::createFromFormat($this->dateFormat().' H:i', $value);
        }
    }

    /**
     * Get all of the owning noteable models.
     */
    public function noteable()
    {
        return $this->morphTo('noteable');
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

    public function relatedNote()
    {
        return $this->belongsTo(Note::class, 'related_note_id');
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'recordable');
    }
}
