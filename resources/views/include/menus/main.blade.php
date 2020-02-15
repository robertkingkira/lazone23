<ul class="nav-ul">
    @foreach ($items as $menu_item)
    <li class="nav-list">
        <a class="nav-link" href="{{ $menu_item->link() }}">
            {{ $menu_item->title }}
            @if ($menu_item->title == "Cart")
            @if (Cart::instance('default')->count() > 0)
            <span class="cart-count">
                <span>{{ Cart::instance('default')->count() }}</span>
            </span>
            @endif
            @endif
        </a>
    </li>
    @endforeach
</ul>


{{-- <ul class="nav-ul">
    <li class="nav-list"><a class="nav-link" href="/">Home</a></li>
    <li class="nav-list"><a class="nav-link" href="{{ route('shop.index') }}">Products</a></li>
    <li class="nav-list"><a class="nav-link" href="#contact">Contact</a></li>
    <li class="nav-list nav-search">
        <input type="text" id="searchBar" class="search-bar" placeholder="Search...">
        <span class="focus-border-search"></span>
        <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
    </li>
    <li class="nav-list">
        <a class="nav-link nav-cart-link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-bag cart-icon"></i>Cart
            <span class="cart-count">
                @if (Cart::instance('default')->count() > 0)
                <span>{{ Cart::instance('default')->count() }}</span>
            </span>
            @endif
        </a>
    </li>
    <li class="nav-list"><a class="nav-link" href="signin">Sign in <i class="fas fa-sign-out-alt sign-out-icon"></i></a></li>
</ul> --}}