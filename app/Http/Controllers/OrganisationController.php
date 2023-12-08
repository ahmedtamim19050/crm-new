<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations=Organisation::where('user_id',auth()->id())->latest()->get();
        return view('dashboard.organisations.index',compact('organisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        return view('dashboard.organisations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'user_owner_id'=>'required',
            'address'=>'nullable',
            'label'=>'required'
        ]);
        $organisation = Organisation::create([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'address' => $request->address,
            'external_id' => Uuid::uuid4()->toString(),
            'user_id'=>auth()->id(),
            'label'=>$request->label,
        ]);
       return redirect('/organisations')->with('success','Organisation Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {

        return view('dashboard.organisations.edit',compact('organisation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        $request->validate([
            'name'=>'required',
            'user_owner_id'=>'required',
            'address'=>'nullable',
            'label'=>'required'
        ]);
        $organisation->update([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'address' => $request->address,
            'user_id'=>auth()->id(),
            'label'=>$request->label,
        ]);

       return redirect('/organisations')->with('success','Organisation Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        if($organisation->deals){
            foreach($organisation->deals as $deal){
                $deal->update([
                    'organisation_id'=>null,
                ]);
            }
        }
        $organisation->delete();
        return redirect('/organisations')->with('success','Organisation Delete Successfully');
    }
}
