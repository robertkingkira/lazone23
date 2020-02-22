@extends('pages.layout')

@section('content')

<div class="container-alert-product">
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
</div>

<section class="product-page-main">

    <div class="product-page-container-img">
        <div class="product-page-wrap-img">
    <!-- Metoda asta merge de a incarca img merge cu Voyager Admin Dashboard -->
            <img id="currentImage" class="product-page-img active" src="{{ productImage($product->image) }}" alt="product">
    <!--Metoda de jos de a incarca img mergea inainte de a adauga Voyager Admin -->
            {{-- <img id="imageProduct" class="product-page-img" src="{{ asset('img/products/'.$product->slug.'.png') }}" alt="product"> --}}
        </div>

        <div class="product-page-images-thumb">
            {{-- <div class="images-thumb-wrapper selected">
                <img class="images-thumb" src="{{ asset('img/products/desktop-1.png') }}" alt="product">
            </div>--}}

            <div class="images-thumb-wrapper selected">
                <img class="images-thumb" src="{{ productImage($product->image) }}" alt="product">
            </div>

            @if ($product->images)
                @foreach (json_decode($product->images, true) as $image)
                <div class="images-thumb-wrapper">
                    <img class="images-thumb" src="{{ productImage($image) }}" alt="product">
                </div>
                @endforeach
            @endif

        </div>
    </div>

    <div class="product-page-info">
        <h1 class="product-page-title">{{ $product->name }}</h1>
        <div class="product-page-subtitle">{{ $product->details }}</div>
        <div class="product-page-oldprice"><del>{{ $product->presentOldPrice() }}</del></div>
        <div class="product-page-price">{{ $product->presentPrice() }}</div>


        <div class="product-wrapper-details">
            <p class="product-page-description">
                {!! $product->description !!}
            </p>
        </div>
        <p>&nbsp;</p>
        <div class="product-page-button-wrap">

            <button class=" add-to-favorites-button" href="#"><i class="far fa-heart add-to-fav-heart-btn"></i> Add to Favorites</>
            {{-- <a class="product-page-button" href="#">Add to Cart</a> --}}

            <form action="{{ route('cart.store', $product) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <button type="submit" class="product-page-button button-plain">Add to Cart</button>
            </form>
        </div>
        <div class="payment-method-cards-wrap">
            <img class="payment-method-cards-img" src="{{ asset('img/cards.png') }}" alt="cards">
        </div>
    </div>

</section>
<hr class="product-page-bottom-line">

<div class="product-info-container">
    <h1 class="product-info-heading">Product information</h1>

    <table class="product-table">
        <tbody class="product-table-tbody">
            <tr class="product-table-tr tr-color">
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr class="product-table-tr">
                <th>Flavours</th>
                <td>Natural</td>
            </tr>
            <tr class="product-table-tr tr-color">
                <th>Vitamins</th>
                <td>A, B, C</td>
            </tr>
            <tr class="product-table-tr">
                <th>Product Dimensions</th>
                <td>{{ $product->details }}</td>
            </tr>
            <tr class="product-table-tr tr-color">
                <th>OZ</th>
                <td>340g/Box</td>
            </tr>
        </tbody>
    </table>

</div>


@include('include.might-like')

<div class="footer-nav-product">
    <div class="footer-bg-product-rounded">
        <div class="footerContainer-product">
            <div class="footer-nav-wrap-left">
                <h1 class="footer-title-left">About us</h1>
                <ul class="footer-product-ul">
                    <li class="footer-product-list"><a class="footer-product-link" href="#">Founders</a>
                    </li>
                    <li class="footer-product-list"><a class="footer-product-link" href="#">La Zone 23 Team</a></li>
                    <li class="footer-product-list"><a class="footer-product-link" href="">Blog</a>
                    </li>
                    <li class="footer-product-list"><a class="footer-product-link" href="#">Business</a>
                    </li>
                </ul>
            </div>

            <div class="footer-nav-wrap-middle">
                <h1 class="footer-title-middle">Client Services</h1>
                <ul class="footer-product-ul">
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Guaranty &Service</a>
                    </li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Tracking Order</a>
                    </li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Monthly Payments</a>
                    </li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Payments</a>
                    </li>
                </ul>
                <div class="footer-product-list footer-pay-mtd-wrap">
                    <img class="pay-mtd-img" src="{{ asset('img/cards.png') }}" alt="payment methods">
                </div>
            </div>

            <div class="footer-nav-wrap-middle-2">
                <h1 class="footer-title-middle-2">Business</h1>
                <ul class="footer-product-ul">
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Become a Seller</a>
                    </li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Are you a Supplier ?</a></li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Make Plans</a></li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Get Money</a>
                    </li>
                </ul>
            </div>

            <div class="footer-nav-wrap-right">
                <h1 class="footer-title-right">Help me</h1>
                <ul class="footer-product-ul">
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Your Account</a></li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Your Orders</a>
                    </li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Shipping Rates & Policies</a>
                    </li>
                    <li class="footer-product-list">
                        <a class="footer-product-link" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Footer Product -->
@endsection


@section('extra-js')
    
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.images-thumb-wrapper');

            images.forEach((element) => element.addEventListener('click', thumbnailClick));

            function thumbnailClick(e) {

                currentImage.classList.remove('active');

                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })

                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }

        })();
    </script>
@endsection