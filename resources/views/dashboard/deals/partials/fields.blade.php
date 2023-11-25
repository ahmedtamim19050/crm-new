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

            {{-- @livewire('live-lead-form',[
                'lead' => $deal ?? null,
                'generateTitle' => $generateTitle ?? true,
                'client' => $client ?? null,
                'organisation' => $organisation ?? null,
                'person' => $person ?? null
            ]) --}}

    
            @include('partials.form.text', [
                'name' => 'client_name',
                'label' => 'Customer',
                'value' => old('client_name', $deal->client->name ?? null),
            ])
            @include('partials.form.text', [
                'name' => 'organisation_name',
                'label' => 'Organization',
                'value' => old('organisation_name', $deal->organisation->name ?? null),
            ])
            @include('partials.form.text', [
                'name' => 'person_name',
                'label' => 'Contact Person',
                'value' => old('person_name', $deal->person->name ?? null),
            ])
            @include('partials.form.text', [
                'name' => 'title',
                'label' => 'Title',
                'value' => old('title', $deal->title ?? null),
            ])
            @include('partials.form.textarea', [
                'name' => 'description',
                'label' => 'Description',
                'rows' => 5,
                'value' => old('description', $deal->description ?? null),
            ])

            <div class="row">
                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'name' => 'amount',
                        'label' => 'Value',
                        'value' => old('amount', (isset($deal->amount) ? $deal->amount / 100 : null) ?? null),
                    ])
                </div>
                <div class="col-sm-6">
                    @include('partials.form.select', [
                        'name' => 'currency',
                        'label' => 'Currency',
                        'options' => App\Helper\SelectOptions::currencies(),
                        'value' => old('currency', $deal->currency ?? 'USD'),
                    ])
                </div>
            </div>
            @include('partials.form.select', [
                'name' => 'labels',
                'label' => 'Labels',
                'options' => $labels,
                'value' => old('labels', isset($deal) ? $deal->labels->pluck('id')->toArray() : null),
            ])

            @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $deal->user_owner_id ?? auth()->user()->id),
            ])
        </div>
        <div class="col-sm-6">
            <h6 class="text-uppercase"><span class="fa fa-user" aria-hidden="true"></span> Person</h6>
            <hr />
            <span class="autocomplete-person">
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'phone',
                            'label' => 'Phone',
                            'value' => old('phone', $phone->number ?? null),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.select', [
                            'name' => 'phone_type',
                            'label' => 'Type',
                            'options' => App\Helper\SelectOptions::phoneTypes(),
                            'value' => old('phone_type', $phone->type ?? 'mobile'),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'email',
                            'label' => 'Email',
                            'value' => old('email', $email->address ?? null),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.select', [
                            'name' => 'email_type',
                            'label' => 'type',
                            'options' => App\Helper\SelectOptions::emailTypes(),
                            'value' => old('email_type', $email->type ?? 'work'),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                </div>
            </span>
            <h6 class="text-uppercase mt-4"><span class="fa fa-building" aria-hidden="true"></span> Organization </h6>
            <hr />
            <span class="autocomplete-organisation">
                {{-- @include('laravel-crm::partials.form.text',[
                    'name' => 'address',
                    'label' => ucfirst(__('laravel-crm::lang.address')),
                    'value' => old('address', $address ?? null)
                ]) --}}
                @include('partials.form.text', [
                    'name' => 'line1',
                    'label' => 'Address line 1',
                    'value' => old('line1', $address->line1 ?? null),
                    //    'attributes' => [
                    //              'disabled' => 'disabled'
                    //          ]
                ])
                @include('partials.form.text', [
                    'name' => 'line2',
                    'label' => 'Address line 2',
                    'value' => old('line2', $address->line2 ?? null),
                    //    'attributes' => [
                    //              'disabled' => 'disabled'
                    //          ]
                ])
                @include('partials.form.text', [
                    'name' => 'line3',
                    'label' => 'address line 3',
                    'value' => old('line3', $address->line3 ?? null),
                    //    'attributes' => [
                    //              'disabled' => 'disabled'
                    //          ]
                ])
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'city',
                            'label' => 'City',
                            'value' => old('city', $address->city ?? null),
                            // 'attributes' => [
                            //     'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'state',
                            'label' => 'state',
                            'value' => old('state', $address->state ?? null),
                            //    'attributes' => [
                            //              'disabled' => 'disabled'
                            //     ]
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'code',
                            'label' => 'Post code',
                            'value' => old('code', $address->code ?? null),
                            // 'attributes' => [
                            //  'disabled' => 'disabled'
                            // ]
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.select', [
                            'name' => 'country',
                            'label' => 'Country',
                            'options' => App\Helper\SelectOptions::countries(),
                            'value' => old('country', $address->country ?? 'United States'),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
