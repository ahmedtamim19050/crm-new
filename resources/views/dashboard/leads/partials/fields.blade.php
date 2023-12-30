<style>
    select {
        height: 46px !important;
    }
</style>

<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">

            @include('partials.form.select', [
                'name' => 'client_id',
                'label' => 'Customer',
                'options' => $clients,
                'value' => old('client_id', isset($lead) ? $lead->client->id : null),
            ])
            <div class="d-flex align-items-center">
                <div class="col-md-10">

                    @include('partials.form.select', [
                        'name' => 'organisation_id',
                        'label' => 'Organisation',
                        'options' => $organisations,
                        'value' => old('organisation_id', isset($deal) ? $deal->organisation->id : null),
                    ])
                </div>
                <div class="col-md-2 ms-2 mt-2">
                    <button type="button" class="btn btn-dark btn-sm showmodal" data-show-modal="infoModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            @include('partials.form.text', [
                'name' => 'title',
                'label' => 'Title',
                'value' => old('title', $lead->title ?? null),
            ])


            <div class="row">
                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'type' => 'number',
                        'name' => 'amount',
                        'label' => 'Value',
                        'value' => old('amount', $lead->amount ?? null),
                    ])
                </div>
                <div class="col-sm-6">
                    @include('partials.form.select', [
                        'name' => 'currency',
                        'label' => 'Currency',
                        'options' => App\Helper\SelectOptions::currencies(),
                        'value' => old('currency', $lead->currency ?? 'USD'),
                    ])
                </div>
            </div>
            @include('partials.form.select', [
                'name' => 'label',
                'label' => 'Label',
                'options' => App\Helper\SelectOptions::labels(),
                'value' => old('labels', isset($lead) ? $lead->label : null),
            ])

            @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $lead->user_owner_id ?? auth()->user()->id),
            ])
            @include('partials.form.text', [
                'type' => 'date',
                'name' => 'meta[close_date]',
                'label' => 'Expected Close Date',
                'value' => old('close_date', isset($lead) ? $lead->close_date : null),
            ])
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
                            'value' => old('email', $lead->email ?? null),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'phone',
                            'label' => 'Phone',
                            'value' => old('phone', $lead->phone ?? null),
                        ])
                    </div>


                </div>
            </span>
            <h6 class="text-uppercase mt-4"><span class="fa fa-building" aria-hidden="true"></span> Organization </h6>
            <hr />
            <span class="autocomplete-organisation">
                @include('partials.form.text', [
                    'name' => 'address',
                    'label' => 'Address',
                    'value' => old('address', $lead->address ?? null),
                ])

                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'city',
                            'label' => 'City',
                            'value' => old('city', $lead->city ?? null),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'state',
                            'label' => 'state',
                            'value' => old('state', $lead->state ?? null),
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'code',
                            'label' => 'Post code',
                            'value' => old('code', $lead->post_code ?? null),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.select', [
                            'name' => 'country',
                            'label' => 'Country',
                            'options' => App\Helper\SelectOptions::countries(),
                            'value' => old('country', $lead->country ?? 'United States'),
                        ])
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>






