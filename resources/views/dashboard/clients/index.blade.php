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
                    <div class="row">
                        <div class="col-md-6">
                            @include('partials.form.text', [
                                'name' => 'name',
                                'label' => 'Name',
                                'value' => old('client_name', $organisation->name ?? null),
                                'attributes' => [
                                    'required' => true,
                                ],
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('partials.form.select', [
                                'name' => 'label',
                                'label' => 'Label',
                                'options' => App\Helper\SelectOptions::labels(),
                                'value' => old('labels', isset($organisation) ? $organisation->label : null),
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('partials.form.text', [
                                'name' => 'meta[street]',
                                'label' => 'Street address',
                      
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('partials.form.text', [
                                'name' => 'meta[place]',
                                'label' => 'Place',
                               
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('partials.form.text', [
                                'name' => 'meta[post_code]',
                                'label' => 'Zip',
                           
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('partials.form.text', [
                                'name' => 'meta[company_email]',
                                'label' => 'Email',
                      
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('partials.form.text', [
                                'name' => 'meta[company_phone]',
                                'label' => 'Phone',
                           
                            ])
                        </div>
                    </div>
                  
            
                 
         
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="createOrganisation()">Save</button>
            </div>
        </div>
    </div>
</div>
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
</script>

    <script>
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
    </script>
@endsection
