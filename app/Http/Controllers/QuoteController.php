<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Label;
use App\Models\Organisation;
use App\Models\Person;
use App\Models\Quote;
use App\Services\OrganisationService;
use App\Services\PersonService;
use App\Services\QuoteService;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var QuoteService
     */
    private $quoteService;

    /**
     * @var PersonService
     */
    private $personService;

    /**
     * @var OrganisationService
     */
    private $organisationService;

    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @var SettingService
     */
    private $settingService;
    public function __construct(QuoteService $quoteService, PersonService $personService, OrganisationService $organisationService, )
    {
        $this->quoteService = $quoteService;
        $this->personService = $personService;
        $this->organisationService = $organisationService;
    }

    public function index()
    {
        //
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
        $persons=Person::pluck('last_name','id')->toArray();
        $labels=Label::pluck('name','id')->toArray();
        // $quoteTerms = $this->settingService->get('quote_terms');

        return view('dashboard.quotes.create', [
            'client' => $client ?? null,
            'organisation' => $organisation ?? null,
            'person' => $person ?? null,
            // 'prefix' => $this->settingService->get('quote_prefix'),
            'number' => (Quote::latest()->first()->number ?? 1000) + 1,
            // 'quoteTerms' => $quoteTerms,
            'persons'=>$persons,
            'labels'=>$labels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
