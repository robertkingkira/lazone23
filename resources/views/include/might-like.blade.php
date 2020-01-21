
<section class="might-like-products">
    <h1 class="might-like-heading">Featured recommendations</h1>
    <hr>
    <div class="might-like-container glider-contain multiple">
        <button class="glider-prev">
            <i class="fa fa-chevron-left"></i>
        </button>

        <div class="might-like-slider glider">

            @foreach ($mightAlsoLike as $product)
                <div class="might-like-product">
                    <img class="might-like-img-promo" src="{{ asset('img/promo.png') }}" alt="promo">
                    <a class="might-like-img-link" href="{{ route('shop.show', $product->slug) }}"><img class="might-like-img" src="{{ asset('img/products/'.$product->slug.'.png') }}" alt="product"></a>
                    <p class="might-like-title">{{ $product->name }}</p>
                    <p class="might-like-oldprice"><del>{{ $product->presentOldPrice() }}</del></p>
                    <p class="might-like-price">{{ $product->presentPrice() }}</p>

                    <a class="might-like-button" href="{{ route('shop.show', $product->slug) }}">More</a>
                </div>
            @endforeach

        </div>

        <button class="glider-next">
            <i class="fa fa-chevron-right"></i>
        </button>

        <div id="dots" class="glider-dots"></div>
    </div>

</section>
