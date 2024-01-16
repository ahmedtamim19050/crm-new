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
                                    {{-- <th><strong>Title</strong></th> --}}
                                    <th> <strong> Organisation </strong></th>
                                    <th><strong>Label</strong></th>
                                    <th><strong>Address</strong></th>
                                    <th><strong>Country</strong></th>
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
                                                class="text-primary text-decoration-underline">
                                                {{ $lead->organisation->name ?? null }}</a>
                                        </td>
                                        <td>

                                            <span class="badge light badge-success text-white"
                                                style="background-color:{{ $lead->labelName->color ?? null }}">{{ $lead->labelName->name ?? null }}</span>
                                        </td>

                                        <td>{{ $lead->address}},{{ $lead->post_code}},{{ $lead->city}},{{ $lead->state}}</td>

                                        <td>{{ $lead->country ?? null }}</td>
     
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

        
                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>


{{-- <div class="modal mt-5 ms-5" id="clientModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true"
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

                <button type="button" class="btn btn-primary" onclick="createClient()">Save</button>
            </div>
        </div>
    </div>
</div> --}}

