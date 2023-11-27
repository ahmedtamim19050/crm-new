<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Label;
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
        $clients=Client::latest()->get();
        return view('dashboard.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labels=Label::pluck('name','id')->toArray();

        return view('dashboard.clients.create',compact('labels'));
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
            'user_owner_id' => 'required',
        ]);
        $client = Client::create([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
        ]);

       $client->labels()->sync($request->labels ?? []);
       return redirect('/clients');
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
        return view('dashboard.clients.show', [
            'client' => $client,
            'persons' => $persons,
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
        $labels=Label::pluck('name','id')->toArray();
        return view('dashboard.clients.edit', [
            'client' => $client,
            'labels'=>$labels,
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
            'user_owner_id' => 'required',
        ]);
        $client=Client::find($id);
        $client->update([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
        ]);

       $client->labels()->sync($request->labels ?? []);
       return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
