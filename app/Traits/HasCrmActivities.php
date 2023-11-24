<?php

namespace App\Traits;

use App\Models\Activity;
use App\Models\Call;
use App\Models\File;
use App\Models\Lunch;
use App\Models\Meeting;
use App\Models\Note;
use App\Models\Task;

trait HasCrmActivities
{
    public function activities()
    {
        return $this->morphMany(Activity::class, 'timelineable')->latest();
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'taskable');
    }

    public function calls()
    {
        return $this->morphMany(Call::class, 'callable')->latest();
    }

    public function meetings()
    {
        return $this->morphMany(Meeting::class, 'meetingable');
    }

    public function lunches()
    {
        return $this->morphMany(Lunch::class, 'lunchable');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable')->latest();
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
