<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Label;
use App\Models\Organisation;
use App\Models\Person;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations=Organisation::where('user_id',auth()->id())->pluck('name','id')->toArray();

        $clients=Client::where('user_id',auth()->id())->latest()->get();
        return view('dashboard.clients.index',compact('clients','organisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $organisations=Organisation::where('user_id',auth()->id())->pluck('name','id')->toArray();

        return view('dashboard.clients.create',compact('organisations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'user_owner_id' => 'required',
            // 'label' => 'required',
        
        ]);
        $client = Client::create([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'organisation_id' => $request->organisation_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id'=>auth()->id(),
            'label'=>$request->label,

        ]);
        $client->createMetas($request->meta);
       return redirect()->route('clients.index')->with('success','Contact Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $client=Client::find($id);
        $persons=Person::pluck('last_name','id')->toArray();
        $organisations=Organisation::where('user_id',auth()->id())->pluck('name','id')->toArray();
        return view('dashboard.clients.show', [
            'client' => $client,
            'persons' => $persons,
            'organisations'=>$organisations,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Client::find($id);
        $organisations=Organisation::where('user_id',auth()->id())->pluck('name','id')->toArray();
        return view('dashboard.clients.edit', [
            'client' => $client,
            'organisations'=>$organisations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'user_owner_id' => 'required',
            // 'label'=>'required',
        ]);
        $client=Client::find($id);
        $client->update([
            'name' => $request->has('name') ? $request->name : $client->name,
            'user_owner_id' => $request->has('user_owner_id') ? $request->user_owner_id : $client->user_owner_id,
            'organisation_id' => $request->has('organisation_id') ? $request->organisation_id : $client->organisation_id,
            'email' => $request->has('email') ? $request->email : $client->email,
            'phone' => $request->has('phone') ? $request->phone : $client->phone,
            'label' => $request->has('label') ? $request->phone : $client->label,
        ]);
        if($request->has('meta')){

            $client->createMetas($request->meta);
        }
        return response()->json(['success' => true, 'message' => 'Lead updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::find($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success','Client Delete Successfully');
    }
    public function clientAjax(Request $request) {
        $request->validate([
            'name'=>'required'
        ]);
        $client = Client::create([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'organisation_id' => $request->organisation_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id'=>auth()->id(),

        ]);
        $clients = Client::all();
        return response()->json([
            'success' => true,
            'message' => 'Contact added successfully',
            'data' => $client,
            'clients' => $clients,
        ]);
    }
    function orgFecth(Request $request)  {
        $orgId = $request->input('orgId');
        $organisation=Organisation::find($orgId);
        // dd($organisation);
        return $data=[
            'email'=>$organisation->company_email,
            'phone'=>$organisation->company_phone,
            'street'=>$organisation->street,
            'post_code'=>$organisation->post_code,
            'state'=>$organisation->state,
            'country'=>$organisation->country,
        ];
    }
}
