@if($note)

<div class="rounded border p-4 mt-3 shadow-sm">
    <div class="d-flex justify-content-between">
        <h4>{{ $note->created_at ? $note->created_at->diffForHumans(): '' }} - {{ $note->createdByUser ? $note->createdByUser->name : '' }} </h4> 

        <div class="dropdown">
            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
            </button>
            <div class="dropdown-menu">
                {{-- <a class="dropdown-item" href="">Pin</a> --}}
                {{-- <a class="dropdown-item" href="">Edit</a> --}}
                {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                <x-delete class="dropdown-item" :route="route('activity.delete',['model' => class_basename(get_class($note)), 'id' => $note->id])"/>
            </div>
        </div>
    </div>

    <small class="d-block">{{$note->note}}</small>
    <span class="badge badge-success light d-inline mt-2">Note at {{ $note->noted_at ? $note->noted_at->format('h:i A') : '' }} on {{ $note->noted_at ? $note->noted_at->toFormattedDateString() : '' }}</span>
</div>

@endif