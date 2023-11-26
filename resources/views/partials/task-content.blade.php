<div class="rounded border p-4 mt-3 shadow-sm">
    <div class="d-flex justify-content-between">
        <h4>{{$task->name}}</h4> 

        <div class="dropdown">
            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="">Pin</a>
                <a class="dropdown-item" href="">Edit</a>
                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
        </div>
    </div>

    <small class="d-block">{{$task->description}}</small>
    <p class="mt-2">
        <span class="badge light badge-warning">Pending</span>
        <span class="badge badge-success light d-inline ">Due at {{ $task->due_at ? $task->due_at->format('h:i A') : '' }} on {{ $task->due_at ? $task->due_at->toFormattedDateString() : '' }}</span>
    </p>
</div>