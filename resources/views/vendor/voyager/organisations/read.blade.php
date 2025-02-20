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
        $persons = App\Models\Client::pluck('name', 'id')->toArray();
        $labels = App\Models\Label::pluck('name', 'id')->toArray();
        $countries = Cache::remember('countries', 600, function () {
            return DB::table('countries')->pluck('name', 'name')->toArray();
        });
        $socials = json_decode($dataTypeContent->social);

    @endphp
    <div class="container-fluid mx-2">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Organisation Name:</h4>
                    <span>{{ $dataTypeContent->name }}</span>
                </div>
            </div>


        </div>
        <div class="row">


            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />
                        <p>

                            <span class="ms-2"><i class="far fa-building"></i> {{ $dataTypeContent->name }}</span>


                        </p>
                        <p>

                            <span class="ms-2"><i class="fas fa-phone-square-alt"></i>
                                {{ $dataTypeContent->company_phone }}</span>


                        </p>
                        <p>
                            <span class="ms-2"> <i class="fas fa-envelope-open-text"></i>
                                {{ $dataTypeContent->company_email }}</span>
                        </p>
                        <p>
                        <h6 class="mt-4 text-uppercase"> Address</h6>
                        <hr />
                        <span class="ms-2"> <i class="fas fa-street-view"></i>
                            {{ $dataTypeContent->street }}</span>

                        </p>
                        <p>
                            <span class="ms-2"> <i class="fas fa-home"></i>
                                {{ $dataTypeContent->place }}
                            </span>

                        </p>
                        <p>
                            <span class="ms-2"> <i class="fas fa-code-branch"></i>
                                {{ $dataTypeContent->post_code }}
                            </span>
                        </p>
                        <p>
                            <span class="ms-2"> <i class="fas fa-sign"></i>
                                {{ $dataTypeContent->state }}
                            </span>

                        </p>
                        <p>
                            <span class="ms-2"> <i class="fas fa-globe-europe"></i>
                                {{ $dataTypeContent->country }}
                            </span>

                        </p>
                        @if ($dataTypeContent->labelName)
                            <span class="badge light badge-success text-white"
                                style="background-color:{{ $dataTypeContent->labelName->color }}"><i
                                    class="fas fa-tag"></i> {{ $dataTypeContent->labelName->name }}</span>
                        @endif

                        <div class="clearfix mt-5">
                            <div class="pull-left">
                                <h6 class="text-uppercase">Persons</h6>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default btn-sm" type="button" data-toggle="modal"
                                    data-target="#personModal">
                                    <i class="fa fa-user-plus"></i>
                                </button>
                            </div>
                        </div>

                        <hr />
                        @if ($dataTypeContent->clients->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Edit</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($dataTypeContent->clients as $people)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $people->name }} {{ $people->l_name }} </td>
                                            <td>{{ $people->phone }} </td>
                                            {{-- <td>{{ $people->email }} </td> --}}
                                            <td>
                                                <button class="btn btn-default btn-sm" data-fname="{{ $people->name }}"
                                                    data-lname="{{ $people->l_name }}" data-phone="{{ $people->phone }}"
                                                    data-id="{{ $people->id }}" data-email="{{ $people->email }}"
                                                    data-position="{{ $people->position }}" type="button"
                                                    data-toggle="modal" data-target="#personModal">
                                                    <i class="fa fa-user-edit"></i>
                                                </button>


                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-danger">Please add person</p>
                        @endif
                        <h6 class="text-uppercase mt-5">Socail Link</h6>
                        <hr />

                        <p>
                            <i class="fab fa-facebook"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $dataTypeContent->company_fb }}"
                                    target="_blank">{{ $dataTypeContent->company_fb }}</a></span>
                            <button type="button" class="btn btn-primary btn-sm " style="margin-left: 1rem !important;"
                                data-value="{{ $dataTypeContent->company_fb }}" data-name="meta[company_fb]"
                                data-title="Facebook url Update" data-toggle="modal" data-target="#socialModal">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                        </p>

                        <p>
                            <i class="fab fa-twitter-square"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $dataTypeContent->company_twitter }}"
                                    target="_blank">{{ $dataTypeContent->company_twitter }}</a></span>
                            <button type="button" class="btn btn-primary btn-sm " style="margin-left: 1rem !important;"
                                data-value="{{ $dataTypeContent->company_twitter }}" data-name="meta[company_twitter]"
                                data-title="Twitter url Update" data-toggle="modal" data-target="#socialModal">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                        </p>

                        <p>
                            <i class="fab fa-youtube"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $dataTypeContent->company_youtube }}"
                                    target="_blank">{{ $dataTypeContent->company_youtube }}</a></span>
                            <button type="button" class="btn btn-primary btn-sm " style="margin-left: 1rem !important;"
                                data-value="{{ $dataTypeContent->company_youtube }}" data-name="meta[company_youtube]"
                                data-title="Youtube url Update" data-toggle="modal" data-target="#socialModal">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                        </p>

                        <p>
                            <i class="fab fa-tiktok"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $dataTypeContent->company_tiktok }}"
                                    target="_blank">{{ $dataTypeContent->company_tiktok }}</a></span>
                            <button type="button" class="btn btn-primary btn-sm" style="margin-left: 1rem !important;"
                                data-value="{{ $dataTypeContent->company_tiktok }}" data-name="meta[company_tiktok]"
                                data-title="Tiktok url Update" data-toggle="modal" data-target="#socialModal">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                        </p>

                        <div class="clearfix mt-5">
                            <div class="pull-left">
                                <h6 class="text-uppercase">Other Social URL </h6>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-secondary btn-sm" data-socials="{{ json_encode($socials) }}"
                                    type="button" data-id="{{ $dataTypeContent->id }}" data-toggle="modal"
                                    data-target="#otherSocial">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                            </div>
                        </div>
                        <hr />

                        @if ($socials)
                            @foreach ($socials as $social)
                                <p>
                                    <span style="font-weight: 700">{{ $social->name }} :</span>
                                    <a class="text-decoration-underline text-primary" href="{{ $social->url }}"
                                        target="_blank">{{ $social->url }}</a>
                                </p>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-6" style="height: 100vh; ">
                <div class="card " style="overflow:hidden;overflow-y: scroll; height: 100%">
                    <style>
                        .custom-tab-1 li.active>a {
                            background-color: #fff !important;
                            border-color: #43DC80;
                            color: #43DC80 !important;
                            border-radius: 0;
                            border-width: 0 0px 3px 0;
                        }

                        .custom-tab-1 li.active>a:hover {
                            color: #43DC80;
                            border-color: #43DC80;
                            border-width: 0 0px 3px 0;
                        }

                        .custom-tab-1 .nav>li>a {
                            padding: 10px 10px;
                            color: #43DC80;
                        }

                        .custom-tab-1 .nav-tabs {
                            background-color: #fff;
                        }
                    </style>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#activity" data-toggle="tab">Activity</a>
                                </li>
                                <li>
                                    <a href="#notes1" data-toggle="tab">Notes</a>
                                </li>
                                <li>
                                    <a href="#tasks" data-toggle="tab">Tasks</a>
                                </li>
                                <li>
                                    <a href="#calls" data-toggle="tab">Calls</a>
                                </li>
                                <li>
                                    <a href="#meeting" data-toggle="tab">Meetings</a>
                                </li>
                                <li>
                                    <a href="#lunches" data-toggle="tab">Lunches</a>
                                </li>
                                <li>
                                    <a href="#filess" data-toggle="tab">Files</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="activity">
                                    <div class="pt-4">
                                        @foreach ($dataTypeContent->activities as $activity)
                                            @include('partials.activity', ['activity' => $activity])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="notes1">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('note.create', ['model' => class_basename(get_class($dataTypeContent)), 'id' => $dataTypeContent->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.form.textarea', [
                                                'name' => 'note',
                                                'label' => 'Add Note',
                                                'rows' => 5,
                                            ])
                                            <div class=" mb-3">
                                                <label class="form-label">Noted at</label>
                                                <input type="datetime-local" class="form-control" name="noted_at">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($dataTypeContent->notes as $note)
                                            @include('partials.note-content', ['note' => $note])
                                        @endforeach
                                    </div>

                                </div>
                                <div class="tab-pane" id="tasks">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('task.create', ['model' => class_basename(get_class($dataTypeContent)), 'id' => $dataTypeContent->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.form.text', [
                                                'name' => 'name',
                                                'label' => 'Name',
                                            ])
                                            @include('partials.form.textarea', [
                                                'name' => 'description',
                                                'label' => 'Description',
                                                'rows' => 5,
                                            ])
                                            <div class=" mb-3">
                                                <label class="form-label">Due</label>
                                                <input type="datetime-local" name="due" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>

                                        @foreach ($dataTypeContent->tasks as $task)
                                            @include('partials.task-content', ['task' => $task])
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane" id="calls">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('calls.create', ['model' => class_basename(get_class($dataTypeContent)), 'id' => $dataTypeContent->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($dataTypeContent->calls as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="meeting">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('meeting.create', ['model' => class_basename(get_class($dataTypeContent)), 'id' => $dataTypeContent->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($dataTypeContent->meetings as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="lunches">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('lunches.create', ['model' => class_basename(get_class($dataTypeContent)), 'id' => $dataTypeContent->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @foreach ($dataTypeContent->lunches as $call)
                                                @include('partials.call-content', ['call' => $call])
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="filess">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('file.create', ['model' => class_basename(get_class($dataTypeContent)), 'id' => $dataTypeContent->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('partials.form.file', [
                                                'name' => 'file',
                                                'label' => 'File',
                                            ])
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($dataTypeContent->files as $file)
                                            @include('partials.file-content', ['file' => $file])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- social url modal --}}
    <div class="modal fade" id="socialModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Modal title</h4>
                </div>
                <form action="{{ route('social.update', $dataTypeContent) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="" id="socialInput" value="" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Other social modal --}}
    <div class="modal fade" id="otherSocial">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Other Social URL Update</h4>
                </div>
                <div class="modal-body social-body">
                    <!-- Content for the modal body -->
                </div>
            </div>
        </div>
    </div>

    {{-- person add modal --}}
    <div class="modal fade" id="personModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add Person</h4>
                </div>
                <form action="{{ route('person.store', $dataTypeContent) }}" method="post">
                    @csrf
                    <div class="modal-body">
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
                                        <div>
                                            <label for="l_name" class="form-label">Last name</label>
                                            <input type="text" name="meta[l_name]" id="l_name"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
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

                                <label for="position" class="form-label">Position</label>
                                <input type="text" name="meta[position]" id="position" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="person_id" id="personId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}
                        {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.' . $dataType->slug . '.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                            value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
