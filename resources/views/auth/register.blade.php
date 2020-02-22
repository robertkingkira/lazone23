@extends('pages.layout')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div>

            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif
    
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h2>Create Account</h2>
            <div class="spacer"></div>

            <form action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Password" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required >

                <div class="login-container">
                    <button type="submit" class="auth-button create-account-button">Create Account</button>
                    <div class="already-have-container">
                        <p><strong>Already have an account?</strong></p>
                        <a class="login-button" href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="spacer"></div>

                <a class="forgot-password-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            
            </form>
        </div>

        <div class="auth-right">
            <h2>New Customer</h2>
            <div class="spacer"></div>
            <p><strong>Save time now.</strong></p>
            <p>Creating an account will allow you to checkout faster in the future, have easy access to order history and customize your experience to suit your preferences.</p>
            <div class="spacer"></div>
            {{-- <a href="{{ route('guestCheckout.index') }}" class="auth-button-hollow">Continue as Guest</a> --}}
            <div class="spacer"></div>
            &nbsp;
            <div class="spacer"></div>
            <p><strong>Loyalty Program</strong></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim quos nisi aliquid totam eaque? Fugit adipisci vero eum cupiditate consequatur.</p>
            <div class="spacer"></div>
            {{-- <a href="{{ route('register') }}" class="auth-button-hollow">Create Account</a> --}}
        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection
