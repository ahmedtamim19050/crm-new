@extends('layouts.default')

@section('css')
    <style>
        body {
            color: #8e9194;
            /* background-color: #f4f6f9; */
        }

        .avatar-xl img {
            width: 110px;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        .text-muted {
            color: #aeb0b4 !important;
        }

        .text-muted {
            font-weight: 300;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #4d5154;
            background-color: #ffffff;
            background-clip: padding-box;
            border: 1px solid #eef0f3;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 ">
                <h2 class="h3 mb-4 page-title">Settings</h2>
                <div class="my-4">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card p-3">
                                <div class="row mt-5 align-items-center">
                                    <div class="col-md-3 text-center mb-5">
                                        <div class="avatar avatar-xl">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..."
                                                class="avatar-img rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <h4 class="mb-1">{{ Auth()->user()->name }}</h4>
                                                <p class="small mb-3"><span
                                                        class="badge badge-dark">{{ auth()->user()->email }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row mb-4">

                                            <div class="col">
                                                <p class=" mb-0 text-muted">{{auth()->user()->pm_type}} ****{{auth()->user()->pm_last_four}}</p>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-3">
                                <form id="cardAddFrom" class="mt-3" action="{{route('update.card')}}" method="POST">
                                    @csrf
                                    <h2 class="h3 mb-4 page-title">
                                        Change Payment Method
                                    </h2>

                                    <input id="card-holder-name" type="hidden" value="{{ auth()->user()->name }}">

                                    <input class=" " type="hidden" id="paymentmethod" name="payment_method"
                                        value="">
                                    <div id="card-element"></div>


                                    <div class="row">

                                        <div class="col-md-6" style="margin-top: 15px; ">
                                            <button class="btn  btn-dark btn-sm rounded shadow" style="border-radius: 10px"
                                                type="button" id="card-button"  data-secret="{{ $intent->client_secret }}">Add</button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <h2 class="h3 mb-4 page-title">Profile </h2>

                    <div class="card p-3">
                        <form action="{{route('profile.update')}}" method="POST">
                             @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{auth()->user()->name}}" required/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Email</label>
                                    <input type="text" id="email" name="email" class="form-control"  value="{{auth()->user()->email}}" readonly/>
                                </div>
                            </div>
                           
                            
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </form>
                    </div>
                    <hr class="my-4" />
                    <h2 class="h3 mb-4 page-title">Password Change </h2>
                    <div class="card p-3">
                        <form class="form-horizontal" method="POST" action="{{ route('change.password') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('current_password') ? '  has-error' : '' }}">
                                <label for="new_password" class="col-md-4 control-label">Current
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control"
                                        name="current_password" required>


                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                <label for="new_password" class="col-md-4 control-label mt-2">New
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control"
                                        name="new_password" required>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirm" class="col-md-4 control-label mt-2">Confirm
                                    New
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="new_password_confirm" type="password" class="form-control"
                                        name="new_password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger rounded">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://js.stripe.com/v3/"></script>

<script>
const stripe = Stripe("{{ env('STRIPE_KEY') }}");

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');

const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;

cardButton.addEventListener('click', async (e) => {
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
if (error?.setupIntent) {
document.getElementById('paymentmethod').value = error.setupIntent.payment_method
toastr.success('Card added');
} else {
toastr.error('Something went wrong. Try again letter');
}

} else {
document.getElementById('paymentmethod').value = setupIntent.payment_method
toastr.success('Card added');
$('#cardAddFrom').submit();
}
});

</script>

@endpush
