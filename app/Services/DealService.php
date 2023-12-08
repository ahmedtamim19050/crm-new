<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Deal;
use Ramsey\Uuid\Uuid;
use VentureDrake\LaravelCrm\Models\DealProduct;
use VentureDrake\LaravelCrm\Repositories\DealRepository;

class DealService
{
    /**
     * @var DealRepository
     */
    private $dealRepository;

    /**
     * LeadService constructor.
     * @param DealRepository $dealRepository
     */
    // public function __construct(DealRepository $dealRepository)
    // {
    //     $this->dealRepository = $dealRepository;
    // }

    public function create($request, $person = null)
    {
        $stage=Category::where('user_id',auth()->id())->orderBy('order','asc')->first();

        $deal = Deal::create([
            'external_id' => Uuid::uuid4()->toString(),
            'lead_id' => $request->lead_id ?? null,
            'client_id' => $request->client_id,
            // 'person_id' => $person->id,
            'organisation_id' => $request->organisation_id,
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'expected_close' => $request->expected_close,
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
            'category_id' => $stage->id,
 
            // 'external_id' => Uuid::uuid4()->toString(),
        ]);


        if (isset($request->item_deal_product_id)) {
            foreach ($request->item_deal_product_id as $dealProductKey => $dealProductValue) {
                $deal->dealProducts()->create([
                    'external_id' => Uuid::uuid4()->toString(),
                    'product_id' => $request->item_product_id[$dealProductKey],
                    'price' => $request->item_price[$dealProductKey],
                    'quantity' => $request->item_quantity[$dealProductKey],
                    'amount' => $request->item_amount[$dealProductKey],
                ]);
            }
        }
        

        return $deal;
    }

    public function update($request, Deal $deal, $person = null, $organisation = null, $client = null)
    {
        $deal->update([
            // 'person_id' => $person->id ?? null,
            'organisation_id' => $request->organisation_id,
            'client_id' => $request->client_id ?? null,
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'expected_close' => $request->expected_close,
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

        // $deal->labels()->sync($request->labels ?? []);

        // if (isset($request->item_deal_product_id)) {
        //     foreach ($request->item_deal_product_id as $dealProductKey => $dealProductValue) {
        //         $dealProduct = DealProduct::find($dealProductValue);

        //         if ($dealProduct) {
        //             $dealProduct->update([
        //                 'product_id' => $request->item_product_id[$dealProductKey],
        //                 'price' => $request->item_price[$dealProductKey],
        //                 'quantity' => $request->item_quantity[$dealProductKey],
        //                 'amount' => $request->item_amount[$dealProductKey],
        //             ]);
        //         }
        //     }
        // }

        return $deal;
    }
}
