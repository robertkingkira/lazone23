@extends('pages.layout')

@section('content')
    
{{-- <div class="container-alert-product">
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

    <div class="search-container">
        
       <h1 class="search-results-heading">Search Results</h1>
        <p class="search-results-info">{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</p>

        <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Details</th>
                <th>Description</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)    
                    <tr>
                        <th><a class="table-product-link-th" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></th>
                        <td>{{ $product->details }}</td> --}}
                        {{-- Deci asa se pune limita de caractere acum in laravel 6 --}}
                        {{-- <td>{{ Str::limit($product->description, 80) }}</td>
                        <td>{{ $product->presentPrice() }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          <hr class="line-title-products">   
        {{ $products->appends(request()->input())->links() }}
    </div> --}} <!--  end search container  -->

    
{{-- <hr class="product-page-bottom-line"> --}}

@endsection


@section('extra-js')
    
   
@endsection