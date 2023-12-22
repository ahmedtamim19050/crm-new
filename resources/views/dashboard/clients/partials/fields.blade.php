<div class="row page-titles mx-0">
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
</div>

<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">

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
                        'value' => old('client_name', isset($client) ? $client->l_name : null ),
                    ])
                </div>
            </div>
            {{-- @dd($client->organisation->pluck('id')->toArray() ); --}}
            @include('partials.form.select', [
                'name' => 'organisation_id',
                'label' => 'Organisation',
                'options' => $organisations,
                'value' => old('organisation', isset($client) ? $client->organisation->id : null),
            ])
            {{-- @include('partials.form.select', [
                'name' => 'label',
                'label' => 'Label',
                'options' => App\Helper\SelectOptions::labels(),
                'value' => old('labels', isset($client) ? $client->label : null),
            ]) --}}
            @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $client->user_owner_id ?? auth()->user()->id),
            ])
        </div>
        <div class="col-md-6">
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
        </div>
    </div>
</div>
