<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Web Developers"
        content="La Zone 23 is the place where you can get your desired website or app , and offers the support that you need.">
    <link class="logo-favicon" rel="icon" type="image/png" href="/img/diamond.svg"> <!-- END Logo Image Bara Sus -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch-theme-algolia.min.css">

    <script src="https://js.stripe.com/v3/"></script>

    @yield('extra-css')

    <title>{{config('app.name','La Zone 23')}}</title>

</head>

<body>

    <div id="app">

    

        @include('include.navbar')


    <main>
        @yield('content')

    </main>


        @include('include.footer')

    </div>

    @yield('extra-js')

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- END -- Jquery CDN -->

    <!-- Glider CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <!-- END -- Glider CDN  -->

    <!--  ALGOLIA SEARCH  -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

    <!--  ALGOLIA SEARCH THEME -->
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0"></script>
    <!-- END -- ALGOLIA SEARCH THEME -->


    <!-- END -- ALGOLIA SEARCH  -->

    <!-- Product Page Script -->
    {{-- <script src="{{ asset('/js/productPage.js') }}"></script> --}}
    <!-- End -- Product Page Script -->

    <!-- Product Page Script -->
    <script src="{{ asset('/js/mightLikeSlider.js') }}"></script>
    <!-- End -- Product Page Script -->

    <!-- Search Algolia Product Script -->
    <script src="{{ asset('/js/algolia.js') }}"></script>
    <!-- End -- Search Algolia Product Script -->
 
    <!-- Search Algolia Theme Script -->
    <script src="{{ asset('/js/algolia-instantsearch.js') }}"></script>
    <!-- End -- Search Algolia Theme Script -->   
    
    <!--  App js Script -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- End -- App js Script -->

</body>

</html>
