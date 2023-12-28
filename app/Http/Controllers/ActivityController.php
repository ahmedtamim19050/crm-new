<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ActivityController extends Controller
{
    public function noteCreate(Request $request, $model,$id) {
        $modelClass = "App\\Models\\{$model}";
        if (!class_exists($modelClass)) {
            abort(404); 
        }
        if($request->noted_at){
            $note_at=$request->noted_at;
        }else{
            $note_at=today();
        }

        $data=$modelClass::findOrFail($id);
        $note = $data->notes()->create([
            'external_id' => Uuid::uuid4()->toString(),
            'content' => $request->note,
            'noted_at' => $note_at,
            'user_created_id'=>auth()->id(),
        ]);

        $data->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'external_id' => Uuid::uuid4()->toString(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $data->getMorphClass(),
            'timelineable_id' => $data->id,
            'recordable_type' => $note->getMorphClass(),
            'recordable_id' => $note->id,
        ]);
        return back();
    }
    public function taskCreate(Request $request,$model,$id) {
        $modelClass = "App\\Models\\{$model}";
        if (!class_exists($modelClass)) {
            abort(404); 
        }

        $data=$modelClass::findOrFail($id);
        $task = $data->tasks()->create([
            'name' => $request->name,
            'external_id' => Uuid::uuid4()->toString(),
            'description' => $request->description,
            'due_at' => $request->due,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
        ]);

        $data->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $data->getMorphClass(),
            'timelineable_id' => $data->id,
            'recordable_type' => $task->getMorphClass(),
            'recordable_id' => $task->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();
    }
    public function callsCreate(Request $request,$model,$id) {
        $modelClass = "App\\Models\\{$model}";
        if (!class_exists($modelClass)) {
            abort(404); 
        }
        // dd($request->all());

        $modelData=$modelClass::findOrFail($id);

        $data = $request->validate([
            'title' => "required",
            'description' => "nullable",
            'form' => 'required',
            'to' => 'required',
            'guests' => 'nullable',
            // 'location' => "nullable",
        ]);

        $call = $modelData->calls()->create([
            'name' => $data['title'],
            'description' => $data['description'],
            'start_at' => $data['form'],
            'finish_at' => $data['to'],
            'location' => $request->location,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
            'external_id' => Uuid::uuid4()->toString(),
            'client_id'=>$request->guest,
        ]);


        // foreach ($request->guests as $personId) {
        //     if ($person = Person::find($personId)) {
        //         $call->contacts()->create([
        //             'entityable_type' => $person->getMorphClass(),
        //             'entityable_id' => $person->id,
        //         ]);
        //     }
        // }

        $modelData->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $modelData->getMorphClass(),
            'timelineable_id' => $modelData->id,
            'recordable_type' => $call->getMorphClass(),
            'recordable_id' => $call->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();

    }
    public function meetingCreate(Request $request,$model,$id) {
        $modelClass = "App\\Models\\{$model}";
        if (!class_exists($modelClass)) {
            abort(404); 
        }
        // dd($request->all());

        $modelData=$modelClass::findOrFail($id);
        $data = $request->validate([
            'title' => "required",
            'description' => "nullable",
            'form' => 'required',
            'to' => 'required',
            'guests' => 'nullable',
            'location' => "nullable",
        ]);

        $meeting = $modelData->meetings()->create([
            'name' => $data['title'],
            'description' => $data['description'],
            'start_at' => $data['form'],
            'finish_at' => $data['to'],
            'location' => $request->location,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
            'external_id' => Uuid::uuid4()->toString(),
            'client_id'=>$request->guest,
        ]);

        // foreach ($request->guests as $personId) {
        //     if ($person = Person::find($personId)) {
        //         $meeting->contacts()->create([
        //             'entityable_type' => $person->getMorphClass(),
        //             'entityable_id' => $person->id,
        //         ]);
        //     }
        // }

        $modelData->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $modelData->getMorphClass(),
            'timelineable_id' => $modelData->id,
            'recordable_type' => $meeting->getMorphClass(),
            'recordable_id' => $meeting->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();
    }
    public function lunchesCreate(Request $request,$model,$id) {
        $modelClass = "App\\Models\\{$model}";
        if (!class_exists($modelClass)) {
            abort(404); 
        }

        $modelData=$modelClass::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'form' => 'required',
            'to' => 'required',
            'guests' => 'nullable',
            'location' => "nullable",
        ]);

        $lunch = $modelData->lunches()->create([
            'name' => $data['title'],
            'description' => $data['description'],
            'start_at' =>  $data['form'],
            'finish_at' =>  $data['to'],
            'location' => $request->location,
            'user_owner_id' => auth()->user()->id,
            'user_assigned_id' => auth()->user()->id,
            'external_id' => Uuid::uuid4()->toString(),
            'client_id'=>$request->guest,
        ]);

        // foreach ($request->guests as $personId) {
        //     if ($person = Person::find($personId)) {
        //         $lunch->contacts()->create([
        //             'entityable_type' => $person->getMorphClass(),
        //             'entityable_id' => $person->id,
        //         ]);
        //     }
        // }

        $modelData->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $modelData->getMorphClass(),
            'timelineable_id' => $modelData->id,
            'recordable_type' => $lunch->getMorphClass(),
            'recordable_id' => $lunch->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();

    }
    public function fileCreate(Request $request, $model,$id) {
        $data = $request->validate([
            'file' => 'required',
        ]);
        $modelClass = "App\\Models\\{$model}";
        if (!class_exists($modelClass)) {
            abort(404); 
        }

        $modelData=$modelClass::findOrFail($id);

        $file = $request->file->store(strtolower(class_basename($modelData->model)).'/'.$modelData->id.'/files');

        $fileModel = $modelData->files()->create([
            'external_id' => Uuid::uuid4()->toString(),
            'file' => $file,
            'name' => $request->file->getClientOriginalName(),
            'filesize' => $request->file->getSize(),
            'mime' => $request->file->getMimeType(),
            'external_id' => Uuid::uuid4()->toString(),
            'user_created_id' => auth()->user()->id,
        ]);

        $modelData->activities()->create([
            'causable_type' => auth()->user()->getMorphClass(),
            'causable_id' => auth()->user()->id,
            'timelineable_type' => $modelData->getMorphClass(),
            'timelineable_id' => $modelData->id,
            'recordable_type' => $fileModel->getMorphClass(),
            'recordable_id' => $fileModel->id,
            'external_id' => Uuid::uuid4()->toString(),
        ]);
        return back();
    }
    public function activityDelete($model,$id)  {
        $modelClass = "App\\Models\\{$model}";
        if (!class_exists($modelClass)) {
            abort(404); 
        }
        $modelData=$modelClass::findOrFail($id);

        $modelData->delete();
        return back()->with('success','Note Delete Successfully');
    }
}
