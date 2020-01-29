@extends('layouts.app')

@section('content')

    <section id="products" class="featured-section">
        <div class="container-products">
        <h1 class="text-products">{{ $headingProducts }}</h1>
            <hr class="line-title-products">
            <div class="products text-products">
                @foreach ($products as $product)
                <div class="product">
                    <a class="product-img-wrap" href="{{ route('shop.show', $product->slug) }}">
                        <img class="product-img" src="{{ asset('img/products/'.$product->slug.'.png') }}" alt="Product"></a>

                    <a class="product-link" href="{{ route('shop.show', $product->slug) }}"><span class="product-name">{{ $product->name }}</span></a>

                    <p class="product-description">{{ $product->details }}</p>

                    <div class="product-price">{{ $product->presentPrice() }}</div>

                    <div class="product-price2"><del>{{ $product->presentOldPrice( )}}</del></div>

                    <a class="product-more-btn" href="{{ route('shop.show', $product->slug) }}">More</a>
                </div>
                @endforeach
                
            </div> <!-- End Products -->
            
            <div class="text-product button-container">
                <a href="{{ route('shop.index') }}" class="button-more">View more products</a>
            </div>
            <hr class="line-title-products">
        </div> <!-- END Container Products -->
    </section> <!-- END Featured Section Products -->



    <section id="contact" class="contact-section">
        <div class="contact-wrapper">
        <div class="container-contact">
            <h1 class="text-contact">Get in touch</h1>
            <p class="description-contact">Send us an email and tell us how can we help you. <br>
                Talk to you soonnnner.
            </p>
        </div>
        <div class="contact-container-right">
            <div class="contact-wrapper-right">
                <header class="header-form">
                    <h2 class="form-heading">Contact us</h2>
                </header>
                <form class="form-contact-container"action="">
                    <div class="name-form-wrapper">
                        <input class="input-name" type="text" placeholder="Name" name="name" required>
                        <span class="focus-border-name"></span>
                    </div>

                    <div class="email-form-wrapper">
                        <input class="input-email" type="email" placeholder="Email" required name="email">
                        <span class="focus-border-email"></span>
                    </div>
                    <div class="text-form-wrapper">
                        <textarea id="text-area-input"    class="input-text" required name="text" placeholder="Message" minlength="10" maxlength="600"></textarea>
                        <span class="focus-border-text"></span>
                    </div>
                    <button class="form-button" type="submit">Send</button>
                </form> <!-- end Contact Form -->
            </div> <!-- end Contact Wrapper -->
        </div> <!-- end Contact Container -->
    </div>
    </section> <!-- End Contact Section -->

@endsection
