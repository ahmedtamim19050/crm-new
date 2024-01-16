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
        <!-- Add Project -->
        {{-- <div class="modal fade" id="addProjectSidebar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create Project</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form>
                        @csrf
						<div class="form-group">
							<label class="text-black font-w500">Project Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
									<label class="text-black font-w500">Dadeline</label>
									<div class="cal-icon"><input type="date" class="form-control"><i class="far fa-calendar-alt"></i></div>
								</div>
						<div class="form-group">
							<label class="text-black font-w500">Client Name</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-primary">CREATE</button>
						</div>
					</form>
				</div>
			</div>
		</div> --}}
        {{-- </div> --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>{{ $deal->title }}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('deals.create') }}">Create</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $deal->title }}</a></li>
                </ol>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="card">

                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />

                        <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-info" aria-hidden="true"></span>
                            <div class="d-inline-block" onmouseover="myFunction(this, 'titleInput', 'editButtontitle')"
                                onmouseout="hideEditLink(this, 'titleInput', 'editButtontitle')">

                                <input type="text" class="edit-input" id="titleInput" style="border: 0" name="title"
                                    value="{{ $deal->title }}">
                                <button type="button" class="btn editBtn btn-primary btn-sm" onclick="updateDescription()"
                                    id="editButtontitle" style="display: none"><i class="fas fa-pencil-alt"></i></button>
                            </div>
                        </form>

                        <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post"
                            style="display: flex;align-items:start;gap:0 5px;">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-info mt-2" aria-hidden="true"></span>
                            <div class="d-inline d-flex align-items-center"
                                onmouseover="myFunction(this, 'descriptionInput', 'editButtonDescription')"
                                onmouseout="hideEditLink(this, 'descriptionInput', 'editButtonDescription')">
                                <textarea class="edit-input" style="border:0" name="description" rows="" id="descriptionInput">{{ $deal->description }} </textarea>

                                <button type="button" class="btn editBtn btn-primary btn-sm ms-2"
                                    id="editButtonDescription" style="display: none" onclick="updateDescription()"><i
                                        class="fas fa-pencil-alt"></i></button>
                            </div>
                        </form>

                        {{-- <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                            @csrf
                            @method('PUT')
                            <i class="las la-dollar-sign"
                            style="font-size: 20px;font-weight:900;margin-left:-8px"></i>
                            <div class="d-inline-block" onmouseover="myFunction(this, 'priceInput', 'editButtonPrice')"
                                onmouseout="hideEditLink(this, 'priceInput', 'editButtonPrice')">

                                <input type="text" class="edit-input" id="priceInput" style="border: 0" name="amount"
                                    value="{{ $deal->amount }}">
                                <button type="button" class="btn editBtn btn-primary btn-sm" onclick="updateDescription()"
                                    id="editButtonPrice" style="display: none"><i class="fas fa-pencil-alt"></i></button>
                            </div>
                        </form> --}}
                        <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-envelope-open"></i>
                            <div class="d-inline-block" onmouseover="myFunction(this, 'emailInput', 'editButtonEmail')"
                                onmouseout="hideEditLink(this, 'emailInput', 'editButtonEmail')">

                                <input type="text" class="edit-input" id="emailInput" style="border: 0" name="email"
                                    value="{{ $deal->email }}">
                                <button type="button" class="btn editBtn btn-primary btn-sm" onclick="updateDescription()"
                                    id="editButtonEmail" style="display: none"><i class="fas fa-pencil-alt"></i></button>
                            </div>
                        </form>
                        <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                            @csrf
                            @method('PUT')
                            <i class="fas fa-phone-alt"></i>
                            <div class="d-inline-block" onmouseover="myFunction(this, 'phoneInput', 'editButtonPhone')"
                                onmouseout="hideEditLink(this, 'phoneInput', 'editButtonPhone')">

                                <input type="text" class="edit-input" id="phoneInput" style="border: 0" name="phone"
                                    value="{{ $deal->phone }}">
                                <button type="button" class="btn editBtn btn-primary btn-sm" onclick="updateDescription()"
                                    id="editButtonPhone" style="display: none"><i class="fas fa-pencil-alt"></i></button>
                            </div>
                        </form>

                        @if ($deal->labelName)
                        {{-- <span class="badge light badge-success text-white"
                            style="background-color:{{ $deal->labelName->color }}">{{ $deal->labelName->name }}</span> --}}

                        <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                            @csrf
                            @method('PUT')
                            <span class="fa fa-tag" aria-hidden="true"></span>

                            <div class="d-inline-block"
                                onmouseover="myFunction(this, 'labelInput', 'editButtonLabel')"
                                onmouseout="hideEditLink(this, 'labelInput', 'editButtonLabel')">


                                <select class="edit-input" name="label" id="labelInput" style="border: 0">
                                    @foreach ($labels as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ $key == $deal->labelName->id ? 'selected' : '' }}>{{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonLabel"
                                    style="display: none" onclick="updateDescription()"><i
                                        class="fas fa-pencil-alt"></i></button>
                            </div>
                        </form>
                    @endif

                    <h6 class="mt-4 text-uppercase"> Expected close date</h6>
                    <hr />
                    <p>

                    <form class="updateForm" action="{{ route('leads.update', $deal) }}" method="post">
                        @csrf
                        @method('PUT')
                        <span class="fa fa-calendar me-1" aria-hidden="true"></span>
                        <div class="d-inline-block"
                            onmouseover="myFunction(this, 'closeDateInput', 'editButtonCloseDate')"
                            onmouseout="hideEditLink(this, 'closeDateInput', 'editButtonCloseDate')">

                            <input type="date" class="edit-input" style="border: 0" name="meta[close_date]"
                                id="closeDateInput" value="{{ $deal->close_date }}">
                            <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonCloseDate"
                                style="display: none" onclick="updateDescription()">Edit</button>
                        </div>
                    </form>
                    </p>

                    <h6 class="mt-4 text-uppercase"> Address</h6>
                    <hr />
                
                    <p>
                        {{-- {{ $deal->address }} --}}
                    <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                        @csrf
                        @method('PUT')
                        <span class="fa fa-map-marker me-1" aria-hidden="true"></span>
                        <div class="d-inline-block"
                            onmouseover="myFunction(this, 'addressInput', 'editButtonAddress')"
                            onmouseout="hideEditLink(this, 'addressInput', 'editButtonAddress')">
                            <input type="text" class="edit-input" id="addressInput" style="border: 0"
                                name="address" value="{{ $deal->address }}">
                            <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonAddress"
                                style="display: none" onclick="updateDescription()">Edit</button>
                        </div>
                    </form>
                    </p>
                    <p>
                        {{-- {{ $deal->address }} --}}
                    <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                        @csrf
                        @method('PUT')
                        <i class="fas fa-street-view"></i>
                        <div class="d-inline-block"
                            onmouseover="myFunction(this, 'cityCity', 'editButtoncity')"
                            onmouseout="hideEditLink(this, 'cityInput', 'editButtoncity')">
                            <input type="text" class="edit-input" id="cityInput" style="border: 0"
                                name="city" value="{{ $deal->city }}">
                            <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtoncity"
                                style="display: none" onclick="updateDescription()">Edit</button>
                        </div>
                    </form>
                    </p>
                    <p>
                        {{-- {{ $deal->address }} --}}
                    <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                        @csrf
                        @method('PUT')
                        <i class="fas fa-sign"></i>
                        <div class="d-inline-block"
                            onmouseover="myFunction(this, 'stateCity', 'editButtonState')"
                            onmouseout="hideEditLink(this, 'stateCity', 'editButtonState')">
                            <input type="text" class="edit-input" id="stateCity" style="border: 0"
                                name="state" value="{{ $deal->state }}">
                            <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonState"
                                style="display: none" onclick="updateDescription()">Edit</button>
                        </div>
                    </form>
                    </p>
                    <p>
                        <form class="updateForm d-flex align-items-center" action="{{ route('deals.update', $deal) }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <i class="fas fa-globe-europe"></i>

                        <div class="d-inline-block d-flex col-8"
                            onmouseover="myFunction(this, 'countryInput', 'editButtonCountry')"
                            onmouseout="hideEditLink(this, 'countryInput', 'editButtonCountry')">


                            <select class="edit-input" name="country" id="countryInput" style="border: 0">
                                <option value="">Choose option</option>
                                @foreach ($countries as $key => $country)
                                    <option value="{{ $key }}"
                                        {{ $key == $deal->country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="button" class="btn editBtn btn-primary btn-sm" id="editButtonCountry"
                                style="display: none" onclick="updateDescription()">
                                <i class="fas fa-check"></i></button>
                        </div>
                    </form>
             
                        <h6 class="mt-4 text-uppercase"> ORGANIZATION</h6>
                        <hr />
                        <p>
                            @if ($deal->organisation)
                            <form class="updateForm" action="{{ route('deals.update', $deal) }}" method="post">
                                @csrf
                                @method('PUT')
                                <span class="fa fa-building" aria-hidden="true"></span>

                                <div class="d-inline-block"
                                    onmouseover="myFunction(this, 'organisationInput', 'editButtonOrganisation')"
                                    onmouseout="hideEditLink(this, 'organisationInput', 'editButtonOrganisation')">

                                    <select class="edit-input" name="organisation_id" id="organisationInput"
                                        style="border: 0">
                                        @foreach ($organisations as $key => $organisation)
                                            <option value="{{ $key }}"
                                                {{ $key == $deal->organisation_id ? 'selected' : '' }}>
                                                {{ $organisation }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn editBtn btn-primary btn-sm"
                                        id="editButtonOrganisation" style="display: none"
                                        onclick="updateDescription()">Edit</button>
                                </div>
                            </form>
                        @endif
                        </p>
    
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
                                        @foreach ($deal->activities as $activity)
                                            @include('partials.activity', ['activity' => $activity])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notes1">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('note.create', ['model' => class_basename(get_class($deal)), 'id' => $deal->id]) }}"
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
                                        @foreach ($deal->notes as $note)
                                            @include('partials.note-content', ['note' => $note])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tasks">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('task.create', ['model' => class_basename(get_class($deal)), 'id' => $deal->id]) }}"
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

                                        @foreach ($deal->tasks as $task)
                                            @include('partials.task-content', ['task' => $task])
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="calls">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('calls.create', ['model' => class_basename(get_class($deal)), 'id' => $deal->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($deal->calls as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="meeting">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('meeting.create', ['model' => class_basename(get_class($deal)), 'id' => $deal->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($deal->meetings as $call)
                                            @include('partials.call-content', ['call' => $call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lunches">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('lunches.create', ['model' => class_basename(get_class($deal)), 'id' => $deal->id]) }}"
                                            method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @foreach ($deal->lunches as $call)
                                                @include('partials.call-content', ['call' => $call])
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="files">
                                    <div class="pt-4">
                                        <form
                                            action="{{ route('file.create', ['model' => class_basename(get_class($deal)), 'id' => $deal->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('partials.form.file', [
                                                'name' => 'file',
                                                'label' => 'File',
                                            ])
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($deal->files as $file)
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
            $.ajax({
                url: $('.updateForm').attr('action'),
                type: 'PUT',
                data: formData,
                success: function(response) {
                    console.log(response)
                    $('.edit-input').css('border', '0');
                    $('.editBtn').hide();
                    toastr.success('', 'Deal Update successfully');
                },
                error: function(error) {
                    // Handle error, if needed
                    console.error(error);
                }
            });
        }
    </script>
@endpush
