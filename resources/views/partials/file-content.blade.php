<div class="rounded border p-4 mt-3 shadow-sm">
    <div class="d-flex justify-content-between">
        <p class="d-block "><a class="text-primary" href="{{Storage::url($file->file)}}" target="_blank">{{$file->name}}</a></p>
        <div class="dropdown">
            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('leads.show',$lead)}}">Pin</a>
                <a class="dropdown-item" href="{{route('leads.edit',$lead)}}">Edit</a>
                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
        </div>
    </div>


    <p class="mt-2">
        {{-- <span class="badge light badge-warning">Pending</span> --}}
        <span class=" d-inline ">{{ $file->created_at ? $file->created_at->format('h:i A') : '' }} on {{ $file->created_at ? $file->created_at->toFormattedDateString() : '' }} | {{$file->createdByUser ? $file->createdByUser->name : ''}} | {{$file->filesize}}</span>
    </p>
</div>