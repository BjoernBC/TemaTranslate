<?php

namespace App\Http\Controllers;

use App\Locale;
use App\Product;
use App\ProductTranslation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $locales = Locale::all();
        return view('pages.product.index', compact('products', 'locales'));
    }

    public function store(Request $request)
    {
        $maxTitle = 32;
        $maxContains = 64;
        $maxDescList = 128;
        $maxDesc = 256;

        if (!$request['is_priority']) {
            $request['is_priority'] = 0;
        }

        // dd($request['is_priority']);
        $request->validate(
            [
                'title' => "required|max:{$maxTitle}",
                'SKU' => 'required|unique:products,id',
                'package_contains' => "max:{$maxContains}",
                'description_list' => "max:{$maxDescList}",
                'description' => "required|max:{$maxDesc}",
            ]
        );
        // dd($request);
        $product = new Product(
            [
                'sku' => $request['SKU'],
                'is_priority' => $request['is_priority'],
                'translation_level' => $request['translation_level'],
            ]
        );
        $productTranslation = new ProductTranslation(
            [
                'title' => $request['title'],
                'description' => $request['description'],
                'description_list' => $request['description_list'],
                'package_contains' => $request['package_contains'],
            ]
        );
        $product->translations()->save($productTranslation);
        $product->save();

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
