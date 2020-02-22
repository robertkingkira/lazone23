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

<div class="search-results-container-main">
    
    <div class="search-results-container-algolia">

        <div>
            <h2>Search</h2>
            <div id="search-box">
                <!-- SearchBox widget will appear here -->
            </div>
            
            <div id="stats-container"></div>

            <div class="spacer"></div>

            <h2>Categories</h2>
            <div id="refinement-list">
                <!-- RefinementList widget will appear here -->
            </div>
        </div>

        <div>
            <div id="hits">
                <!-- Hits widget will appear here -->
            </div>

            <div id="pagination">
                <!-- Pagination widget will appear here -->
            </div>
        </div>    
        
    </div> <!--  end search container  -->
</div>    <!-- end container main -->

    
<hr class="product-page-bottom-line">

@endsection

@section('extra-js')   
@endsection