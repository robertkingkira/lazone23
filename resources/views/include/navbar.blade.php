<header id="main-header" class="header-main">
    <nav class="main-navbar">
        <div class="logo-wrapper">
            <a class="logo-link" href="/"><img class="logoImg" src="{{ asset('img/logo.png') }}" alt="Logo"></a>
            @if (! (request()->is('checkout') || request()->is('guestCheckout')))
            {{ menu('main', 'include.menus.main') }}
            @endif
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
