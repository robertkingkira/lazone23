@extends('pages.layout')

@section('content')

    <div class="thankyou-container">
        <h1 class="thankyou-title">
            Thank you for <br> Your Order!
        </h1>
        <p class="thankyou-subtitle">A confirmation email was sent</p>
        <a href="{{ url('/') }}" class="thankyou-button">Home Page</a>
    </div>
    
@endsection