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
        $labels = App\Models\Label::pluck('name', 'id')->toArray();
        $persons = App\Models\Person::pluck('last_name', 'id')->toArray();
        $organisations = App\Models\Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $countries = Cache::remember('countries', 600, function () {
            return DB::table('countries')->pluck('name', 'name')->toArray();
        });
        $clients = App\Models\Client::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
    @endphp
    <div class="container-fluid mx-2">

        <style>
            .card-body p span {
                margin-left: 10px;
            }
        </style>

        <div class="row">


            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />

                        <p>
                            <i class="fa-solid fa-heading"></i>
                            <span>{{ $dataTypeContent->title }}</span></span>
                        </p>
                        <p>
                            <i class="fa-solid fa-info"></i>
                            <span>{{ $dataTypeContent->description }}</span></span>
                        </p>
                        <p>
                            <i class="fas fa-envelope-open"></i>
                            <span>{{ $dataTypeContent->email }}</span>
                        </p>

                        <p> <i class="fas fa-phone-alt"></i>
                            <span>{{ $dataTypeContent->phone }}</span>
                        </p>

                        @if ($dataTypeContent->labelName)
                            <p> <i class="fa-solid fa-tag"></i>
                                <span class="badge light badge-success text-white"
                                    style="background-color:{{ $dataTypeContent->labelName->color }}">{{ $dataTypeContent->labelName->name }}</span>
                            </p>
                        @endif

                        @if ($dataTypeContent->close_date)
                            <hr />
                            <h6 class="mt-4 text-uppercase"> Expected close date</h6>
                            <p>

                                <i class="fa-solid fa-calendar-days"></i>
                                <span>{{ $dataTypeContent->close_date }}</span>

                            </p>
                        @endif


                        <hr />
                        <h6 class="mt-4 text-uppercase"> Address</h6>

                        <p>
                            <i class="fa-solid fa-map-location-dot"></i>
                            <span>{{ $dataTypeContent->address }}</span>

                        </p>
                        <p>
                            <i class="fas fa-street-view"></i>
                            <span>{{ $dataTypeContent->city }}</span>

                        </p>
                        <p>

                            <i class="fas fa-sign"></i>
                            <span>{{ $dataTypeContent->state }}</span>

                        </p>
                        <p>
                            <i class="fas fa-globe-europe"></i>
                            <span>{{ $dataTypeContent->country }}</span>

                        </p>

                        @if ($dataTypeContent->organisation)
                            <hr />
                            <h6 class="mt-4 text-uppercase"> ORGANIZATION</h6>
                            <p>
                                <i class="fa-regular fa-building"></i>
                                <span>{{ $dataTypeContent->organisation->name }}</span>
                            </p>
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
    iv>

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

@stop
