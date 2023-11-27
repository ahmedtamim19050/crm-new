<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDealRequest;
use App\Models\Client;
use App\Models\Deal;
use App\Models\Label;
use App\Models\Organisation;
use App\Models\Person;
use App\Services\DealService;
use App\Services\OrganisationService;
use App\Services\PersonService;
use Illuminate\Http\Request;

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
       

     
            $deals = Deal::latest()->paginate(30);

        return view('dashboard.deals.index', [
            'deals' => $deals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        switch ($request->model) {
            case 'client':
                $client = Client::find($request->id);

                break;

            case 'organisation':
                $organisation = Organisation::find($request->id);

                break;

            case 'person':
                $person = Person::find($request->id);

                break;
        }
        $labels=Label::pluck('name','id')->toArray();

        return view('dashboard.deals.create', [
            'client' => $client ?? null,
            'organisation' => $organisation ?? null,
            'person' => $person ?? null,
            'labels'=>$labels,
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

        if ($request->client_name && ! $request->client_id) {
            $client = Client::create([
                'name' => $request->client_name,
                'user_owner_id' => $request->user_owner_id,
            ]);
        } elseif ($request->client_id) {
            $client = Client::find($request->client_id);

       
        }

        if (isset($client)) {
            if (isset($organisation)) {
                $client->contacts()->firstOrCreate([
                    'entityable_type' => $organisation->getMorphClass(),
                    'entityable_id' => $organisation->id,
                ]);
            }

            if (isset($person)) {
                $client->contacts()->firstOrCreate([
                    'entityable_type' => $person->getMorphClass(),
                    'entityable_id' => $person->id,
                ]);
            }
        }

        $this->dealService->create($request, $person ?? null, $organisation ?? null, $client ?? null);
        return redirect('/deals')->with('success','Deal Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal=Deal::find($id);
        if ($deal->person) {
            $email = $deal->person->getPrimaryEmail();
            $phone = $deal->person->getPrimaryPhone();
            $address = $deal->person->getPrimaryAddress();
        }

        if ($deal->organisation) {
            $organisation_address = $deal->organisation->getPrimaryAddress();
        }
        $persons=Person::pluck('last_name','id')->toArray();

        return view('dashboard.deals.show', [
            'deal' => $deal,
            'email' => $email ?? null,
            'phone' => $phone ?? null,
            'address' => $address ?? null,
            'organisation_address' => $organisation_address ?? null,
            'persons'=>$persons,
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
        $deal=Deal::find($id);
        if ($deal->person) {
            $email = $deal->person->getPrimaryEmail();
            $phone = $deal->person->getPrimaryPhone();
        }

        if ($deal->organisation) {
            $address = $deal->organisation->getPrimaryAddress();
        }
        $labels=Label::pluck('name','id')->toArray();

        return view('dashboard.deals.edit', [
            'deal' => $deal,
            'email' => $email ?? null,
            'phone' => $phone ?? null,
            'address' => $address ?? null,
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
        $deal=Deal::find($id);
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

        if ($request->client_name && ! $request->client_id) {
     
            $client = Client::create([
                'name' => $request->client_name,
                'user_owner_id' => $request->user_owner_id,
            ]);
        } elseif ($request->client_id) {
            $client = Client::find($request->client_id);
            $deal->client->update([
                'name'=>$request->client_name,
            ]);
        }

        if (isset($client)) {
            if (isset($organisation)) {
                $client->contacts()->firstOrCreate([
                    'entityable_type' => $organisation->getMorphClass(),
                    'entityable_id' => $organisation->id,
                ]);
            }

            if (isset($person)) {
                $client->contacts()->firstOrCreate([
                    'entityable_type' => $person->getMorphClass(),
                    'entityable_id' => $person->id,
                ]);
            }
        }

        $deal = $this->dealService->update($request, $deal, $person ?? null, $organisation ?? null, $client ?? null);
        return redirect('/deals')->with('success','Deal Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal=Deal::find($id);
        $deal->delete();
        return redirect('/deals')->with('success','Deal Delete Successfully');
    }
}
