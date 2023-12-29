@extends('layouts.default')

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
            <div class="col-xl-5">
                <div class="card">
                 
                    <div class="card-body">
                        <h6 class="text-uppercase">DETAILS</h6>
                        <hr />
                        <p ><i class="far fa-building"></i>

                                <span class="ms-2">{{ $organisation->name }}</span>

                        </p>
                        <p>
                            <i class="fas fa-phone-square-alt"></i>
                            <span class="ms-2">{{ $organisation->company_phone }}</span>
                        </p>
                        <p>
                            <i class="fas fa-envelope-open-text"></i>
                            <span class="ms-2">{{ $organisation->company_email }}</span>
                        </p>
                        <p>
                            <i class="fab fa-facebook"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary" href="{{ $organisation->company_fb }} " target="_blank"> {{ $organisation->company_email }}</a> </span>
                        </p>
                        <p>
                            <i class="fab fa-twitter-square"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary" href="{{ $organisation->company_twitter }} " target="_blank"> {{ $organisation->company_email }}</a> </span>
                        </p>
                        <p>
                            <i class="fab fa-youtube"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary" href="{{ $organisation->company_youtube }} " target="_blank"> {{ $organisation->company_email }}</a> </span>
                        </p>
                        <p>
                            <i class="fab fa-tiktok"></i>
                            <span class="ms-2"><a class="text-decoration-underline text-primary" href="{{ $organisation->company_tiktok }} " target="_blank"> {{ $organisation->company_email }}</a> </span>
                        </p>
                      
                        {{-- <h6 class="text-uppercase">Owner</h6>
                        <hr />
 
                        <p>
                            <span style="font-weight: 700">Name</span> 
                            @if ($organisation->ownerUser)
                                <a href="">{{ $organisation->ownerUser->name }}</a>
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
                                        @foreach ($organisation->activities as $activity)
                                            
                                        @include('partials.activity',['activity'=>$activity])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notes1">
                                    <div class="pt-4">
                                        <form action="{{route('note.create',['model' => class_basename(get_class($organisation)), 'id' => $organisation->id])}}" method="post">
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
                                            
                                        @include('partials.note-content',['note'=>$note,])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tasks">
                                    <div class="pt-4">
                                        <form action="{{route('task.create',['model' => class_basename(get_class($organisation)), 'id' => $organisation->id])}}" method="post">
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
                                            
                                        @include('partials.task-content',['task'=>$task,])
                                        @endforeach
                           
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="calls">
                                    <div class="pt-4">
                                        <form action="{{route('calls.create',['model' => class_basename(get_class($organisation)), 'id' => $organisation->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($organisation->calls as $call)
                                            
                                        @include('partials.call-content',['call'=>$call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="meeting">
                                    <div class="pt-4">
                                        <form action="{{route('meeting.create',['model' => class_basename(get_class($organisation)), 'id' => $organisation->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($organisation->meetings as $call)
                                            
                                        @include('partials.call-content',['call'=>$call])
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="lunches">
                                    <div class="pt-4">
                                        <form action="{{route('lunches.create',['model' => class_basename(get_class($organisation)), 'id' => $organisation->id])}}" method="post">
                                            @csrf
                                            @include('partials.activities')
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            @foreach ($organisation->lunches as $call)
                                            
                                            @include('partials.call-content',['call'=>$call])
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="files">
                                    <div class="pt-4">
                                        <form action="{{route('file.create',['model' => class_basename(get_class($organisation)), 'id' => $organisation->id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('partials.form.file', [
                                                'name' => 'file',
                                                'label' => 'File',
                                           
                                            ])
                                         <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        @foreach ($organisation->files as $file)
                                            
                                        @include('partials.file-content',['file'=>$file])
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
