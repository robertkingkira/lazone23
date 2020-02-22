<header id="main-header" class="header-main">
    <nav class="main-navbar">
        <div class="logo-wrapper">
            <a class="logo-link" href="/"><img class="logoImg" src="{{ asset('img/logo.png') }}" alt="Logo"></a>
            @if (! (request()->is('checkout') || request()->is('guestCheckout')))
            {{ menu('main', 'include.menus.main') }}
            @endif
        </div>

        <div class="container-search-nav">
            @include('include.search')
        </div>

        <div class="top-nav-right">
            
            @if (! (request()->is('checkout') || request()->is('guestCheckout')))
            @include('include.menus.main-right')
            @endif
        </div>

    </nav>
    <hr class="line-header">
</header>
<!-- End Header -->


@section('extra-js')
    <!--  ALGOLIA SEARCH  -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <!-- END -- ALGOLIA SEARCH  -->

    <!--  ALGOLIA SEARCH THEME -->
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0"></script>
    <!-- END -- ALGOLIA SEARCH THEME -->

    <!-- Search Algolia Product Script -->
    <script src="{{ asset('/js/algolia.js') }}"></script>
    <!-- End -- Search Algolia Product Script -->

    <!-- Search Algolia Theme Script -->
    <script src="{{ asset('/js/algolia-instantsearch.js') }}"></script>
    <!-- End -- Search Algolia Theme Script -->    
@endsection