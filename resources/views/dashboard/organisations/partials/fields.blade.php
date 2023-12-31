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
                'value' => old('meta', isset($organisation) ? $organisation->street : null),
            ])
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[place]',
                        'label' => 'Place',
                        'value' => old('place', isset($organisation) ? $organisation->place : null),
                    ])
                </div>
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[post_code]',
                        'label' => 'Zip',
                        'value' => old('post_code', isset($organisation) ? $organisation->post_code : null),
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[company_email]',
                        'label' => 'Email',
                        'value' => old(
                            'company_email',
                            isset($organisation) ? $organisation->company_email : null),
                    ])
                </div>
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[company_phone]',
                        'label' => 'Phone',
                        'value' => old(
                            'company_phone',
                            isset($organisation) ? $organisation->company_phone : null),
                    ])
                </div>
            </div>

        </div>
        <div class="col-sm-6">


            <h6 class="text-uppercase"><span class="fa fa-user" aria-hidden="true"></span> Company Info</h6>
            <hr />
            <span class="autocomplete-person">



                <div class="row">
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_twitter]',
                            'label' => 'X/Twitter Profile',
                            'value' => old(
                                'company_twitter',
                                isset($organisation) ? $organisation->company_twitter : null),
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_tiktok]',
                            'label' => 'Tiktok Profile',
                            'value' => old(
                                'company_tiktok',
                                isset($organisation) ? $organisation->company_tiktok : null),
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_youtube]',
                            'label' => 'Youtube profile',
                            'value' => old(
                                'company_youtube',
                                isset($organisation) ? $organisation->company_youtube : null),
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_fb]',
                            'label' => 'Facebook profile',
                            'value' => old(
                                'company_youtube',
                                isset($organisation) ? $organisation->company_fb : null),
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[niche]',
                            'label' => 'Niche',
                            'value' => old('niche', isset($organisation) ? $organisation->niche : null),
                        ])
                    </div>
                    <div class="col-sm-12 d-flex justify-content-between">
                        <p class="text-primary">Add other social url</p>
                        <button type="button" class="btn btn-secondary btn-sm py-2" id="addColumnButton"><i
                                class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-12 clientRow" id="">


                       

                    </div>


                </div>




        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var columnCounter = 1;

    $('#addColumnButton').on('click', function() {
        columnCounter += 1;

        $('.clientRow').each(function() {
            for (var i = 0; i < 1; i++) {
                $(this).append(` @include('partials.form.text', [
                            'name' => 'meta[niche]',
                            'label' => 'Social name',
                        ])

                        @include('partials.form.text', [
                            'name' => 'meta[niche]',
                            'label' => 'Social Url',
                        ])
`);
            }
        });
    });
</script>
