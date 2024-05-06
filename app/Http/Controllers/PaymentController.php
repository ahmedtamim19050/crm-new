<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Product;
use Stripe\Stripe;
use Stripe\Price;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function payment()  {
        $user=auth()->user();
        return view('pages.payment',[
            'intent' => $user->createSetupIntent()
        ]);
    }
    public function paymentStore(Request $request){
        //   dd($request->all());
        $user = auth()->user();
          $package=$user->package;
          $user->createOrGetStripeCustomer();
          $user->addPaymentMethod($request->payment_method);
          Stripe::setApiKey(env('STRIPE_SECRET'));
          $product = Product::create([
              'name' => $package->title,
          ]);

          $price = Price::create([
            'product' => $product->id,
            'unit_amount' => $package->price * 100,
            'currency' => 'usd',
            'recurring' => [
                'interval' => 'month',
            ],
            'nickname' => $package->title,
        ]);


        $sub = $user->newSubscription($package->title, $price->id);
        if ($package->trail_days) {
            $sub->trialUntil(Carbon::now()->addDays($package->trail_days));
        }

        $sub->create($request->payment_method);
        return redirect()->route('dashboard')->with('success', 'Thanks for your subscriptions');
    }
    public function charges()  {
        $charges = Auth()->user()->invoices();

        return view('dashboard.charges',compact('charges'));
    }
    public function updateCard(Request $request)  {
        $user=auth()->user();
        $user->updateDefaultPaymentMethod($request->payment_method);
        return back()->with('success', 'Thanks for your subscriptions');

    }
    public function cencel()  {
        if(auth()->user()->subscription(auth()->user()->package->title)->ends_at == null){

            auth()->user()->subscription(auth()->user()->package->title)->cancel();
            return back()->with('success', 'your subscriptions will be cancelled');
        }else{
            auth()->user()->subscription(auth()->user()->package->title)->resume();
            return back()->with('success', 'your subscriptions will be Resumed');
        }
    }
}
