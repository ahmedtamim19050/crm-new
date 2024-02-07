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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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
        $countries = Cache::remember('countries', 600, function () {
            return DB::table('countries')->pluck('name', 'name')->toArray();
        });

        return view('dashboard.deals.index', [
            'deals' => $deals,
            'clients' => $clients,
            'organisations' => $organisations,
            'countries' => $countries,
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
        if (auth()->user()->deals->count() < auth()->user()->deal_limit) {

            $organisation = $request->organisation_id;
            $client = $request->client_id;

            $stage = Category::orderBy('order', 'asc')->first();
            if (!$stage) {
                return redirect()->route('categories.index')->withErrors('Please insert atleast one stages');
            }
            $deal = $this->dealService->create($request, $person ?? null, $client, $organisation);
            $deal->createMetas($request->meta);


            return redirect()->route('kanvan')->with('success', 'Deal Create Successfully');
        }else{
            return back()->withErrors('Finish your Deal limitation');
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
        $persons = Person::pluck('last_name', 'id')->toArray();
        $labels = Label::pluck('name', 'id')->toArray();
        $clients = Client::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $organisations = Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $countries = Cache::remember('countries', 600, function () {
            return DB::table('countries')->pluck('name', 'name')->toArray();
        });

        return view('dashboard.deals.show', [
            'deal' => $deal,
            'persons' => $persons,
            'labels' => $labels,
            'clients' => $clients,
            'organisations' => $organisations,
            'countries' => $countries,
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
        $deal->createMetas($request->meta);

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
        $deal = Deal::find($id);
        $deal->delete();
        return redirect()->route('deals.index')->with('success', 'Deal Delete Successfully');
    }
    function kanvan()
    {
        $clients = Client::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $organisations = Organisation::where('user_id', auth()->id())->pluck('name', 'id')->toArray();
        $stages = Category::orderBy('order', 'asc')->get();
        $countries = Cache::remember('countries', 600, function () {
            return DB::table('countries')->pluck('name', 'name')->toArray();
        });

        return view('dashboard.deals.kanvan', compact('stages', 'clients', 'organisations', 'countries'));
    }
    public function kanvanUpdate(Request $request)
    {
        // Retrieve data from the AJAX request
        $dealId = $request->input('dealId');
        $newStageId = $request->input('newStageId');
        $deal = Deal::find($dealId);
        $deal->update([
            'category_id' => $newStageId,
        ]);
        return response()->json(['message' => 'Deal updated successfully']);
    }
}
