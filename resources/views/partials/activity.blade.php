@switch($activity->recordable_type)
    @case('App\Models\Note')
        @include('partials.note-content',['note'=>$activity->recordable])
        @break
    @case('App\Models\Task')
        @include('partials.task-content',['task'=>$activity->recordable])
        @break
    @case('App\Models\Call')
 
        @include('partials.call-content',['call'=>$activity->recordable])
        @break
    @case('App\Models\Meeting')
 
        @include('partials.call-content',['call'=>$activity->recordable])
        @break
    @case('App\Models\Lunch')
 
        @include('partials.call-content',['call'=>$activity->recordable])
        @break
    @case('App\Models\File')
 
        @include('partials.file-content',['file'=>$activity->recordable])
        @break

@endswitch