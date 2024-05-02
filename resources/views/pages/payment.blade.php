@extends('layouts.front.app')
@section('content')
  <div class="container d-flex align-items-center justify-content-center" >
     <div class="row align-items-center">
        <div class="col-md-7 ">
            <img src="https://static.vecteezy.com/system/resources/previews/000/684/217/original/online-payment-with-mobile-phone-and-credit-card.jpg" alt="">
        </div>
        <div class="col-md-5 shadow  px-4 pt-2 pb-4" style="margin:0 auto;border-radius:30px;max-height:30vh">
            <form action="{{route('payment.store')}}" method="post" id="paymentForm">
            <div class="row">
                {{-- <img src="https://png.pngtree.com/png-vector/20220517/ourmid/pngtree-credit-card-payment-for-shopping-at-mall-with-easy-emi-plans-png-image_4650240.png" alt="" > --}}
                 @csrf

                <div class="col-md-6 mb-4 mt-3">
                    <p style="font-weight: 700;font-size:16px">{{auth()->user()->package->title}}</p>
                </div>
                <div class="col-md-6 mb-4 mt-3">
                    <p class="text-right" style="font-weight: 700;font-size:25px">${{auth()->user()->package->price}} <small style="font-size:12px">month</small></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-label mb-3">Credit / Devit card</label>
                    <div id="card-element" class="form-control bg-light"></div>
                </div>
                <input id="card-holder-name" type="hidden" value="{{ auth()->user()->name }}">
                <input name="payment_method" id="card-payment-method" type="hidden">
                <div class="col-md-12 mt-3">
                    <button id="card-button" class="btn btn-primary w-100" type="button"  data-secret="{{ $intent->client_secret }}">Subscribe</button>
                </div>
            </div>
        </form>
        </div>
     </div>
  </div>

  <script src="https://js.stripe.com/v3/"></script>

  <script>
      const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    //   console.log(stripe.confirmCardSetup)
      const elements = stripe.elements();
      const cardElement = elements.create('card');

      cardElement.mount('#card-element');
      const cardHolderName = document.getElementById('card-holder-name');
      const cardButton = document.getElementById('card-button');
      const paymentForm = document.getElementById('paymentForm');
      const clientSecret = cardButton.dataset.secret;

      cardButton.addEventListener('click', async (e) => {
          console.log('clicked')
          const {
              setupIntent,
              error
          } = await stripe.confirmCardSetup(
              clientSecret, {
                  payment_method: {
                      card: cardElement,
                      billing_details: {
                          name: cardHolderName.value
                      }
                  }
              }
          );

          if (error) {
              console.log(error);
              {{-- document.getElementById('card-payment-method').value = error.setupIntent.payment_method; --}}
              toastr.error(error.message)
          } else {
          console.log(setupIntent);
              document.getElementById('card-payment-method').value = setupIntent.payment_method;
              toastr.info('Payment method is verified');
              paymentForm.submit();

          }
      });
  </script>

@endsection