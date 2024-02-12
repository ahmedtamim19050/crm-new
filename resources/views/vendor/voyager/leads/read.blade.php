@extends('voyager::master')

@section('page_title', __('voyager::generic.view') . ' ' . $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }}
        {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.' . $dataType->slug . '.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-pencil"></i> <span
                    class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if ($isSoftDeleted)
                <a href="{{ route('voyager.' . $dataType->slug . '.restore', $dataTypeContent->getKey()) }}"
                    title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore"
                    data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete"
                    data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
            <a href="{{ route('voyager.' . $dataType->slug . '.index') }}" class="btn btn-warning">
                <i class="glyphicon glyphicon-list"></i> <span
                    class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
            </a>
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    @php
        $organisations = App\Models\Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();

    @endphp
    <div class="container-fluid mx-2">

        <style>
            .card-body p span {
                margin-left: 10px;
            }
        </style>

        <div class="row">


            <div class="col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />
                        <p>
                            @if ($dataTypeContent->labelName)
                                <span class="badge light badge-success text-white"
                                    style="background-color:{{ $dataTypeContent->labelName->color }}">{{ $dataTypeContent->labelName->name }}</span>
                            @endif
                            </td>

                        </p>

                        <hr />
                        <h6 class="mt-4 text-uppercase"> Address</h6>
                        <p>
                            @if ($dataTypeContent->organisation)
                                <i class="fa-regular fa-building"></i>

                                <span>
                                    {{ $dataTypeContent->organisation->name }}
                                </span>
                            @endif


                        </p>
                        <p>
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ $dataTypeContent->address }}</span>

                        </p>
                        <p> <i class="fas fa-street-view"></i>
                            <span> {{ $dataTypeContent->city }}</span>

                        </p>
                        <p>
                            <i class="fas fa-sign"></i>
                            <span> {{ $dataTypeContent->state }}</span>

                        </p>
                        <p>
                            <i class="fas fa-globe-europe"></i>
                            <span>{{ $dataTypeContent->country }}</span>

                        </p>
                        <hr />
                        <h6 class="text-uppercase">CONTACT PERSON</h6>
                        @if ($dataTypeContent->person)
                            <p>
                                <i class="fa-solid fa-user"></i>
                                <span>{{ $dataTypeContent->person->name }}</span>
                            </p>
                        @endif

                        <p>
                            <i class="fa-solid fa-envelope-open"></i>
                            <span>{{ $dataTypeContent->email }}</span>

                        </p>

                        <p>
                            <i class="fa-solid fa-square-phone"></i>
                            <span>{{ $dataTypeContent->phone }}</span>

                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function() {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function(e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/) ?
                deleteFormAction.replace(/([0-9]+$)/, $(this).data('id')) :
                deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });
    </script>
    <script>
        function myFunction(element, inputId, buttonId) {
            $('.edit-input').css('border', '0');
            $('[id^="editButton"]').hide();

            $('#' + inputId).css('border', '1px solid #888');
            $('#' + buttonId).show();


        }

        function hideEditLink(element, inputId, buttonId) {

            $('#' + inputId).css('border', '0');
            $('#' + buttonId).hide();


        }

        function updateDescription() {
            var formData = $('.updateForm').serialize();
            // console.log(formData);
            $.ajax({
                url: $('.updateForm').attr('action'),
                type: 'PUT',
                data: formData,
                success: function(response) {
                    console.log(response)
                    $('.edit-input').css('border', '0');
                    $('.editBtn').hide();
                    toastr.success('', 'Organisation update successfully');
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
            $('#socialModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var title = button.data('title');
                var value = button.data('value');
                var name = button.data('name');

                var modal = $(this);
                console.log(value);
                modal.find('.modal-title').text(title);
                modal.find('#socialInput').val(value);
                $('#socialInput').attr('name', name);
            });
        });
        $(document).ready(function() {
            $('#otherSocial').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var socials = button.data('socials');
                var organisationId = button.data('id');

                var modal = $(this);
                $.ajax({
                    url: '/dashboard/fetchSocialData/' + organisationId,
                    type: 'GET',
                    data: {
                        socials: socials
                    },
                    contentType: 'application/json',
                    success: function(data) {
                        // console.log(data);
                        modal.find('.social-body').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching social data:', error);
                    }
                });

            });
        });

        $(document).ready(function() {
            $('#personModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var fname = button.data('fname');
                var email = button.data('email');
                var lname = button.data('lname');
                var phone = button.data('phone');
                var position = button.data('position');
                var id = button.data('id');

                var modal = $(this);
                // console.log(modal.find('#input_meta[l_name]'));
                console.log(lname);
                modal.find('#input_name').val(fname);
                modal.find('#input_email').val(email);
                modal.find('#l_name').val(lname);
                modal.find('#personId').val(id);
                modal.find('#input_phone').val(phone);
                modal.find('#position').val(position);


            });
        });
    </script>
@stop
