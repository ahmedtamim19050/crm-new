<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Label;
use App\Models\Organisation;
use App\Models\Person;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations = Organisation::where('user_id', auth()->id())->latest()->get();
        return view('dashboard.organisations.index', compact('organisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisation = new Organisation();
        // dd($organisation);

        return view('dashboard.organisations.create', compact('organisation'));
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
            'name' => 'required',
            // 'user_owner_id' => 'required',
            'address' => 'nullable',
            'label' => 'required',

        ]);
        // dd($request->meta);
        $organisation = Organisation::create([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'address' => $request->address,
            'external_id' => Uuid::uuid4()->toString(),
            'user_id' => auth()->id(),
            'label' => $request->label,
        ]);
        $organisation->createMetas($request->meta);
        return redirect()->route('organisations.index')->with('success', 'Organisation Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organisation $organisation)
    {
        $persons = Client::pluck('name', 'id')->toArray();
        $labels = Label::pluck('name', 'id')->toArray();
        return view('dashboard.organisations.show', compact('organisation', 'persons', 'labels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {

        return view('dashboard.organisations.edit', compact('organisation'));
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
        // $request->validate([
        //     'name'=>'required',
        //     'user_owner_id'=>'required',
        //     'address'=>'nullable',
        //     'label'=>'required'
        // ]);
        $organisation->update([
            'name' => $request->has('name') ? $request->name : $organisation->name,
            'user_owner_id' => $request->has('user_owner_id') ? $request->user_owner_id : $organisation->user_owner_id,
            'address' => $request->has('address') ? $request->address : $organisation->address,
            'label' => $request->has('label') ? $request->label : $organisation->label,
        ]);
        if ($request->meta) {

            $organisation->createMetas($request->meta);
        }
        return response()->json(['success' => true, 'message' => 'Lead updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {


        $organisation->delete();

        return redirect()->route('organisations.index')->with('success', 'Organisation Delete Successfully');
    }
    function organisationAjax(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $organisation = Organisation::create([
            'name' => $request->name,
            'user_owner_id' => $request->user_owner_id,
            'external_id' => Uuid::uuid4()->toString(),
            'user_id' => auth()->id(),
            'label' => $request->label,
        ]);
        $organisations = Organisation::all();
        return response()->json([
            'success' => true,
            'message' => 'Organisation added successfully',
            'data' => $organisation,
            'organisations' => $organisations, // Include the updated list of organisations
        ]);
    }
    public function socialUpdate(Request $request, Organisation $organisation)
    {

        $organisation->createMetas($request->meta);
        return back()->with('success', 'Social url updated Successfully');
    }
    public function personStore(Request $request, Organisation $organisation)
    {
        // dd($request->all());
        if ($request->person_id == !null) {
            $person = Person::find($request->person_id);
            $person->update([
                'first_name' => $request->f_name,
                'last_name' => $request->l_name,
                'gender' => $request->gender,
            ]);
            return back()->with('success', 'Persone update Successfully');
        } else {
            Person::create([
                'first_name' => $request->f_name,
                'last_name' => $request->l_name,
                'gender' => $request->gender,
                'organisation_id' => $organisation->id,
                'user_created_id' => auth()->id(),
    
            ]);
            return back()->with('success', 'Persone Add Successfully');
        }
     
       
    }
    public function fetchSocialData(Request $request,Organisation $organisation)
    {
        $socialData = $request->input('socials');
        // $socialData= json_decode($socials);
        // dd($socials[0]);

        return view('dashboard.organisations.partials.other_social_modal',compact('socialData','organisation'));
    }
    public function fetchSocialDataUpdate(Request $request, Organisation $organisation) {
        $organisation->createMetas($request->meta);
        return back()->with('success', 'Social url updated Successfully');
    }
}
