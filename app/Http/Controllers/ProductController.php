<?php

namespace App\Http\Controllers;

use App\Locale;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $locales = Locale::all();
        return view('pages.product.index', compact('products', 'locales'));
    }

    public function store()
    {
        Product::create([
            'is_priority' => ucfirst(strtolower($request['name'])),
            'country_code' => strtolower($request['country_code']),
        ]);

        return back();
    }

    public function show($product_id)
    {
        return view('pages.product.show', [
            'product' => Product::find($product_id),
        ]);
    }

    public function export()
    {
        $products = Product::all();
        // Do something to make a JSON from this
        return;
    }
}
