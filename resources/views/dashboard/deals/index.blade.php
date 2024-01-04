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
                <div class="d-flex border-top">
                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContactModal" class="text-dark py-3">+Add Deal</a>
                </div>
            
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
                                        {{-- <th> <strong>Owner </strong></th> --}}
                                        {{-- <th><strong>PRICE</strong></th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deals as $deal)
                                        <tr>
                                            <td><strong>{{ $loop->index + 1 }}</strong></td>
                                            {{-- <td>{{ $deal->created_at->diffForHumans() }}</td> --}}
                                            <td>
                                                <a href="{{ route('deals.show', $deal->id) }}" class="text-primary text-decoration-underline">
                                                
                                                    {{ $deal->title }}
                                                </a>
                                            </td>
                                            <td>

                                                <span class="badge light badge-success text-white" style="background-color:{{$deal->labelName->color ?? null}}">{{ $deal->labelName->name  ?? null}}</span>
                                            </td>

                                            <td>{{ $deal->amount, $deal->currency }}</td>

                                            <td>{{ $deal->client->name ?? null }}</td>
                                            <td>{{ $deal->organisation->name ?? null }}</td>
                                            {{-- <td>{{ $deal->person->name ??  null }}</td> --}}
                                            {{-- <td>{{ $deal->ownerUser->name ?? null }}</td> --}}
                                            <td>
                                                <x-delete class="btn btn-danger btn-sm" :route="route('deals.destroy', $deal->id)" />
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
                                                        <a class="dropdown-item"
                                                            href="{{ route('deals.show', $deal->id) }}">Show</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('deals.edit', $deal->id) }}">Edit</a>
                                                      
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

    {{-- modals --}}
    <div class="modal fade " id="addContactModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Deal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('deals.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 border-right">


                                <div class="d-flex align-items-center">
                                    <div class="col-md-10">
                                        @include('partials.form.select', [
                                            'name' => 'client_id',
                                            'label' => 'Customer',
                                            'options' => $clients,
                                          
                                        ])
                                    </div>
                                    <div class="col-md-2 ms-2 mt-2">
                                        <button type="button" class="btn btn-dark btn-sm showmodal"
                                            data-show-modal="clientModal">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col-md-10">

                                        @include('partials.form.select', [
                                            'name' => 'organisation_id',
                                            'label' => 'Organisation',
                                            'options' => $organisations,
                  
                                        ])
                                    </div>
                                    <div class="col-md-2 ms-2 mt-2">
                                        <button type="button" class="btn btn-dark btn-sm showmodal"
                                            data-show-modal="infoModal">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('partials.form.text', [
                                    'name' => 'title',
                                    'label' => 'Title',
                                 
                                ])
                                @include('partials.form.textarea', [
                                    'name' => 'description',
                                    'label' => 'Description',
                                    'rows' => 5,
                                
                                ])

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        @include('partials.form.text', [
                                            'name' => 'amount',
                                            'label' => 'Value',
                                            'type'=>'number',
                                        
                                        ])
                                    </div>
                                    <div class="col-sm-6">
                                        @include('partials.form.select', [
                                            'name' => 'currency',
                                            'label' => 'Currency',
                                            'options' => App\Helper\SelectOptions::currencies(),
                                     
                                        ])
                                    </div>
                                </div> --}}
                                @include('partials.form.select', [
                                    'name' => 'label',
                                    'label' => 'Label',
                                    'options' => App\Helper\SelectOptions::labels(),
              
                                ])

                                {{-- @include('partials.form.select', [
                                    'name' => 'user_owner_id',
                                    'label' => 'owner',
                                    'options' => App\Helper\SelectOptions::users(false),
                                   
                                ]) --}}
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-uppercase"><span class="fa fa-user" aria-hidden="true"></span> Person</h6>
                                <hr />
                                <span class="autocomplete-person">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            @include('partials.form.text', [
                                                'name' => 'email',
                                                'label' => 'Email',
                                               
                                            ])
                                        </div>
                                        <div class="col-sm-6">
                                            @include('partials.form.text', [
                                                'name' => 'phone',
                                                'label' => 'Phone',
                                               
                                            ])
                                        </div>

                                    </div>
                                </span>
                                <h6 class="text-uppercase mt-4"><span class="fa fa-building" aria-hidden="true"></span>
                                    Organization </h6>
                                <hr />
                                <span class="autocomplete-organisation">

                                    @include('partials.form.text', [
                                        'name' => 'address',
                                        'label' => 'Address',
                                       
                                    ])

                                    <div class="row">
                                        <div class="col-sm-6">
                                            @include('partials.form.text', [
                                                'name' => 'city',
                                                'label' => 'City',
                                               
                                            ])
                                        </div>
                                        <div class="col-sm-6">
                                            @include('partials.form.text', [
                                                'name' => 'state',
                                                'label' => 'state',
                                              
                                            ])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            @include('partials.form.text', [
                                                'name' => 'code',
                                                'label' => 'Post code',
                                              
                                            ])
                                        </div>
                                        <div class="col-sm-6">
                                            @include('partials.form.select', [
                                                'name' => 'country',
                                                'label' => 'Country',
                                                'options' => App\Helper\SelectOptions::countries(),
                                              
                                            ])
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <input type="hidden" name="category_id" id="categoryInput" value="">
                            <button class="btn btn-primary col-md-3 ms-3" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal mt-5 ms-5" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Add Organisation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('organisation.ajax') }}" id="organizationForm">
                        @csrf
                        @include('partials.form.text', [
                            'name' => 'name',
                            'label' => 'Name',
   
                            'attributes' => [
                                'required' => true,
                            ],
                        ])
                        @include('partials.form.select', [
                            'name' => 'label',
                            'label' => 'Label',
                            'options' => App\Helper\SelectOptions::labels(),
                           
                        ])
                        {{-- @include('partials.form.select', [
                            'name' => 'user_owner_id',
                            'label' => 'owner',
                            'options' => App\Helper\SelectOptions::users(false),
                            'value' => old('user_owner_id', $organisation->user_owner_id ?? auth()->user()->id),
                        ]) --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="createOrganisation()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal mt-5 ms-5" id="clientModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Add Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('client.ajax') }}" id="clientForm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">

                                @include('partials.form.text', [
                                    'name' => 'name',
                                    'label' => 'Name',
                                    'value' => old('client_name', $client->name ?? null),
                                ])
                            </div>
                            <div class="col-sm-6">

                                @include('partials.form.text', [
                                    'name' => 'meta[l_name]',
                                    'label' => 'Last name',
                                    'value' => old('client_name', isset($client) ? $client->l_name : null),
                                ])
                            </div>
                        </div>
                        {{-- @include('partials.form.select', [
                            'name' => 'user_owner_id',
                            'label' => 'owner',
                            'options' => App\Helper\SelectOptions::users(false),
                            'value' => old('user_owner_id', $organisation->user_owner_id ?? auth()->user()->id),
                        ]) --}}
                        @include('partials.form.text', [
                            'name' => 'phone',
                            'label' => 'Phone',
                            'value' => old('phone', $client->phone ?? null),
                        ])
                        @include('partials.form.text', [
                            'name' => 'email',
                            'label' => 'Email',
                            'value' => old('email', $client->email ?? null),
                        ])
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="createClient()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    Array.from(document.getElementsByClassName('showmodal')).forEach((e) => {
        e.addEventListener('click', function(element) {
            element.preventDefault();
            if (e.hasAttribute('data-show-modal')) {
                showModal(e.getAttribute('data-show-modal'));
            }
        });
    });
    // Show modal dialog
    function showModal(modal) {
        const mid = document.getElementById(modal);
        let myModal = new bootstrap.Modal(mid);
        myModal.show();
    }

    function createOrganisation() {
            var formData = $('#organizationForm').serialize();
            // console.log(formData);
            $.ajax({
                url: $('#organizationForm').attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    //    console.log(response.organisations)
                    $('#select_organisation_id').empty();
                    $.each(response.organisations, function(index, organisation) {
                        $('#select_organisation_id').append('<option selected value="' + organisation
                            .id + '">' +
                            organisation.name + '</option>');
                    });

                    $('#infoModal').modal('hide');
                    $('#select_organisation_id').trigger('change');

                    toastr.success('', 'Organisation added successfully');

                },
                error: function(error) {
                    // Handle error, if needed
                    console.error(error);
                }
            });
        }

        function createClient() {
            var formData = $('#clientForm').serialize();
            // console.log(formData);
            $.ajax({
                url: $('#clientForm').attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    //    console.log(response.organisations)
                    $('#select_client_id').empty();
                    $.each(response.clients, function(index, client) {
                        $('#select_client_id').append('<option selected value="' + client
                            .id + '">' +
                            client.name + '</option>');
                    });

                    $('#clientModal').modal('hide');
                    $('#select_client_id').trigger('change');


                    toastr.success('', 'Client added successfully');
                },
                error: function(error) {
                    // Handle error, if needed
                    console.error(error);
                }
            });
        }
</script>



@endpush
