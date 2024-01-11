@extends('layouts.default')
<style>
    .edit-input {
        padding: 5px 10px;
    }

    select {
        -webkit-appearance: none;
        /* width: 50px; */
    }

    textarea {
        resize: none !important;
    }
</style>
@php
    $socials = json_decode($organisation->social);

@endphp
@section('content')
    <div class="container-fluid mx-2">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>{{ $organisation->name }}</span>
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('clients.create') }}">Create</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $client->title }}</a></li>
                </ol>
            </div> --}}

        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">

                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />
                        <p>

                            {{-- <span class="ms-2">{{ $organisation->name }}</span> --}}
                        <form class="updateForm" action="{{ route('organisations.update', $organisation) }}" method="post"
                            class="">
                            @csrf
                            @method('PUT')
                            <a href="" data-toggle="tooltip" data-placement="top" title="Organisation">

                                <i class="far fa-building"></i>
                            </a>
                            <div class="d-inline" onmouseover="myFunction(this, 'name', 'editButtonName')"
                                onmouseout="hideEditLink(this, 'name', 'editButtonName')">

                                <input type="text" class="edit-input" style="border: 0" name="name" id="name"
                                    value="{{ $organisation->name }}">
                                <button type="button" onclick="updateDescription()" class="btn btn-primary editBtn btn-sm"
                                    id="editButtonName" style="display: none"><i class="fas fa-check"></i></button>
                            </div>
                        </form>

                        </p>
                        <p>

                            {{-- <span class="ms-2">{{ $organisation->company_phone }}</span> --}}

                        <form class="updateForm" action="{{ route('organisations.update', $organisation) }}" method="post"
                            class="">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-phone-square-alt"></i>
                            <div class="d-inline" onmouseover="myFunction(this, 'phone', 'editButtonPhone')"
                                onmouseout="hideEditLink(this, 'phone', 'editButtonPhone')">

                                <input type="text" class="edit-input" style="border: 0" name="meta[company_phone]"
                                    id="phone" value="{{ $organisation->company_phone }}">
                                <button type="button" onclick="updateDescription()" class="btn btn-primary editBtn btn-sm"
                                    id="editButtonPhone" style="display: none"><i class="fas fa-check"></i></button>
                            </div>
                        </form>
                        </p>
                        <p>

                        <form class="updateForm" action="{{ route('organisations.update', $organisation) }}" method="post"
                            class="">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-envelope-open-text"></i>
                            <div class="d-inline" onmouseover="myFunction(this, 'email', 'editButtonEmail')"
                                onmouseout="hideEditLink(this, 'email', 'editButtonEmail')">

                                <input type="text" class="edit-input" style="border: 0" name="meta[company_email]"
                                    id="email" value="{{ $organisation->company_email }}">
                                <button type="button" onclick="updateDescription()" class="btn btn-primary editBtn btn-sm"
                                    id="editButtonEmail" style="display: none"><i class="fas fa-check"></i></button>
                            </div>
                        </form>
                        </p>
                        <p>
                        <h6 class="mt-4 text-uppercase"> Address</h6>
                        <hr />
                        <form class="updateForm" action="{{ route('organisations.update', $organisation) }}" method="post"
                            class="">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-street-view"></i>
                            <div class="d-inline" onmouseover="myFunction(this, 'street', 'editButtonStreet')"
                                onmouseout="hideEditLink(this, 'street', 'editButtonStreet')">

                                <input type="text" class="edit-input" style="border: 0" name="meta[street]"
                                    id="street" value="{{ $organisation->street }}">
                                <button type="button" onclick="updateDescription()" class="btn btn-primary editBtn btn-sm"
                                    id="editButtonStreet" style="display: none"><i class="fas fa-check"></i></button>
                            </div>
                        </form>
                        </p>
                        <p>

                        <form class="updateForm" action="{{ route('organisations.update', $organisation) }}" method="post"
                            class="">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-home"></i>
                            <div class="d-inline" onmouseover="myFunction(this, 'place', 'editButtonPlace')"
                                onmouseout="hideEditLink(this, 'place', 'editButtonPlace')">

                                <input type="text" class="edit-input" style="border: 0" name="meta[place]"
                                    id="place" value="{{ $organisation->place }}">
                                <button type="button" onclick="updateDescription()"
                                    class="btn btn-primary editBtn btn-sm" id="editButtonPlace" style="display: none"><i
                                        class="fas fa-check"></i></button>
                            </div>
                        </form>
                        </p>
                        <p>

                        <form class="updateForm" action="{{ route('organisations.update', $organisation) }}"
                            method="post" class="">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-code-branch"></i>
                            <div class="d-inline" onmouseover="myFunction(this, 'postCode', 'editButtonPostCode')"
                                onmouseout="hideEditLink(this, 'postCode', 'editButtonPostCode')">

                                <input type="text" class="edit-input" style="border: 0" name="meta[post_code]"
                                    id="postCode" value="{{ $organisation->post_code }}">
                                <button type="button" onclick="updateDescription()"
                                    class="btn btn-primary editBtn btn-sm" id="editButtonPostCode"
                                    style="display: none"><i class="fas fa-check"></i></button>
                            </div>
                        </form>
                        <form class="updateForm" action="{{ route('organisations.update', $organisation) }}"
                            method="post" class="">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-sign"></i>
                            <div class="d-inline" onmouseover="myFunction(this, 'state', 'editButtonstate')"
                                onmouseout="hideEditLink(this, 'state', 'editButtonstate')">

                                <input type="text" class="edit-input" style="border: 0" name="meta[state]"
                                    id="state" value="{{ $organisation->state }}">
                                <button type="button" onclick="updateDescription()"
                                    class="btn btn-primary editBtn btn-sm" id="editButtonstate" style="display: none"><i
                                        class="fas fa-check"></i></button>
                            </div>
                        </form>

                        <form class="updateForm  d-flex align-items-center"
                            action="{{ route('organisations.update', $organisation) }}" method="post">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-globe-europe"></i>

                            <div class="d-inline-block d-flex"
                                onmouseover="myFunction(this, 'countryInput', 'editButtonCountry')"
                                onmouseout="hideEditLink(this, 'countryInput', 'editButtonCountry')">


                                <select class="edit-input" name="meta[country]" id="countryInput" style="border: 0">
                                    <option value="">Choose option</option>
                                    @foreach (App\Helper\SelectOptions::countries() as $key => $country)
                                        <option value="{{ $key }}"
                                            {{ $key == $organisation->country ? 'selected' : '' }}>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonCountry"
                                    style="display: none" onclick="updateDescription()">
                                    <i class="fas fa-check"></i></button>
                            </div>
                        </form>
                        </p>
                        @if ($organisation->labelName)
                            {{-- <span class="badge light badge-success text-white"
                            style="background-color:{{ $organisation->labelName->color }}">{{ $organisation->labelName->name }}</span> --}}

                            <form class="updateForm" action="{{ route('organisations.update', $organisation) }}"
                                method="post">
                                @csrf
                                @method('PUT')
                                <span class="fa fa-tag" aria-hidden="true"></span>

                                <div class="d-inline-block"
                                    onmouseover="myFunction(this, 'labelInput', 'editButtonLabel')"
                                    onmouseout="hideEditLink(this, 'labelInput', 'editButtonLabel')">


                                    <select class="edit-input" name="label" id="labelInput" style="border: 0">
                                        @foreach ($labels as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ $key == $organisation->labelName->id ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonLabel"
                                        style="display: none" onclick="updateDescription()">
                                        <i class="fas fa-check"></i></button>
                                </div>
                            </form>
                        @endif

                        <div class="d-flex justify-content-between mt-5 align-items-center">
                            <h6 class="text-uppercase ">Persons </h6>
                            <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#personModal"><i class="fas fa-user-plus"></i></button>
                        </div>
                        <hr />
                        @if ($organisation->clients->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        {{-- <th scope="col">Email</th> --}}

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($organisation->clients as $people)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $people->name }} {{ $people->l_name }} </td>
                                            <td>{{ $people->phone }} </td>
                                            {{-- <td>{{ $people->email }} </td> --}}
                                            <td>
                                                <button class="btn btn-secondary btn-sm" data-fname="{{ $people->name }}"
                                                    data-lname="{{ $people->l_name }}" data-phone="{{ $people->phone }}"
                                                    data-id="{{ $people->id }}" data-email="{{ $people->email }}"
                                                    data-position="{{ $people->position }}" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#personModal"><i
                                                        class="fas fa-user-edit"></i>
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

                        <p>
                            <i class="fab fa-facebook"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $organisation->company_fb }} " target="_blank">
                                    {{ $organisation->company_fb }}</a> </span>
                            <button type="button" class="btn btn-primary btn-sm p-2 ms-3"
                                data-value="{{ $organisation->company_fb }}" data-name="meta[company_fb]"
                                data-title="Facebook url Update" data-bs-toggle="modal" data-bs-target="#socialModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </p>

                        <p>
                            <i class="fab fa-twitter-square"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $organisation->company_twitter }} " target="_blank">
                                    {{ $organisation->company_twitter }}</a> </span>

                            <button type="button" class="btn btn-primary btn-sm p-2 ms-3"
                                data-value="{{ $organisation->company_twitter }}" data-name="meta[company_twitter]"
                                data-title="Twitter url Update" data-bs-toggle="modal" data-bs-target="#socialModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </p>
                        <p>
                            <i class="fab fa-youtube"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $organisation->company_youtube }} " target="_blank">
                                    {{ $organisation->company_youtube }}</a> </span>

                            <button type="button" class="btn btn-primary btn-sm p-2 ms-3"
                                data-value="{{ $organisation->company_youtube }}" data-name="meta[company_youtube]"
                                data-title="Youtube url Update" data-bs-toggle="modal" data-bs-target="#socialModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </p>
                        <p>
                            <i class="fab fa-tiktok"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary"
                                    href="{{ $organisation->company_tiktok }} " target="_blank">
                                    {{ $organisation->company_tiktok }}</a> </span>

                            <button type="button" class="btn btn-primary btn-sm p-2 ms-3"
                                data-value="{{ $organisation->company_tiktok }}" data-name="meta[company_tiktok]"
                                data-title="Tiktok url Update" data-bs-toggle="modal" data-bs-target="#socialModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </p>

                        <div class="d-flex justify-content-between mt-5 align-items-center">
                            <h6 class="text-uppercase ">Other Social URL </h6>
                            <button class="btn btn-secondary btn-sm" data-socials="{{ json_encode($socials) }}"
                                type="button" data-id="{{ $organisation->id }}" data-bs-toggle="modal"
                                data-bs-target="#otherSocial"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                        <hr />
                        @if ($socials)
                            @foreach ($socials as $social)
                                <p>
                                    <span style="font-weight: 700">{{ $social->name }} :</span>
                                    <a class="text-decoration-underline text-primary"
                                        href="">{{ $social->url }}</a>

                                </p>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-xl-6" style="height: 100vh; ">
                <div class="card " style="overflow:hidden;overflow-y: scroll;">
                    {{-- <div class="card-header">
					<h4 class="card-title">Custom Tab 1</h4>
				</div> --}}
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active px-2" data-bs-toggle="tab" href="#activity"> Activity</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#notes1"> Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tasks"> Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#calls"> Calls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#meeting"> Meetings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#lunches"> Lunches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#files"> Files</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="activity" role="tabpanel">
                                    <div class="pt-4">
                                        @foreach ($organisation->activities as $activity)
                                            @include('partials.activity', ['activity' => $activity])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notes1">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('note.create', ['model' => class_basename(get_class($organisation)), 'id' => $organisation->id]) }}"
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
                                        @foreach ($organisation->notes as $note)
                                            @include('partials.note-content', ['note' => $note])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tasks">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('task.create', ['model' => class_basename(get_class($organisation)), 'id' => $organisation->id]) }}"
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

                                        @foreach ($organisation->tasks as $task)
                                            @include('partials.task-content', ['task' => $task])
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="calls">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('calls.create', ['model' => class_basename(get_class($organisation)), 'id' => $organisation->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($organisation->calls as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="meeting">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('meeting.create', ['model' => class_basename(get_class($organisation)), 'id' => $organisation->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($organisation->meetings as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lunches">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('lunches.create', ['model' => class_basename(get_class($organisation)), 'id' => $organisation->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @foreach ($organisation->lunches as $call)
                                                @include('partials.call-content', ['call' => $call])
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="files">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('file.create', ['model' => class_basename(get_class($organisation)), 'id' => $organisation->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('partials.form.file', [
                                                'name' => 'file',
                                                'label' => 'File',
                                            ])
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($organisation->files as $file)
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('social.update', $organisation) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="" id="socialInput" value="" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Other social modal --}}
    <div class="modal fade" id="otherSocial">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Other Socail url Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body social-body">

                </div>
            </div>
        </div>
    </div>
    {{-- person add modal --}}
    <div class="modal fade" id="personModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Person</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('person.store', $organisation) }}" method="post">
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

                        <div class="modal-footer bg-white">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
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
@endpush
