@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Organosation Table</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Organisation</a></li>
                </ol>
            </div>
            <div class="col-md-3 mt-3">
                <a href="{{ route('organisations.create') }}" class="btn btn-primary">Create a new Organisation</a>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Products Queue</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>Created</strong></th>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Address</strong></th>
                                        <th><strong>Label</strong></th>
                                        <th> <strong>Owner </strong></th>
                                        {{-- <th><strong>PRICE</strong></th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organisations as $organisation)
                                        <tr>
                                            <td><strong>{{ $loop->index + 1 }}</strong></td>
                                            <td>{{ $organisation->created_at->diffForHumans() }}</td>
                                            <td><a class="text-primary text-decoration-underline" href="{{route('organisations.show',$organisation)}}">
                                                    {{ $organisation->name }}

                                                </a>
                                            </td>
                                            <td>{{ $organisation->address }}</td>
                                            <td>

                                                <span class="badge light badge-success text-white"
                                                    style="background-color:{{ $organisation->labelName->color ?? null }}">{{ $organisation->labelName->name ?? null }}</span>

                                            </td>
                                            <td>{{ $organisation->ownerUser->name ?? null }}</td>
                                            <td>
                                                <div class="dropdown">
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
                                                        {{-- <a class="dropdown-item" href="{{route('organisations.show',$organisation)}}">Show</a> --}}
                                                        <a class="dropdown-item"
                                                            href="{{ route('organisations.edit', $organisation) }}">Edit</a>
                                                        <x-delete class="dropdown-item" :route="route('organisations.destroy', $organisation)" />
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
