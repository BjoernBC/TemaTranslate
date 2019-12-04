<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductTranslation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index()
    {
        return view(
            'pages.translate.index',
            [
                'products' => Product::paginate(1),
            ]
        );
    }

    public function create()
    {
        return view('pages.translate.create');
    }

    public function store(Request $request)
    {
        $maxTitle = 32;
        $maxContains = 64;
        $maxDescList = 128;
        $maxDesc = 256;

        $request->validate(
            [
                'product_sku' => 'required',
                'country_code' => 'required',
                'title' => "required|max:{$maxTitle}",
                'package_contains' => "max:{$maxContains}",
                'description_list' => "max:{$maxDescList}",
                'description' => "required|max:{$maxDesc}",
            ]
        );
        $product = Product::where('sku', $request['product_sku'])->firstOrFail();

        $productTranslation = new ProductTranslation(
            [
                'product_sku' => $request['product_sku'],
                'country_code' => $request['country_code'],
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
}
