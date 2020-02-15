<ul class="nav-ul-right">

    @guest
    <li class="nav-list"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
    <li class="nav-list"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
    @else
    <li class="nav-list">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>
    </li>    

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf 
        </form>

    @endguest
    <li class="nav-list"><a class="nav-link" href="{{ route('cart.index') }}">Cart
    @if (Cart::instance('default')->count() > 0)   
    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
    @endif
    </a></li>
    

    {{-- @foreach ($items as $menu_item)
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
    @endforeach --}}
</ul>