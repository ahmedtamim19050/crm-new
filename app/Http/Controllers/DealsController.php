<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDealRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\Deal;
use App\Models\Label;
use App\Models\Organisation;
use App\Models\Person;
use App\Services\DealService;
use App\Services\OrganisationService;
use App\Services\PersonService;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @var DealService
     */
    private $dealService;

    /**
     * @var PersonService
     */
    private $personService;

    /**
     * @var OrganisationService
     */
    private $organisationService;

    public function __construct(DealService $dealService, PersonService $personService, OrganisationService $organisationService)
    {
        $this->dealService = $dealService;
        $this->personService = $personService;
        $this->organisationService = $organisationService;
    }
    public function index(Request $request)
    {


        $clients = Client::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $organisations = Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $deals = Deal::where('user_id', auth()->id())->latest()->paginate(30);

        return view('dashboard.deals.index', [
            'deals' => $deals,
            'clients'=>$clients,
            'organisations'=>$organisations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       

        $clients = Client::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $organisations = Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();

        return view('dashboard.deals.create', [
            'clients' => $clients ?? null,
            'organisations' => $organisations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDealRequest $request)
    {
        // dd($request->all());
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
  
        $stage=Category::orderBy('order','asc')->first();
        if(!$stage){
            return redirect()->route('categories.index')->withErrors('Please insert atleast one stages');
        }
        $this->dealService->create($request, $person ?? null,$client,$organisation);
        if($request->category_id){
            return redirect()->route('kanvan')->with('success', 'Deal Create Successfully');
        }else{

            return redirect()->route('deals.index')->with('success', 'Deal Create Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal = Deal::find($id);
        if ($deal->person) {
            $email = $deal->person->getPrimaryEmail();
            $phone = $deal->person->getPrimaryPhone();
            $address = $deal->person->getPrimaryAddress();
        }
        $persons = Person::pluck('last_name', 'id')->toArray();

        return view('dashboard.deals.show', [
            'deal' => $deal,
            'email' => $email ?? null,
            'phone' => $phone ?? null,
            'address' => $address ?? null,
            'organisation_address' => $organisation_address ?? null,
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
        $deal = Deal::find($id);
        $clients = Client::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $organisations = Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();

        return view('dashboard.deals.edit', [
            'deal' => $deal,
            'organisations' => $organisations,
            'clients' => $clients,
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
        $deal = Deal::find($id);


        $deal = $this->dealService->update($request, $deal);
        return redirect()->route('deals.index')->with('success', 'Deal Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal = Deal::find($id);
        $deal->delete();
        return redirect()->route('deals.index')->with('success', 'Deal Delete Successfully');
    }
    function kanvan()
    {
        $clients = Client::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $organisations = Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $stages = Category::orderBy('order', 'asc')->get();
        return view('dashboard.deals.kanvan', compact('stages','clients','organisations'));
    }
    public function kanvanUpdate(Request $request)
    {
        // Retrieve data from the AJAX request
        $dealId = $request->input('dealId');
        $newStageId = $request->input('newStageId');
        $deal=Deal::find($dealId);
        $deal->update([
            'category_id'=>$newStageId,
        ]);
        return response()->json(['message' => 'Deal updated successfully']);
    }
}
