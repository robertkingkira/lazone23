@extends('pages.layout')

@section('content')
<section id="products" class="featured-section">
    <div class="container-products">
        <div class="products-page-wrap">

            <h1 class="text-products">All products</h1>
            <hr class="line-title-products">

            <div class="products-header-price-container">
                <div class="products-header-wrap">
                    <h2 class="product-heading2">{{ $categoryName }}</h2>
                </div>
                <div class="product-price-nav">
                    <strong class="price-strong-text-nav">Price:</strong>
                    <a class="product-price-nav-link"
                        href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low
                        to High</a>
                    <p class="separator-line">|</p>
                    <a class="product-price-nav-link"
                        href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High
                        to Low</a>
                </div>
            </div>
        </div>
        <hr class="product-heading2-line">
        <div class="wrap-products-sidebar">
            <div class="sidebar-nav">
                <h3 class="sidebar-heading">By Category</h3>
                <ul class="sidebar-ul">
                    @foreach ($categories as $category)
                    <li id="sidebar-list" class="{{ setActiveCategory($category->slug) }}"><a class="sidebar-link"
                            href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach

                </ul>
                <div class="spacer"></div>
                {{-- <h3 class="sidebar-heading">By Price</h3>
                <ul class="sidebar-ul">
                    <li class="sidebar-list"><a class="sidebar-link" href="">$0 - $600</a></li>
                    <li class="sidebar-list"><a class="sidebar-link" href="">$600 - $1400</a></li>
                    <li class="sidebar-list"><a class="sidebar-link" href="">$1400 - $2400</a></li>
                    <li class="sidebar-list"><a class="sidebar-link" href="">$2400 - $3600</a></li>
                </ul> --}}
            </div>

            <div class="products text-products">
                <!-- Asa le adaugi in pagina direct din baza de date -->
                @forelse ($products as $product)
                <div class="product">
                    <a class="product-img-wrap" href="{{ route('shop.show', $product->slug) }}">
            <!-- Metoda de a incarca img este folosita pentru Voyager Admin -->
                        <img class="product-img" src="{{ productImage($product->image) }}" alt="Product">

            <!-- Metoda de a incarca img este folosita inainte de Voyager Admin -->
                        {{-- <img class="product-img" src="{{ asset('img/products/'.$product->slug.'.png') }}" alt="Product"> --}}
                    </a>
                    <a class="product-link" href="{{ route('shop.show', $product->slug) }}"><span
                            class="product-name">{{ $product->name }}</span></a>
                    <p class="product-description">{{ $product->details }}</p>
                    <div class="product-price">{{ $product->presentPrice() }}</div>
                    <div class="product-price2"><del>{{ $product->presentOldPrice() }}</del></div>
                    <a class="product-more-btn" href="{{ route('shop.show', $product->slug) }}">More</a>
                </div>
                @empty
                <div style="text-align: left">No items found</div>
                @endforelse

            </div> <!-- End Products -->
            
        </div>
        {{-- <div class="text-product button-container">
            <a href="#" class="button-more">View more products</a>
        </div> --}}
        <hr class="line-title-products">   
        {{ $products->appends(request()->input())->links() }}
    </div> <!-- END Container Products -->

    {{-- {{ $products->links() }} --}}

</section> <!-- END Featured Section Products -->

@endsection
