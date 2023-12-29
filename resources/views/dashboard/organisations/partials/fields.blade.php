{{-- @dd( $organisation); --}}
<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">

            @include('partials.form.text', [
                'name' => 'name',
                'label' => 'Name',
                'value' => old('client_name', $organisation->name ?? null),
            ])
            @include('partials.form.select', [
                'name' => 'label',
                'label' => 'Label',
                'options' => App\Helper\SelectOptions::labels(),
                'value' => old('labels', isset($organisation) ? $organisation->label : null),
            ])
            @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $organisation->user_owner_id ?? auth()->user()->id),
            ])
            {{-- @include('partials.form.textarea', [
                'name' => 'address',
                'label' => 'Address',
                'rows' => 5,
                'value' => old('address', $organisation->address ?? null),
            ]) --}}
               @include('partials.form.text', [
                'name' => 'meta[street]',
                'label' => 'Street address',
                'value' => old('meta', $organisation->street),
            ])
            <div class="row">
                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'name' => 'meta[place]',
                        'label' => 'Place',
                        'value' => old('place', $organisation->place),
                    ])
                </div>
                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'name' => 'meta[post_code]',
                        'label' => 'Zip',
                        'value' => old('post_code', $organisation->post_code),
                    ])
                </div>
            </div>

        </div>
        <div class="col-sm-6">
         
         
            <h6 class="text-uppercase"><span class="fa fa-user" aria-hidden="true"></span> Company Info</h6>
            <hr />
            <span class="autocomplete-person">

                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'meta[company_email]',
                            'label' => 'Email',
                            'value' => old('company_email', $organisation->company_email),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'meta[company_phone]',
                            'label' => 'Phone',
                            'value' => old('company_phone', $organisation->company_phone),
                        ])
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'meta[company_twitter]',
                            'label' => 'X/Twitter Profile',
                            'value' => old('company_twitter', $organisation->company_twitter),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'meta[company_tiktok]',
                            'label' => 'Tiktok Profile',
                            'value' => old('company_tiktok', $organisation->company_tiktok),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'meta[company_youtube]',
                            'label' => 'Youtube profile',
                            'value' => old('company_youtube', $organisation->company_youtube),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'meta[company_fb]',
                            'label' => 'Facebook profile',
                            'value' => old('company_youtube', $organisation->company_fb),
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'meta[niche]',
                            'label' => 'Niche',
                            'value' => old('niche', $organisation->niche),
                        ])
                    </div>
                </div>




        </div>
    </div>

</div>
