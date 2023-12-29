{{-- <table class="table mb-0 card-table table-hover">
    <thead>
    <tr>
        <th scope="col">Created</th>
        <th scope="col">Title</th>
        <th scope="col">Label</th>
        <th scope="col">Value</th>
        <th scope="col">Customer</th>
        <th scope="col">Organisation</th>
        <th scope="col">Contact Person</th>
        <th scope="col">Owner</th>
        <th scope="col" width="210"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr class="has-link" data-url="{{ url(route('leads.show',$lead)) }}">
            <td>{{ $lead->created_at->diffForHumans() }}</td>
            <td>{{ $lead->title }}</td>
          
            <td>{{ $lead->amount, $lead->currency }}</td>
            <td>{{ $lead->client->name ?? null}}</td>
            <td>{{ $lead->organisation->name ?? null}}</td>
            <td>{{ $lead->person->name ??  null }}</td>
            <td>{{ $lead->ownerUser->name ?? null }}</td>
            <td class="disable-link text-right">
                @hasdealsenabled
                    @can('edit crm leads')
                    <a href="{{ route('laravel-crm.leads.convert-to-deal',$lead) }}" class="btn btn-success btn-sm"> {{ ucfirst(__('laravel-crm::lang.convert')) }}</a>
                    @endcan
                @endhasdealsenabled
                @can('view crm leads')
                <a href="{{ route('laravel-crm.leads.show',$lead) }}" class="btn btn-outline-secondary btn-sm"><span class="fa fa-eye" aria-hidden="true"></span></a>
                @endcan
                @can('edit crm leads')
                <a href="{{ route('laravel-crm.leads.edit',$lead) }}" class="btn btn-outline-secondary btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a>
                @endcan
                @can('delete crm leads')
                <form action="{{ route('laravel-crm.leads.destroy',$lead) }}" method="POST" class="form-check-inline mr-0 form-delete-button">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                    <button class="btn btn-danger btn-sm" type="submit" data-model="{{ __('laravel-crm::lang.lead') }}"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
                </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table> --}}
<div class="container-fluid">
    <!-- Add Project -->
    <div class="modal fade" id="addProjectSidebar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label class="text-black font-w500">Project Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                                    <label class="text-black font-w500">Dadeline</label>
                                    <div class="cal-icon"><input type="date" class="form-control"><i class="far fa-calendar-alt"></i></div>
                                </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Client Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <p class="mb-0">Leads Table</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Leads</a></li>
            </ol>
        </div>
        <div class="col-md-3 mt-3">
            <a href="{{route('leads.create')}}" class="btn btn-primary">Create a Lead</a>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Leads Queue</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Created</strong></th>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Label</strong></th>
                                    <th><strong>Value</strong></th>
                                    <th><strong>Customer</strong></th>
                                    <th> <strong> Organisation </strong></th>
                                    {{-- <th> <strong>Contact Person </strong></th> --}}
                                    <th> <strong>Owner </strong></th>
                                    {{-- <th><strong>PRICE</strong></th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                    
                                <tr>
                                    <td><strong>{{$loop->index +1}}</strong></td>
                                    <td>{{ $lead->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{route('leads.show',$lead)}}" class="text-primary text-decoration-underline">{{ $lead->title }}</a>
                                        </td>
                                    <td>
                                     
                                        <span class="badge light badge-success text-white" style="background-color:{{$lead->labelName->color ?? null}}">{{ $lead->labelName->name  ?? null}}</span></td>
                                     
                                    <td>{{ $lead->amount, $lead->currency }}</td>
                     
                                    <td>{{ $lead->client->name ?? null}}</td>
                                    <td>{{ $lead->organisation->name ?? null}}</td>
                                    {{-- <td>{{ $lead->person->name ??  null }}</td> --}}
                                    <td>{{ $lead->ownerUser->name ?? null }}</td>
                                    <td>
                                        <x-delete class="btn btn-danger btn-sm" :route="route('leads.destroy',$lead)"/>
                                    {{-- 
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('leads.convert',$lead)}}">Convert</a>
                                                <a class="dropdown-item" href="{{route('leads.show',$lead)}}">Show</a>
                                                <a class="dropdown-item" href="{{route('leads.edit',$lead)}}">Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                <x-delete class="dropdown-item" :route="route('leads.destroy',$lead)"/>
                                            </div>
                                        </div> --}}
                                    </td>
                                </tr>
                                @endforeach
                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>