<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Web Developers"
        content="DeCA23Designs is the place where you can get your desired website or app , and offers the support that you need.">
    <link class="logo-favicon" rel="icon" type="image/png" href="/img/diamond.svg"> <!-- END Logo Image Bara Sus -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="https://js.stripe.com/v3/"></script>

    @yield('extra-css')

    <title>{{config('app.name','La Zone 23')}}</title>

</head>

<body>

        @include('include.navbar')


    <main>
        @yield('content')

        @yield('extra-js')
    </main>





        @include('include.footer')



    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- END -- Jquery CDN -->

    <!-- Glider CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <!-- END -- Glider CDN  -->

    <!-- Product Page Script -->
    <script src="{{ asset('/js/productPage.js') }}"></script>
    <!-- End -- Product Page Script -->

    <!-- Product Page Script -->
    <script src="{{ asset('/js/mightLikeSlider.js') }}"></script>
    <!-- End -- Product Page Script -->

    <!-- Axios App js Script -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- End -- Axios App js Script -->

</body>

</html>
