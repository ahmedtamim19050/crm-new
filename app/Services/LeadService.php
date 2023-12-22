<?php

namespace App\Services;

use App\Models\Lead;
use Ramsey\Uuid\Uuid;


class LeadService
{
    /**
     * @var LeadRepository
     */
    private $leadRepository;

    /**
     * LeadService constructor.
     * @param LeadRepository $leadRepository
     */

    public function create($request,$client = null,$organisation)
    {
  
        $lead = Lead::create([
            'external_id' => Uuid::uuid4()->toString(),
            'lead_id' => $request->lead_id ?? null,
            'client_id' => $client,
            // 'person_id' => $person->id,
            'organisation_id' => $organisation,
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'user_owner_id' => $request->user_owner_id,
            'user_id' => auth()->id(),
            'email' => $request->email,
            'phone' => $request->phone,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'post_code' => $request->code,
            'country' => $request->country,
            'label' => $request->label,
        ]);


        return $lead;
    }

    public function update($request, Lead $lead, $person = null, $organisation = null, $client = null)
    {
        $lead->update([
            'organisation_id' => $request->organisation_id,
            'client_id' => $request->client_id ?? null,
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'user_owner_id' => $request->user_owner_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'post_code' => $request->code,
            'country' => $request->country,
            'label' => $request->label,
        ]);

        // $lead->labels()->sync($request->labels ?? []);

        return $lead;
    }
}
