<?php

namespace App\Http\Controllers;

use App\Locale;
use App\Product;
use App\ProductTranslation;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $locales = Locale::all();
        return view('pages.product.index', compact('products', 'locales'));
    }

    public function create()
    {
        $products = Product::all();
        $locales = Locale::all();
        return view('pages.product.create', compact('products', 'locales'));
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

    public function update()
    {
        return;
    }

    public function export()
    {
        $translations = ProductTranslation::all();
        $json = $translations->toJson(JSON_PRETTY_PRINT);
        $filename = 'exports/'.'export_'.date('Y-m-d_G'.'꞉'.'i').'.json';
        Storage::put($filename, $json);
        return Storage::download($filename);
    }

    public function import(Request $request)
    {
        $request->validate(
            [
                'import' => "required",
            ]
        );

        $file = $request->file('import');
        $file->storeAs('imports', 'import-'.date('Y-m-d_G'.'꞉'.'i'));

        // Read file
        // Parse file
        // Store products in db

        return redirect('/');
    }
}
