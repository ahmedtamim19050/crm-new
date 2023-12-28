@if($call)
<div class="rounded border p-4 mt-3 shadow-sm">
    <div class="pb-2" style="border-bottom: 1px solid #c0c0c0">
        <div class="d-flex justify-content-between">
            <h4>{{$call->name}}</h4> 

            <div class="dropdown">
                <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                </button>
                <div class="dropdown-menu">
                    {{-- <a class="dropdown-item" href="">Pin</a>
                    <a class="dropdown-item" href="">Edit</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                    <x-delete class="dropdown-item" :route="route('activity.delete',['model' => class_basename(get_class($call)), 'id' => $call->id])"/>
                </div>
            </div>
        </div>
    
        <small class="d-block">{{$call->description}}</small>
        <p class="mt-2">
    
            <span class="badge badge-success light d-inline "> {{ $call->start_at ? $call->start_at->format('h:i A') : '' }} on {{ $call->start_at ? $call->start_at->toFormattedDateString() : '' }}</span>
            To
            <span class="badge badge-success light d-inline "> {{ $call->finish_at ? $call->finish_at->format('h:i A') : '' }} on {{ $call->finish_at ? $call->finish_at->toFormattedDateString() : '' }}</span>
        </p>
    </div>

    <div class="pb-2 mt-3" style="border-bottom: 1px solid #c0c0c0">
        <h5>Guest</h5>
        <p style="font-size: 14px"><i class="far fa-user"></i> 

                
            <a href="" class="text-primary">{{$call->client->name ?? null}}</a>
 
        </p>
    </div>
    {{-- <div class="pb-2 mt-3" style="border-bottom: 1px solid #c0c0c0">
        <h5>description</h5>
        <p style="font-size: 14px"> Lorem, ipsum.</p>
    </div> --}}
    <div class="pb-2 mt-3" style="border-bottom: 1px solid #c0c0c0">
        <h5>Location</h5>
        <p style="font-size: 14px"> {{$call->location}}</p>
    </div>
</div>
@endif