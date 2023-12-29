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
            'organisation_id' => $request->has('organisation_id') ? $request->organisation_id : $lead->organisation_id,
            'client_id' => $request->has('client_id') ? $request->client_id : $lead->client_id,
            'title' => $request->has('title') ? $request->title : $lead->title,
            'description' => $request->has('description') ? $request->description : $lead->description,
            'amount' => $request->has('amount') ? $request->amount : $lead->amount,
            'currency' => $request->has('currency') ? $request->currency : $lead->currency,
            'user_owner_id' => $request->has('user_owner_id') ? $request->user_owner_id : $lead->user_owner_id,
            'email' => $request->has('email') ? $request->email : $lead->email,
            'phone' => $request->has('phone') ? $request->phone : $lead->phone,
            'state' => $request->has('state') ? $request->state : $lead->state,
            'city' => $request->has('city') ? $request->city : $lead->city,
            'address' => $request->has('address') ? $request->address : $lead->address,
            'post_code' => $request->has('code') ? $request->code : $lead->post_code,
            'country' => $request->has('country') ? $request->country : $lead->country,
            'label' => $request->has('label') ? $request->label : $lead->label,
        ]);
         

        // $lead->labels()->sync($request->labels ?? []);

        return $lead;
    }
}
