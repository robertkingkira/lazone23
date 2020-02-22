<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $pagination = 8;
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
        // $headingProducts = 'Best selling products';
        /* Asa iei din baza de date 12 produse la intamplare Random */
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        /* Asa se afiseaza mai multe variabile deschizi [] si pui => intre ele */
        // return view('pages.products')->with([
        //     'headingProducts'=> $headingProducts,
        //     'products'=> $products,
        // ]);
        return view('pages.shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

    /**
     *  Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $product = Product::where('slug', $slug)->firstOrFail();

        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        return view('pages.product')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
            ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');


            /* Nu mai avem nevoie de codul asta pentru ca am instalat "nicolaslopezj/searchable" il gasesti in product.php */

        /* $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('details', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->paginate(10); */

        $products = Product::search($query, 1, true)->paginate(10);
                            
        return view('pages.search-results')->with('products', $products);
    }

    public function searchAlgolia(Request $request)
    {         
        return view('pages.search-results-algolia');
    }
}