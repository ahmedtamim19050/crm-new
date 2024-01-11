@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <!-- Add Project -->
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Contacts Table</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Contacts</a></li>
                </ol>
            </div>
            <div class="col-md-3 mt-3">
                <a href="javascript:void(0);" data-bs-toggle="modal" class="btn btn-primary"
                    data-bs-target="#addContactModal" class="text-dark py-3">+Add Contact</a>
                {{-- <a href="{{route('clients.create')}}" class="btn btn-primary">Create a Contact</a> --}}
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Contact Queue</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        {{-- <th><strong>Created</strong></th> --}}
                                        <th><strong>Name</strong></th>
                                        <th><strong>Organisation</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Phone</strong></th>
                                        {{-- <th><strong>Label</strong></th> --}}
                                        {{-- <th> <strong>Owner </strong></th> --}}
                                        {{-- <th><strong>PRICE</strong></th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td><strong>{{ $loop->index + 1 }}</strong></td>
                                            {{-- <td>{{ $client->created_at->diffForHumans() }}</td> --}}
                                            <td><a href="{{ route('clients.show', $client->id) }}"
                                                    class="text-primary text-decoration-underline">{{ $client->name }}</a>
                                            </td>
                                            <td>{{ $client->organisation->name ?? null }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->phone }}</td>
                                            {{-- <td>
                           
                                        <span class="badge light badge-success">{{$client->label}}</span>
                                
                                     </td> --}}
                                            {{-- <td>{{ $client->ownerUser->name ?? null }}</td> --}}
                                            <td>
                                                <x-delete class="btn btn-danger btn-sm" :route="route('clients.destroy', $client->id)" />
                                                {{-- <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2" />
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2" />
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('clients.show',$client->id)}}">Show</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('clients.edit', $client->id) }}">Edit</a>
                                                       
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

    <div class="modal fade " id="addContactModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Contacts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf

                        @include('dashboard.clients.partials.fields')
                        <a href="" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

 
@endsection
@push('scripts')

@endpush
