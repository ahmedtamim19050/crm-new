@php
use Illuminate\Support\Facades\Cache;
    $controller = DzHelper::controller();
    $page = $action = DzHelper::action();
    $action = $controller . '_' . $action;

    $countries = Cache::remember('countries', 600, function () {
        // This callback will be executed if the 'countries' key is not found in the cache
        return DB::table('countries')
            ->pluck('name', 'name')
            ->toArray();
    });
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title> CRM | @yield('title', $page_title ?? 'Dashboard')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard" />
    <meta name="author" content="DexignZone" />
    <meta name="robots" content="index, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="fasto : sass Admin Dashboard  Bootstrap 5 Laravel Template" />
    <meta property="og:title" content="fasto : sass Admin Dashboard  Bootstrap 5 Laravel Template" />
    <meta property="og:description" content="fasto : sass Admin Dashboard  Bootstrap 5 Laravel Template" />
    <meta property="og:image" content="https://fasto.dexignzone.com/laravel/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.ico') }}">

    @if (!empty(config('dz.public.pagelevel.css.' . $action)))
        @foreach (config('dz.public.pagelevel.css.' . $action) as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
        @endforeach
    @endif

    {{-- Global Theme Styles (used by all pages) --}}
    @if (!empty(config('dz.public.global.css')))
        @foreach (config('dz.public.global.css') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
        @endforeach
    @endif
    @livewireStyles
    @yield('css')
    <style>
        .table-responsive {
            height: 70vh !important;
        }
        .DZ-bt-buy-now, .DZ-bt-support-now {
            display: none !important;
        }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

        <div class="nav-header">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                {{-- <svg class="logo-abbr" width="52" height="52" viewBox="0 0 52 52" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path class="svg-logo-path"
                        d="M0 12C0 5.37258 5.37258 0 12 0H26C40.3594 0 52 11.6406 52 26C52 40.3594 40.3594 52 26 52C11.6406 52 0 40.3594 0 26V12Z"
                        fill="#43DC80" />
                    <mask id="mask0" maskUnits="userSpaceOnUse" x="0" y="0" width="52" height="52">
                        <path class="svg-logo-path"
                            d="M0 12C0 5.37258 5.37258 0 12 0H26C40.3594 0 52 11.6406 52 26C52 40.3594 40.3594 52 26 52C11.6406 52 0 40.3594 0 26V12Z"
                            fill="#43DC80" />
                    </mask>
                    <g mask="url(#mask0)">
                        <circle class="svg-logo-circle" cx="54" cy="13" r="26" fill="#34D574" />
                        <circle class="svg-logo-circle" cx="23" cy="62" r="20" fill="#50E98D" />
                        <circle class="svg-logo-circle" cx="12.5" cy="41.5" r="13" stroke="#50E98D" />
                    </g>
                    <path class="svg-logo-text"
                        d="M18.652 37V21.208C18.652 19.9013 18.904 18.8933 19.408 18.184C19.9307 17.456 20.5747 16.952 21.34 16.672C22.1053 16.3733 22.8707 16.224 23.636 16.224C24.252 16.224 25.064 16.2333 26.072 16.252C27.08 16.2707 28.172 16.308 29.348 16.364C30.524 16.42 31.644 16.5133 32.708 16.644V20.704H25.008C24.4853 20.704 24.1027 20.844 23.86 21.124C23.6173 21.404 23.496 21.7307 23.496 22.104V25.016L31.336 25.268V29.104L23.496 29.356V37H18.652Z"
                        fill="white" />
                </svg> --}}
                {{-- <svg class="brand-title" width="85" height="27" viewBox="0 0 85 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path class="svg-logo-title"
                        d="M0.00600014 26V6.824C0.00600014 5.23733 0.312 4.01333 0.924 3.152C1.55867 2.268 2.34067 1.656 3.27 1.316C4.19933 0.953332 5.12867 0.771999 6.058 0.771999C6.806 0.771999 7.792 0.783332 9.016 0.805998C10.24 0.828666 11.566 0.873999 12.994 0.941998C14.422 1.01 15.782 1.12333 17.074 1.282V6.212H7.724C7.08933 6.212 6.62467 6.382 6.33 6.722C6.03533 7.062 5.888 7.45867 5.888 7.912V11.448L15.408 11.754V16.412L5.888 16.718V26H0.00600014ZM22.671 26.204C21.2657 26.204 20.1323 25.796 19.271 24.98C18.4097 24.1413 17.979 23.008 17.979 21.58V19.812C17.979 18.4293 18.4663 17.2847 19.441 16.378C20.4383 15.4713 21.991 15.018 24.099 15.018H28.247V14.134C28.247 13.6353 28.1563 13.2387 27.975 12.944C27.8163 12.6267 27.465 12.4 26.921 12.264C26.3997 12.1053 25.595 12.026 24.507 12.026H19.135V8.66C20.0417 8.34266 21.0957 8.07067 22.297 7.844C23.4983 7.61733 24.9717 7.49267 26.717 7.47C28.2357 7.47 29.5503 7.65133 30.661 8.014C31.7717 8.37667 32.6217 9.01133 33.211 9.918C33.823 10.802 34.129 12.0713 34.129 13.726V26H29.471L28.553 24.13C28.281 24.3793 27.873 24.674 27.329 25.014C26.785 25.3313 26.1163 25.6147 25.323 25.864C24.5297 26.0907 23.6457 26.204 22.671 26.204ZM25.697 22.158C25.9917 22.1807 26.3203 22.1467 26.683 22.056C27.0457 21.9653 27.3743 21.8747 27.669 21.784C27.9637 21.6707 28.1563 21.58 28.247 21.512V17.772L26.071 17.976C24.575 18.1347 23.827 18.7693 23.827 19.88V20.594C23.827 21.1833 23.997 21.5913 24.337 21.818C24.6997 22.0447 25.153 22.158 25.697 22.158ZM44.1848 26.204C43.3688 26.204 42.5188 26.17 41.6348 26.102C40.7508 26.034 39.9121 25.932 39.1188 25.796C38.3254 25.66 37.6568 25.4787 37.1128 25.252V21.818H45.4088C45.9754 21.818 46.3721 21.75 46.5988 21.614C46.8254 21.4553 46.9388 21.172 46.9388 20.764V20.254C46.9388 19.9367 46.8254 19.6873 46.5988 19.506C46.3948 19.302 45.9641 19.2 45.3068 19.2H42.3148C41.2948 19.2 40.3541 19.0413 39.4928 18.724C38.6541 18.4067 37.9854 17.874 37.4868 17.126C36.9881 16.378 36.7388 15.3693 36.7388 14.1V13.012C36.7388 11.8333 36.9654 10.836 37.4188 10.02C37.8721 9.204 38.6541 8.592 39.7648 8.184C40.8754 7.75333 42.4281 7.538 44.4228 7.538C45.2161 7.538 46.0434 7.58333 46.9048 7.674C47.7661 7.76467 48.5594 7.88933 49.2848 8.048C50.0328 8.184 50.6221 8.33133 51.0528 8.49V11.924H43.1988C42.7001 11.924 42.3261 12.0033 42.0768 12.162C41.8501 12.298 41.7368 12.5813 41.7368 13.012V13.488C41.7368 13.9187 41.8728 14.202 42.1448 14.338C42.4168 14.474 42.8701 14.542 43.5048 14.542H46.5308C48.4574 14.542 49.8288 14.984 50.6448 15.868C51.4834 16.7293 51.9028 17.9307 51.9028 19.472V21.206C51.9028 23.0647 51.2568 24.368 49.9648 25.116C48.6728 25.8413 46.7461 26.204 44.1848 26.204ZM61.9272 26C60.4538 26 59.2525 25.796 58.3232 25.388C57.4165 24.9573 56.7592 24.2547 56.3512 23.28C55.9658 22.3053 55.8072 20.9793 55.8752 19.302L56.0452 12.366H53.2232V8.626L56.2832 7.708L57.0312 2.574H61.6892V7.708H65.6672V12.366H61.6892V19.268C61.6892 20.0387 61.8252 20.5827 62.0972 20.9C62.3692 21.1947 62.7318 21.3647 63.1852 21.41L65.4972 21.648V26H61.9272ZM76.1896 26.17C74.0816 26.17 72.4043 25.8753 71.1576 25.286C69.911 24.674 69.0043 23.688 68.4376 22.328C67.8936 20.9453 67.6216 19.1093 67.6216 16.82C67.6216 14.3493 67.905 12.434 68.4716 11.074C69.0383 9.714 69.945 8.762 71.1916 8.218C72.4383 7.674 74.1043 7.402 76.1896 7.402C78.2976 7.402 79.975 7.68533 81.2216 8.252C82.4683 8.81867 83.375 9.782 83.9416 11.142C84.5083 12.502 84.7916 14.3947 84.7916 16.82C84.7916 19.1773 84.5196 21.0473 83.9756 22.43C83.4316 23.79 82.5363 24.7533 81.2896 25.32C80.043 25.8867 78.343 26.17 76.1896 26.17ZM76.1896 21.512C76.8696 21.512 77.4023 21.4213 77.7876 21.24C78.1956 21.036 78.479 20.6053 78.6376 19.948C78.819 19.268 78.9096 18.214 78.9096 16.786C78.9096 15.358 78.819 14.3153 78.6376 13.658C78.479 13.0007 78.1956 12.5813 77.7876 12.4C77.4023 12.196 76.8696 12.094 76.1896 12.094C75.5323 12.094 74.9996 12.196 74.5916 12.4C74.2063 12.5813 73.923 13.0007 73.7416 13.658C73.583 14.3153 73.5036 15.358 73.5036 16.786C73.5036 18.214 73.583 19.268 73.7416 19.948C73.923 20.6053 74.2063 21.036 74.5916 21.24C74.9996 21.4213 75.5323 21.512 76.1896 21.512Z"
                        fill="#4B8067" />
                </svg> --}}
                <img src="{{ asset('frontend-assets/images/xainia-logo.png') }}" class="brand-title" alt="" height="52">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        @include('elements.header')

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        @include('elements.sidebar')

        <!--**********************************
            Sidebar end
        ***********************************-->
        @php
            $body_class = '';
            if ($page == 'ui_button') {
                $body_class = 'btn-page';
            }
            if ($page == 'ui_badge') {
                $body_class = 'badge-demo';
            }
        @endphp
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body {{ $body_class }}">
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        @stack('modals')

        <!--**********************************
            Footer start
        ***********************************-->
        @include('elements.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    @php
        $clients = App\Models\Client::where('user_id', auth()->id())
            ->pluck('name', 'id')
            ->toArray();
    @endphp

    <div class="modal mt-5 ms-5" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Add Organisation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('organisation.ajax') }}" id="organizationForm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                @include('partials.form.select', [
                                    'name' => 'client_id',
                                    'label' => 'Customer',
                                    'options' => $clients,
                                ])

                                @include('partials.form.text', [
                                    'name' => 'name',
                                    'label' => 'Name',
                                    'attributes' => [
                                        'required' => 'required',
                                    ],
                                ])
                                @include('partials.form.select', [
                                    'name' => 'label',
                                    'label' => 'Label',
                                    'options' => App\Helper\SelectOptions::labels(),
                                ])
                                @include('partials.form.text', [
                                    'name' => 'meta[street]',
                                    'label' => 'Street address',
                                ])
                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[place]',
                                            'label' => 'Place',
                                        ])
                                    </div>
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[post_code]',
                                            'label' => 'Zip',
                                        ])
                                    </div>
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[state]',
                                            'label' => 'State',
                                        ])
                                    </div>
                                    <div class="col-sm-12">
                                        @include('partials.form.select', [
                                            'name' => 'meta[country]',
                                            'label' => 'Country',
                                            'options' => $countries,
                                        ])
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    @include('partials.form.text', [
                                        'name' => 'meta[company_email]',
                                        'label' => 'Email',
                                        'attributes' => [
                                            'required' => 'required',
                                        ],
                                    ])
                                </div>

                                <div class="col-sm-12">
                                    @include('partials.form.text', [
                                        'name' => 'meta[company_phone]',
                                        'label' => 'Phone',
                                        'attributes' => [
                                            'required' => 'required',
                                        ],
                                    ])
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[company_twitter]',
                                            'label' => 'X/Twitter Profile',
                                        ])
                                    </div>
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[company_tiktok]',
                                            'label' => 'Tiktok Profile',
                                        ])
                                    </div>
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[company_youtube]',
                                            'label' => 'Youtube profile',
                                        ])
                                    </div>
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[company_fb]',
                                            'label' => 'Facebook profile',
                                        ])
                                    </div>
                                    <div class="col-sm-12">
                                        @include('partials.form.text', [
                                            'name' => 'meta[niche]',
                                            'label' => 'Niche',
                                        ])
                                    </div>

                                </div>

                            </div>


                        </div>





                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal mt-5 ms-5" id="clientModal" tabindex="-1" aria-labelledby="infoModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Add Contact</h5>
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
                        {{-- @include('partials.form.select', [
                        'name' => 'user_owner_id',
                        'label' => 'owner',
                        'options' => App\Helper\SelectOptions::users(false),
                      
                    ]) --}}
                        @include('partials.form.text', [
                            'name' => 'phone',
                            'label' => 'Phone',
                        ])
                        @include('partials.form.text', [
                            'name' => 'email',
                            'label' => 'Email',
                        ])
                        @include('partials.form.text', [
                            'name' => 'meta[position]',
                            'label' => 'Position',
                        ])
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary" onclick="createClient()">Save</button>
                </div>
            </div>
        </div>
    </div>




    @if (!empty(config('dz.public.global.js.top')))
        @foreach (config('dz.public.global.js.top') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endif
    @if (!empty(config('dz.public.pagelevel.js.' . $action)))
        @foreach (config('dz.public.pagelevel.js.' . $action) as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endif
    @if (!empty(config('dz.public.global.js.bottom')))
        @foreach (config('dz.public.global.js.bottom') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endif
    {{-- @livewireScripts --}}
    @stack('scripts')

    @if (session()->has('success'))
        <x-alert.success />
    @endif

    @if (session()->has('errors'))
        @foreach (session('errors')->all() as $item)
            <x-alert.error :error="$item" />
        @endforeach
    @endif


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#organizationForm").validate({
                submitHandler: function(form) {
                    createOrganisation();
                }
            });
        });


        function createOrganisation() {
            var formData = $('#organizationForm').serialize();
            $.ajax({
                url: $('#organizationForm').attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    //    console.log(response.organisations)
                    $('#select_organisation_id').empty();
                    $.each(response.organisations, function(index, organisation) {
                        $('#select_organisation_id').append('<option selected value="' +
                            organisation
                            .id + '">' +
                            organisation.name + '</option>');
                    });

                    console.log(response.data);
                    $('#infoModal').modal('hide');
                    $('#input_email').val(response.data.email);
                    $('#input_phone').val(response.data.phone);
                    $('#input_address').val(response.data.street);
                    $('#input_city').val(response.data.city);
                    $('#input_state').val(response.data.state);
                    $('#input_code').val(response.data.post_code);
                    $('#input_state').val(response.data.state);
                    $('#select_country').val(response.data.country);
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
                    $('#input_email').val(response.email);
                    $('#input_phone').val(response.phone);
                    $('#input_address').val(response.street);
                    $('#input_code').val(response.post_code);
                    $('#input_state').val(response.state);
                    $('#select_country').val(response.country);


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
        $(document).ready(function() {
            $('#select_organisation_id').on('change', function() {
                console.log('cliecked')
                var orgId = $(this).val();
                $.ajax({
                    url: '/dashboard/organisation/fetch',
                    type: 'get',
                    data: {
                        orgId: orgId
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Ajax response:', response['email']);
                        $('#input_email').val(response['email']);
                        $('#input_phone').val(response['phone']);
                        $('#input_address').val(response['street']);
                        $('#input_code').val(response['post_code']);
                        $('#input_state').val(response.state);
                        $('#input_city').val(response.city);
                        $('#select_country').val(response.country);
                    },
                    error: function(error) {
                        console.error('Ajax error:', error);
                    }
                });
            });
        });
    </script>

</body>

</html>
