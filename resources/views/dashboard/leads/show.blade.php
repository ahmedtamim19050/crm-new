@extends('layouts.default')
<style>
    /* input {
      border: 0;
    } */
    /* input:focus {
      border: 1px solid #000;
    } */
    /* #editButton {
      display: none;
      margin-left: 10px;
      padding: 5px 10px;
      cursor: pointer;
    } */
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
                    <span>{{ $lead->title }}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('leads.create') }}">Create</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $lead->title }}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />
                        <p><span class="fa fa-tag" aria-hidden="true"></span>
                            @if ($lead->labelName)
                                <span class="badge light badge-success text-white"
                                    style="background-color:{{ $lead->labelName->color }}">{{ $lead->labelName->name }}</span>
                            @endif
                            </td>

                        </p>
                        <p>


                        <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post">
                            @csrf
                            @method('PUT')
                            <span class="las la-dollar-sign" aria-hidden="true"></span>
                            <input type="text" class="edit-input" style="border: 0"
                                onfocus="myFunction(this, 'priceInput', 'editButtonPrice')" name="amount"
                                value="{{ $lead->amount }}">
                            <button type="button" class="btn editBtn btn-primary btn-sm" onclick="updateDescription()"
                                id="editButtonPrice" style="display: none">Edit</button>
                        </form>
                        </p>
                        <p>


                        <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post"
                            style="display: flex;align-items:start;gap:0 5px;">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-info mt-2" aria-hidden="true"></span>
                            <textarea class="edit-input" style="border:0" onfocus="myFunction(this, 'descriptionInput', 'editButtonDescription')"
                                name="description" rows="">{{ $lead->description }} </textarea>
                            <div>
                                <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonDescription"
                                    style="display: none" onclick="updateDescription()">Edit</button>
                            </div>
                        </form>
                        </p>
                        {{-- <p>
                            <span class="fa fa-user-circle" aria-hidden="true"></span> <a
                                href="">{{ $lead->ownerUser->name ?? null }}</a>
                            </p> --}}
                        <h6 class="mt-4 text-uppercase"> Expected close date</h6>
                        <hr />
                        <p>
                        

                        <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-calendar me-1" aria-hidden="true"></span>
                            <input type="date" class="edit-input" style="border: 0"
                                onfocus="myFunction(this, 'closeDateInput', 'editButtonCloseDate')" name="meta[close_date]"
                                value="{{ $lead->close_date }}">
                            <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonCloseDate"
                                style="display: none" onclick="updateDescription()">Edit</button>
                        </form>
                        </p>
                        <h6 class="mt-4 text-uppercase"> CUSTOMER</h6>
                        <hr />
                        <p>
                            @if ($lead->client)
                                <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <span class="fa fa-address-card" aria-hidden="true"></span>


                                    <select class="edit-input" name="client_id" id="" style="border: 0"
                                        onfocus="myFunction(this, 'clientInput', 'editButtonClient')">
                                        @foreach ($clients as $key => $client)
                                            <option value="{{ $key }}"
                                                {{ $key == $lead->client_id ? 'selected' : '' }}>{{ $client }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonClient"
                                        style="display: none" onclick="updateDescription()">Edit</button>
                                </form>
                            @endif
                        </p>
                        <h6 class="mt-4 text-uppercase"> ORGANIZATION</h6>
                        <hr />
                        <p>
                            @if ($lead->organisation)
                                <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <span class="fa fa-building" aria-hidden="true"></span>

                                    
                                    <select class="edit-input" name="organisation_id" id="" style="border: 0"
                                        onfocus="myFunction(this, 'organisationInput', 'editButtonOrganisation')">
                                        @foreach ($organisations as $key => $organisation)
                                            <option value="{{ $key }}"
                                                {{ $key == $lead->organisation_id ? 'selected' : '' }}>{{ $organisation }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonOrganisation"
                                        style="display: none" onclick="updateDescription()">Edit</button>
                                </form>
                            @endif
                        </p>
                        <p>
                            {{-- {{ $lead->address }} --}}
                        <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-map-marker me-1" aria-hidden="true"></span>
                            <input type="text" class="edit-input" style="border: 0"
                                onfocus="myFunction(this, 'addressInput', 'editButtonAddress')" name="address"
                                value="{{ $lead->address }}">
                            <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonAddress"
                                style="display: none" onclick="updateDescription()">Edit</button>
                        </form>
                        </p>
                        <h6 class="mt-4 text-uppercase">CONTACT PERSON</h6>
                        <hr />
                        {{-- <p><span class="fa fa-user" aria-hidden="true"></span>
                            @if ($lead->person)
                                <a href="">{{ $lead->person->name }}</a>
                            @endif
                        </p> --}}

                        <p>
                        <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                            <input type="text" class="edit-input" style="border: 0"
                                onfocus="myFunction(this, 'emailInput', 'editButtonEmail')" name="email"
                                value="{{ $lead->email }}">
                            <button type="button" onclick="updateDescription()" class="btn editBtn btn-primary btn-sm" id="editButtonEmail"
                                style="display: none">Edit</button>
                        </form>
                        </p>

                        <p>
                        <form class="updateForm" action="{{ route('leads.update', $lead) }}" method="post">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-phone" aria-hidden="true"></span>
                            <input type="text" class="edit-input" style="border: 0"
                                onfocus="myFunction(this, 'phoneInput', 'editButtonPhone')" name="phone"
                                value="{{ $lead->phone }}">
                            <button type="button" onclick="updateDescription()" class="btn btn-primary editBtn btn-sm" id="editButtonPhone"
                                style="display: none">Edit</button>
                        </form>
                        </p>

                    </div>
                </div>

            </div>



        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function myFunction(element, inputId, buttonId) {
        $('.edit-input').css('border', '0');
        $('[id^="editButton"]').hide();

        $(element).css('border', '1px solid #888');
        $('#' + buttonId).show();


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
            },
            error: function(error) {
                // Handle error, if needed
                console.error(error);
            }
        });
    }
</script>


{{-- <div class="col-xl-7" style="height: 100vh; ">
                <div class="card " style="overflow:hidden;overflow-y: scroll;">
                 
                    <div class="card-body">
                
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
                                        @foreach ($lead->activities as $activity)
                                            
                                        @include('partials.activity',['activity'=>$activity])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notes1">
                                    <div class="pt-4">
                                        <form action="{{route('note.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
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
                                        @foreach ($lead->notes as $note)
                                            
                                        @include('partials.note-content',['note' => $note])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tasks">
                                    <div class="pt-4">
                                        <form action="{{route('task.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
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

                                        @foreach ($lead->tasks as $task)
                                            
                                        @include('partials.task-content',['task' => $task])
                                        @endforeach
                           
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="calls">
                                    <div class="pt-4">
                                        <form action="{{route('calls.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($lead->calls as $call)
                                            
                                        @include('partials.call-content',['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="meeting">
                                    <div class="pt-4">
                                        <form action="{{route('meeting.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($lead->meetings as $call)
                                            
                                        @include('partials.call-content',['call' =>  $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lunches">
                                    <div class="pt-4">
                                        <form action="{{route('lunches.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @foreach ($lead->lunches as $call)
                                            
                                            @include('partials.call-content',['call'=>$call])
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="files">
                                    <div class="pt-4">
                                        <form action="{{route('file.create',['model' => class_basename(get_class($lead)), 'id' => $lead->id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('partials.form.file', [
                                                'name' => 'file',
                                                'label' => 'File',
                                           
                                            ])
                                         <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($lead->files as $file)
                                            
                                        @include('partials.file-content',['file'=>$file])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
