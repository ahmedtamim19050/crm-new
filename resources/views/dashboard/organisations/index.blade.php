@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Organizations Table</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Organization</a></li>
                </ol>
            </div>
            <div class="col-md-3 mt-3">
                <a href="javascript:void(0);" data-bs-toggle="modal" class="btn btn-primary"
                    data-bs-target="#addContactModal" class="text-dark py-3">+Add Organization</a>
                {{-- <a href="{{ route('organisations.create') }}" class="btn btn-primary">Create a new Organisation</a> --}}
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Organization Queue</h4>
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
                                        {{-- <th> <strong>Owner </strong></th> --}}
                                        {{-- <th><strong>PRICE</strong></th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organisations as $organisation)
                                        <tr>
                                            <td><strong>{{ $loop->index + 1 }}</strong></td>
                                            <td>{{ $organisation->created_at->diffForHumans() }} </td>
                                            <td><a class="text-primary text-decoration-underline"
                                                    href="{{ route('organisations.show', $organisation) }}">
                                                    {{ $organisation->name }}

                                                </a>
                                            </td>
                                            <td>{{ $organisation->street }},{{ $organisation->zip }}</td>
                                            <td>

                                                <span class="badge light badge-success text-white"
                                                    style="background-color:{{ $organisation->labelName->color ?? null }}">{{ $organisation->labelName->name ?? null }}</span>

                                            </td>
                                            {{-- <td>{{ $organisation->ownerUser->name ?? null }}</td> --}}
                                            <td>
                                                <x-delete class="btn btn-danger btn-sm" :route="route('organisations.destroy', $organisation)" />
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
                    <h5 class="modal-title">Add Organization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('organisations.store') }}">
                        @csrf



                        @include('dashboard.organisations.partials.fields')



                        <a href="" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
