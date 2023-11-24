<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getTable()
    {
        return 'files';
    }

    /**
     * Get all of the owning fileable models.
     */
    public function fileable()
    {
        return $this->morphTo('fileable');
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

    public function relatedFile()
    {
        return $this->belongsTo(File::class, 'related_file_id');
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'recordable');
    }
}
