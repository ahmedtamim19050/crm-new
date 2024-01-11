{{-- <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <span>Element</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
        </ol>
    </div>
</div> --}}

<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">

            <div class="row">
                <div class="col-sm-12">

                    @include('partials.form.text', [
                        'name' => 'name',
                        'label' => 'First name',
                        'attributes' => [
                            'required' => 'required',
                        ],
                    ])
                </div>
                <div class="col-sm-12">

                    @include('partials.form.text', [
                        'name' => 'meta[l_name]',
                        'label' => 'Last name',
                    ])
                </div>
            </div>
            {{-- @dd($client->organisation->pluck('id')->toArray() ); --}}


            <div class="d-flex align-items-center">
                <div class="col-md-10">

                    @include('partials.form.select', [
                        'name' => 'organisation_id',
                        'label' => 'Organisation',
                        'options' => $organisations,
                    ])
                </div>
                <div class="col-md-2 ms-2 mt-2">
                    <button type="button" class="btn btn-dark btn-sm showmodal" data-show-modal="infoModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            {{-- @include('partials.form.select', [
                'name' => 'label',
                'label' => 'Label',
                'options' => App\Helper\SelectOptions::labels(),
                'value' => old('labels', isset($client) ? $client->label : null),
            ]) --}}
            {{-- @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $client->user_owner_id ?? auth()->user()->id),
            ]) --}}
        </div>
        <div class="col-md-6">
            @include('partials.form.text', [
                'name' => 'phone',
                'label' => 'Phone',
            ])
            @include('partials.form.text', [
                'name' => 'email',
                'label' => 'Email',
                'attributes' => [
                    'required' => 'required',
                ],
            ])
            @include('partials.form.text', [
                'name' => 'meta[position]',
                'label' => 'Position',
            ])
        </div>
    </div>
</div>
