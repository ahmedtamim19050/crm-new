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
                                <div class="cal-icon"><input type="date" class="form-control"><i
                                        class="far fa-calendar-alt"></i></div>
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
        <div class="row page-titles mx-0 ">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Deals Table</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <div class="mt-3">
                        {{-- <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addContactModal"
                        class="btn btn-primary  rounded me-3 mb-sm-0 mb-2 text-white"><i class="fa fa-user me-3 scale5"
                            aria-hidden="true"></i>New Contact</a> --}}
                        <!-- Add Order -->
                        <a href="{{route('kanvan')}}" class="mx-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 0.999939H4C2.34315 0.999939 1 2.34308 1 3.99994V7.99994C1 9.65679 2.34315 10.9999 4 10.9999H8C9.65685 10.9999 11 9.65679 11 7.99994V3.99994C11 2.34308 9.65685 0.999939 8 0.999939Z"
                                    fill="#CBCBCB" />
                                <path
                                    d="M20 0.999939H16C14.3431 0.999939 13 2.34308 13 3.99994V7.99994C13 9.65679 14.3431 10.9999 16 10.9999H20C21.6569 10.9999 23 9.65679 23 7.99994V3.99994C23 2.34308 21.6569 0.999939 20 0.999939Z"
                                    fill="#CBCBCB" />
                                <path
                                    d="M8 13H4C2.34315 13 1 14.3431 1 16V20C1 21.6569 2.34315 23 4 23H8C9.65685 23 11 21.6569 11 20V16C11 14.3431 9.65685 13 8 13Z"
                                    fill="#CBCBCB" />
                                <path
                                    d="M20 13H16C14.3431 13 13 14.3431 13 16V20C13 21.6569 14.3431 23 16 23H20C21.6569 23 23 21.6569 23 20V16C23 14.3431 21.6569 13 20 13Z"
                                    fill="#CBCBCB" />
                            </svg>
                        </a>
                        <a href="{{ route('deals.index') }}" class="mx-3">
                            <svg class="primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 7H20C20.7956 7 21.5587 6.68393 22.1213 6.12132C22.6839 5.55871 23 4.79565 23 4C23 3.20435 22.6839 2.44129 22.1213 1.87868C21.5587 1.31607 20.7956 1 20 1H4C3.20435 1 2.44129 1.31607 1.87868 1.87868C1.31607 2.44129 1 3.20435 1 4C1 4.79565 1.31607 5.55871 1.87868 6.12132C2.44129 6.68393 3.20435 7 4 7Z"
                                    fill="#43DC80" />
                                <path
                                    d="M20 9H4C3.20435 9 2.44129 9.31607 1.87868 9.87868C1.31607 10.4413 1 11.2044 1 12C1 12.7956 1.31607 13.5587 1.87868 14.1213C2.44129 14.6839 3.20435 15 4 15H20C20.7956 15 21.5587 14.6839 22.1213 14.1213C22.6839 13.5587 23 12.7956 23 12C23 11.2044 22.6839 10.4413 22.1213 9.87868C21.5587 9.31607 20.7956 9 20 9Z"
                                    fill="#43DC80" />
                                <path
                                    d="M20 17H4C3.20435 17 2.44129 17.3161 1.87868 17.8787C1.31607 18.4413 1 19.2044 1 20C1 20.7956 1.31607 21.5587 1.87868 22.1213C2.44129 22.6839 3.20435 23 4 23H20C20.7956 23 21.5587 22.6839 22.1213 22.1213C22.6839 21.5587 23 20.7956 23 20C23 19.2044 22.6839 18.4413 22.1213 17.8787C21.5587 17.3161 20.7956 17 20 17Z"
                                    fill="#43DC80" />
                            </svg>
                        </a>
                     
                    </div>
                </ol>
            </div>
            <div class="col-md-3 mt-3">
                <a href="{{ route('deals.create') }}" class="btn btn-primary">Create a Deal</a>
            </div>
           
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Deals Queue</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        {{-- <th><strong>Created</strong></th> --}}
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
                                    @foreach ($deals as $deal)
                                        <tr>
                                            <td><strong>{{ $loop->index + 1 }}</strong></td>
                                            {{-- <td>{{ $deal->created_at->diffForHumans() }}</td> --}}
                                            <td>{{ $deal->title }}</td>
                                            <td>

                                                <span class="badge light badge-success">{{ $deal->label }}</span>
                                            </td>

                                            <td>{{ $deal->amount, $deal->currency }}</td>

                                            <td>{{ $deal->client->name ?? null }}</td>
                                            <td>{{ $deal->organisation->name ?? null }}</td>
                                            {{-- <td>{{ $deal->person->name ??  null }}</td> --}}
                                            <td>{{ $deal->ownerUser->name ?? null }}</td>
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
                                                        <a class="dropdown-item"
                                                            href="{{ route('deals.show', $deal->id) }}">Show</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('deals.edit', $deal->id) }}">Edit</a>
                                                        <x-delete class="dropdown-item" :route="route('deals.destroy', $deal->id)" />
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
