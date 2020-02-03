@extends('layouts.app')

@section('extra-css')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

<div class="container-checkout">

    @if (session()->has('success_message'))
    <div class="spacer"></div>
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="spacer"></div>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <h1 class="checkout-heading">Checkout</h1>
    <hr>
    <div class="checkout-section">
        <div class="checkout-form-container">
            <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                {{ csrf_field() }}
                <h2 class="checkout-heading-2">Billing Details</h2>
                <div class="checkout-form-group">
                    <label class="checkout-label" for="email">Email Address</label>
                    <input class="checkout-input" type="email" class="checkout-form-control" id="email" name="email"
                        value="{{ old('email') }}" required>
                </div>
                <div class="checkout-form-group">
                    <label class="checkout-label" for="name">Name</label>
                    <input class="checkout-input" type="text" class="checkout-form-control" id="name" name="name"
                        value="{{ old('name') }}" required>
                </div>
                <div class="checkout-form-group">
                    <label class="checkout-label" for="address">Address</label>
                    <input class="checkout-input" type="text" class="checkout-form-control" id="address" name="address"
                        value="{{ old('address') }}" required>
                </div>

                <div class="checkout-half-form">
                    <div class="checkout-form-group">
                        <label class="checkout-label" for="city">City</label>
                        <input class="checkout-input" type="text" class="checkout-form-control" id="city" name="city"
                            value="{{ old('city') }}" required>
                    </div>
                    <div class="checkout-form-group form-group-right">
                        <label class="checkout-label" for="province">Province</label>
                        <input class="checkout-input" type="text" class="checkout-form-control" id="province"
                            name="province" value="{{ old('province') }}" required>
                    </div>
                </div> <!-- end Half Form -->
                <div class="checkout-half-form">
                    <div class="checkout-form-group">
                        <label class="checkout-label" for="postalcode">Postal Code</label>
                        <input class="checkout-input" type="text" class="checkout-form-control" id="postalcode"
                            name="postalcode" value="{{ old('postalcode') }}" required>
                    </div>
                    <div class="checkout-form-group form-group-right">
                        <label class="checkout-label" for="phone">Phone</label>
                        <input class="checkout-input" type="text" class="checkout-form-control" id="phone" name="phone"
                            value="{{ old('phone') }}" required>
                    </div>
                </div> <!-- end Half Form -->

                {{--  <div class="spacer"></div> --}}

                <h2 class="checkout-payment-heading">Payment Details</h2>

                <div class="checkout-form-group">
                    <label class="checkout-label" for="name_on_card">Name on Card</label>
                    <input class="checkout-input" type="text" class="checkout-form-control" id="name_on_card"
                        name="name_on_card" value="{{ old('name_on_card') }}" required>
                </div>

                <div class="checkout-form-group">
                    <label class="checkout-label" for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <!-- Aici jos a fost continuarea From-ului , dar acum ca am integrat Stripe nu mai avem nevoie de el -->

                {{--  <div class="checkout-form-group">
                    <label class="checkout-label" for="address">Address</label>
                    <input class="checkout-input" type="text" class="checkout-form-control" id="address" name="address" value="">
                </div> --}}

                {{-- <div class="checkout-form-group">
                    <label class="checkout-label" for="cc-number">Credit Card Number</label>
                    <input class="checkout-input" type="text" class="checkout-form-control" id="cc-number" name="cc-number" value="">
                </div>

                <div class="checkout-half-form">
                    <div class="checkout-form-group">
                        <label class="checkout-label" for="expiry">Expiry</label>
                        <input class="checkout-input" type="text" class="checkout-form-control" id="expiry" name="expiry" placeholder="MM/DD">
                    </div>

                    <div class="checkout-form-group form-group-right">
                        <label class="checkout-label" for="cvc">CVC Code</label>
                        <input class="checkout-input" type="text" class="checkout-form-control" id="cvc" name="cvc" value="">
                    </div>
                </div> --}}
                <!-- end Half Form -->

                <div class="spacer"></div>

                <button type="submit" id="complete-order" class="checkout-button">Complete Order</button>

            </form> <!-- end Form -->

        </div>

        <div class="checkout-table-container">
            <h2 class="checkout-heading-2">Your Order</h2>
            <hr>
            <div class="checkout-table">

                @foreach (Cart::content() as $item)

                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <div class="checkout-table-img-wrap">
                                <img src="{{ asset('img/products/'.$item->model->slug.'.png')}}" alt="item"
                                    class="checkout-table-img">
                            </div>
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                <div class="checkout-table-description">{{ $item->model->details }}</div>
                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end Checkout Table Row Left -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                        </div>
                    </div> <!-- end Checkout Table Row -->

                @endforeach

                <hr>

                <div class="checkout-totals">
                    <div class="checkout-total-row-left">
                        <div class="checkout-subtotal">Subtotal</div>
                        @if (session()->has('coupon'))
                            <div class="checkout-discount">Discount({{ session()->get('coupon')['name'] }}) : 
                                <form action="{{ route('coupon.destroy') }}" method="POST" style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="discount-remove-button" type="submit">Remove</button>
                                </form>
                                <br>
                                <hr>
                                New Subtotal <br>
                            </div>
                        @endif
                        
                        <div class="checkout-tax">Tax</div>
                        <div class="checkout-total">Total</div>
                    </div>
                    <div class="checkout-total-row-right">
                        <div class="checkout-subtotal">{{ presentPrice(Cart::subtotal()) }}</div>
                        @if (session()->has('coupon'))
                            <div class="checkout-discount">
                                -{{ presentPrice($discount) }} <br>
                                <hr>
                                {{ presentPrice($newSubtotal) }} <br>
                            </div>
                        @endif
                        
                        <div class="checkout-tax">{{ presentPrice($newTax) }}</div>
                        <div class="checkout-total">{{ presentPrice($newTotal) }}</div>
                    </div>
                </div> <!-- end Checkout Totals -->

                <hr> 

                @if (! session()->has('coupon'))
                    <a href="#" class="have-code-link">Have a Code ?</a>

                    <form class="promo-code-form" action="{{ route('coupon.store') }}" method="POST">
                    {{ csrf_field() }}
                        <input class="promo-code-input" type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button-promo-code">Apply</button>
                    </form>

                @endif
            </div>

        </div> <!-- end Checkout Section -->

    </div> <!-- end Checkout Container -->


    @endsection


    @section('extra-js')
    <script>
        (function () {
            // Create a Stripe client.
            var stripe = Stripe('pk_test_GTWFGaeZW9rkVRqqLTDqZRST00FOGzhAlr');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Nunito Sans",Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value
                };

                stripe.createToken(card, options).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        // Enable the submit button 
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();

    </script>
    @endsection
