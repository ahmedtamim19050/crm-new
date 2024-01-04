<div class="container-fluid">


    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <p class="mb-0">Leads Table</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Leads</a></li>
            </ol>
        </div>
        <div class="col-md-3 mt-3">

            <a href="javascript:void(0);" data-bs-toggle="modal" class="btn btn-primary"
                data-bs-target="#addContactModal" class="text-dark py-3">+Add Lead</a>
        </div>
    </div>

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
                                    {{-- <th> <strong>Owner </strong></th> --}}

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leads as $lead)
                                    <tr>
                                        <td><strong>{{ $loop->index + 1 }}</strong></td>
                                        <td>{{ $lead->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('leads.show', $lead) }}"
                                                class="text-primary text-decoration-underline">{{ $lead->title }}</a>
                                        </td>
                                        <td>

                                            <span class="badge light badge-success text-white"
                                                style="background-color:{{ $lead->labelName->color ?? null }}">{{ $lead->labelName->name ?? null }}</span>
                                        </td>

                                        <td>{{ $lead->amount, $lead->currency }}</td>

                                        <td>{{ $lead->client->name ?? null }}</td>
                                        <td>{{ $lead->organisation->name ?? null }}</td>
                                        {{-- <td>{{ $lead->ownerUser->name ?? null }}</td> --}}
                                        <td>
                                            <x-delete class="btn btn-danger btn-sm" :route="route('leads.destroy', $lead)" />
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
                <h5 class="modal-title">Add Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url(route('leads.store')) }}">
                    @csrf

                    @include('dashboard.leads.partials.fields')

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
                          
                        ])
                    </div>
                    <div class="col-sm-6">

                        @include('partials.form.text', [
                            'name' => 'meta[l_name]',
                            'label' => 'Last name',
                        
                        ])
                    </div>
                   </div>
                    @include('partials.form.select', [
                        'name' => 'user_owner_id',
                        'label' => 'owner',
                        'options' => App\Helper\SelectOptions::users(false),
                      
                    ])
                    @include('partials.form.text', [
                        'name' => 'phone',
                        'label' => 'Phone',

                    ])
                    @include('partials.form.text', [
                        'name' => 'email',
                        'label' => 'Email',

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
                $('#input_email').val(response.email);
                $('#input_phone').val(response.phone);
                $('#input_address').val(response.street);
                $('#input_code').val(response.post_code);
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
<script>
    $(document).ready(function () {
    $('#select_organisation_id').on('change', function () {
        console.log('cliecked')
        var orgId = $(this).val();
        $.ajax({
            url: '/dashboard/organisation/fetch',
            type: 'get',
            data: {orgId: orgId},
            dataType: 'json',
            success: function (response) {
                console.log('Ajax response:', response['email']);
                $('#input_email').val(response['email']);
                $('#input_phone').val(response['phone']);
                $('#input_address').val(response['street']);
                $('#input_code').val(response['post_code']);
            },
            error: function (error) {
                console.error('Ajax error:', error);
            }
        });
    });
});
</script>