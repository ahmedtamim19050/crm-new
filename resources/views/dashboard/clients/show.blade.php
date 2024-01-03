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
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>{{ $client->title }}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('clients.create') }}">Create</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $client->name }}</a></li>
                </ol>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="card">

                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />
                        <div class="d-flex ">
                            <span style="font-weight: 700" class="me-3 mt-2">First Name :</span>

                            <form class="updateForm" action="{{ route('clients.update', $client) }}" method="post"
                                class="">
                                @csrf
                                @method('PUT')
                                {{-- <span class="fa fa-phone" aria-hidden="true"></span> --}}
                                <div class="d-inline" onmouseover="myFunction(this, 'name', 'editButtonName')"
                                    onmouseout="hideEditLink(this, 'name', 'editButtonName')">

                                    <input type="text" class="edit-input" style="border: 0" name="name" id="name"
                                        value="{{ $client->name }}">
                                    <button type="button" onclick="updateDescription()"
                                        class="btn btn-primary editBtn btn-sm" id="editButtonName" style="display: none"><i
                                            class="fas fa-pencil-alt"></i></button>
                                </div>
                            </form>

                        </div>
                        <div class="d-flex">
                            <span style="font-weight: 700" class="me-3 mt-2">Last Name :</span>

                            {{-- <span >{{ $client->l_name }}</span></td> --}}

                            <form class="updateForm" action="{{ route('clients.update', $client) }}" method="post"
                                class="">
                                @csrf
                                @method('PUT')
                                {{-- <span class="fa fa-phone" aria-hidden="true"></span> --}}
                                <div class="d-inline" onmouseover="myFunction(this, 'Lname', 'editButtonLName')"
                                    onmouseout="hideEditLink(this, 'Lname', 'editButtonLName')">

                                    <input type="text" class="edit-input" style="border: 0" name="meta[l_name]"
                                        id="Lname" value="{{ $client->l_name }}">
                                    <button type="button" onclick="updateDescription()"
                                        class="btn btn-primary editBtn btn-sm" id="editButtonLName" style="display: none"><i
                                            class="fas fa-pencil-alt"></i></button>
                                </div>
                            </form>

                        </div>
                        <div class="d-flex">
                            <span style="font-weight: 700" class="me-3 mt-2">Email :</span>

                            {{-- <span >{{ $client->l_name }}</span></td> --}}

                            <form class="updateForm" action="{{ route('clients.update', $client) }}" method="post"
                                class="">
                                @csrf
                                @method('PUT')
                                {{-- <span class="fa fa-phone" aria-hidden="true"></span> --}}
                                <div class="" onmouseover="myFunction(this, 'email', 'editButtonEmail')"
                                    onmouseout="hideEditLink(this, 'email', 'editButtonEmail')">

                                    <input type="text" class="edit-input" style="border: 0" name="email"
                                        id="email" value="{{ $client->email }}">
                                    <button type="button" onclick="updateDescription()"
                                        class="btn btn-primary editBtn btn-sm" id="editButtonEmail" style="display: none"><i
                                            class="fas fa-pencil-alt"></i></button>
                                </div>
                            </form>

                        </div>
                        <div class="d-flex">
                            <span style="font-weight: 700" class="me-3 mt-2">Phone :</span>

                            {{-- <span >{{ $client->l_name }}</span></td> --}}

                            <form class="updateForm" action="{{ route('clients.update', $client) }}" method="post"
                                class="">
                                @csrf
                                @method('PUT')
                                {{-- <span class="fa fa-phone" aria-hidden="true"></span> --}}
                                <div class="" onmouseover="myFunction(this, 'phone', 'editButtonPhone')"
                                    onmouseout="hideEditLink(this, 'phone', 'editButtonPhone')">

                                    <input type="text" class="edit-input" style="border: 0" name="phone"
                                        id="phone" value="{{ $client->phone }}">
                                    <button type="button" onclick="updateDescription()"
                                        class="btn btn-primary editBtn btn-sm" id="editButtonPhone" style="display: none"><i
                                            class="fas fa-pencil-alt"></i></button>
                                </div>
                            </form>

                        </div>
                        <div class="d-flex">
                            <span style="font-weight: 700" class="me-3 mt-2">Organisation :</span>

        


                            <form class="updateForm" action="{{ route('clients.update', $client) }}" method="post">
                                @csrf
                                @method('PUT')
                                {{-- <span class="fa fa-building" aria-hidden="true"></span> --}}

                                <div class="d-inline-block"
                                    onmouseover="myFunction(this, 'organisationInput', 'editButtonOrganisation')"
                                    onmouseout="hideEditLink(this, 'organisationInput', 'editButtonOrganisation')">

                                    <select class="edit-input" name="organisation_id" id="organisationInput"
                                        style="border: 0">
                                        @foreach ($organisations as $key => $organisation)
                                            <option value="{{ $key }}"
                                                {{ $key == $client->organisation_id ? 'selected' : '' }}>
                                                {{ $organisation }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn editBtn btn-primary btn-sm"
                                        id="editButtonOrganisation" style="display: none"
                                        onclick="updateDescription()">Edit</button>
                                </div>
                            </form>
                        

                        </div>
                        {{-- <h6 class="text-uppercase mt-3">Owner</h6>
                        <hr />

                        <p>
                            <span style="font-weight: 700">Name</span>
                            @if ($client->ownerUser)
                                <a href="">{{ $client->ownerUser->name }}</a>
                            @endif
                        </p> --}}

                    </div>
                </div>
            </div>
            <div class="col-xl-7" style="height: 100vh; ">
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
                                        @foreach ($client->activities as $activity)
                                            @include('partials.activity', ['activity' => $activity])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notes1">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('note.create', ['model' => class_basename(get_class($client)), 'id' => $client->id]) }}"
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
                                        @foreach ($client->notes as $note)
                                            @include('partials.note-content', ['note' => $note])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tasks">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('task.create', ['model' => class_basename(get_class($client)), 'id' => $client->id]) }}"
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

                                        @foreach ($client->tasks as $task)
                                            @include('partials.task-content', ['task' => $task])
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="calls">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('calls.create', ['model' => class_basename(get_class($client)), 'id' => $client->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($client->calls as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="meeting">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('meeting.create', ['model' => class_basename(get_class($client)), 'id' => $client->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($client->meetings as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lunches">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('lunches.create', ['model' => class_basename(get_class($client)), 'id' => $client->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @foreach ($client->lunches as $call)
                                                @include('partials.call-content', ['call' => $call])
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="files">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('file.create', ['model' => class_basename(get_class($client)), 'id' => $client->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('partials.form.file', [
                                                'name' => 'file',
                                                'label' => 'File',
                                            ])
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($client->files as $file)
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
                    toastr.success('', 'Client update successfully');
                },
                error: function(error) {
                    // Handle error, if needed
                    console.error(error);
                }
            });
        }
    </script>
@endpush
