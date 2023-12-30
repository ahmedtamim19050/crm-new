<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Client;
use App\Models\Label;
use App\Models\Lead;
use App\Models\Organisation;
use App\Models\Person;
use App\Services\DealService;
use Illuminate\Http\Request;
use App\Services\LeadService;
use App\Services\OrganisationService;
use App\Services\PersonService;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;


class LeadController extends Controller
{
    /**
     * @var LeadService
     */
    private $leadService;

       /**
     * @var PersonService
     */
    private $personService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        /**
     * @var OrganisationService
     */
        /**
     * @var DealService
     */
    private $dealService;

    private $organisationService;

     public function __construct(LeadService $leadService ,DealService $dealService,PersonService $personService, OrganisationService $organisationService)
     {
         $this->leadService = $leadService;
         $this->personService = $personService;
         $this->organisationService = $organisationService;
         $this->dealService = $dealService;

     }



    public function index(Request $request)
    {


        $leads = Lead::where('user_id',auth()->id())->latest()->get();

        return view('dashboard.leads.index', [
            'leads' => $leads,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clients=Client::where('user_id',auth()->id())->pluck('name','id')->toArray();
        $organisations=Organisation::where('user_id',auth()->id())->pluck('name','id')->toArray();

        return view('dashboard.leads.create', [
            'clients' => $clients,
            'organisations' => $organisations,
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeadRequest $request)
    {
 
        if (!is_numeric($request->organisation_id)) {
            $organisation=Organisation::create([
                'name'=>$request->organisation_id,
                'user_id'=>auth()->id(),
                'user_owner_id'=>auth()->id(),
                'external_id' => Uuid::uuid4()->toString(),
             
            ]);
            $organisation=$organisation->id;
        }else{
            $organisation=$request->organisation_id;
        }

        if (!is_numeric($request->client_id)) {
            $client=Client::create([
                'name'=>$request->client_id,
                'user_id'=>auth()->id(),
                'user_owner_id'=>auth()->id(),
                'organisation_id'=>$organisation,
            ]);
            $client=$client->id;
        }else{
            $client=$request->client_id;
        }
        

        $lead = $this->leadService->create($request,$client,$organisation);
        $lead->createMetas($request->meta);
        return redirect()->route('leads.index')->with('success','Lead update successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        $labels=Label::pluck('name','id')->toArray();
        $clients=Client::where('user_id',auth()->id())->pluck('name','id')->toArray();
        $organisations=Organisation::where('user_id',auth()->id())->pluck('name','id')->toArray();

        return view('dashboard.leads.show',compact('lead','clients','organisations','labels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $clients=Client::where('user_id',auth()->id())->pluck('name','id')->toArray();
        $organisations=Organisation::where('user_id',auth()->id())->pluck('name','id')->toArray();
        return view('dashboard.leads.edit', [
            'lead' => $lead,
            'clients'=>$clients,
            'organisations'=>$organisations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $leadId)
    {
        $lead = Lead::find($leadId);

        if ($request->person_name && !$request->person_id) {
            $person = $this->personService->createFromRelated($request);
        } elseif ($request->person_id) {
            $person = Person::find($request->person_id);
        }

        $lead = $this->leadService->update($request, $lead);

        if ($request->meta) {
            $lead->createMetas($request->meta);
        }

        return response()->json(['success' => true, 'message' => 'Lead updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        
        return redirect(route('leads.index'))->with('success','Lead Delete successfully');
    }
    
    public function convert(Lead $lead) {
        $email = $lead->getPrimaryEmail();
        $phone = $lead->getPrimaryPhone();
        $address = $lead->getPrimaryAddress();
        $labels=Label::pluck('name','id')->toArray();

        return view('dashboard.leads.convert', [
            'lead' => $lead,
            'email' => $email ?? null,
            'phone' => $phone ?? null,
            'address' => $address ?? null,
            'labels'=>$labels,
        ]);
    }
    public function convertStore(StoreLeadRequest $request, Lead $lead) {
        if ($request->person_name && ! $request->person_id) {
            $person = $this->personService->createFromRelated($request);
        } elseif ($request->person_id) {
            $person = Person::find($request->person_id);
        }

        if ($request->organisation_name && ! $request->organisation_id) {
            $organisation = $this->organisationService->createFromRelated($request);
        } elseif ($request->organisation_id) {
            $organisation = Organisation::find($request->organisation_id);
        }

        $this->dealService->create($request, $person ?? null, $organisation ?? null);

        $lead->update([
            'converted_at' => Carbon::now(),
        ]);
        return redirect(route('deals.index'))->with('success','Lead Convert successfully');
    }
}
