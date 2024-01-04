<style>
    select {
        height: 46px !important;
    }
</style>

<div class="card p-4">
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
                    <button type="button" class="btn btn-dark btn-sm showmodal" data-show-modal="clientModal">
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
                    <button type="button" class="btn btn-dark btn-sm showmodal" data-show-modal="infoModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            @include('partials.form.text', [
                'name' => 'title',
                'label' => 'Title',
               
            ])

{{-- 
            <div class="row">
                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'type' => 'number',
                        'name' => 'amount',
                        'label' => 'Value',
                      
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
            @include('partials.form.text', [
                'type' => 'date',
                'name' => 'meta[close_date]',
                'label' => 'Expected Close Date',
             
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
            <h6 class="text-uppercase mt-4"><span class="fa fa-building" aria-hidden="true"></span> Organization </h6>
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
    </div>
</div>






