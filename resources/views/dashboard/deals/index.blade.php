@extends('layouts.default')

@section('content')
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Leads</a></li>
            </ol>
        </div>
        <div class="col-md-3 mt-3">
            <a href="{{route('deals.create')}}" class="btn btn-primary">Create a Lead</a>
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
                                    <th> <strong>Contact Person </strong></th>
                                    <th> <strong>Owner </strong></th>
                                    {{-- <th><strong>PRICE</strong></th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deals as $deal)
                         
                                <tr>
                                    <td><strong>{{$loop->index +1}}</strong></td>
                                    <td>{{ $deal->created_at->diffForHumans() }}</td>
                                    <td>{{ $deal->title }}</td>
                                    <td>
                                        @foreach($deal->labels as $label)
                                        <span class="badge light badge-success">{{$label->name}}</span></td>
                                        @endforeach
                                    <td>{{ $deal->amount, $deal->currency }}</td>
                     
                                    <td>{{ $deal->client->name ?? null}}</td>
                                    <td>{{ $deal->organisation->name ?? null}}</td>
                                    <td>{{ $deal->person->name ??  null }}</td>
                                    <td>{{ $deal->ownerUser->name ?? null }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('deals.show',$deal->id)}}">Show</a>
                                                <a class="dropdown-item" href="{{route('deals.edit',$deal->id)}}">Edit</a>
                                                <x-delete class="dropdown-item" :route="route('deals.destroy',$deal->id)"/>
                                            </div>
                                        </div>
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
@endsection