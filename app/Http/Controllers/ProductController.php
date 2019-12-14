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
                'SKU' => 'required|unique:products,sku',
                'title' => "required|max:{$maxTitle}",
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
        $product->save();
        $product->translations()->save($productTranslation);

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
        $fileName = 'exports/'.'export_'.date('Y-m-d_G'.'꞉'.'i').'.json';
        Storage::put($fileName, $json);
        return Storage::download($fileName);
    }

    public function import(Request $request)
    {
        $request->validate(
            [
                'import' => "required|file|mimetypes:text/plain",
            ],
            [
                'import.mimetypes' => 'File must be of type JSON',
            ],
        );

        function store($import)
        {
            // Validation? Currently returns error to user
            // if sku already exists in db
            $product = new Product(
                [
                    'sku' => $import['product_sku'],
                    // 'is_priority' => $product['is_priority'],
                    // 'translation_level' => $product['translation_level'],
                ]
            );
            $productTranslation = new ProductTranslation(
                [
                    'country_code' => $import['country_code'],
                    'title' => $import['title'],
                    'description' => $import['description'],
                    'description_list' => $import['description_list'],
                    'package_contains' => $import['package_contains'],
                ]
            );
            $product->save();
            $product->translations()->save($productTranslation);
            return;
        }

        $file = $request->file('import');
        $content = file_get_contents($file);
        $json = json_decode($content, true);
        foreach ($json as $import) {
            store($import);
        };

        // TODO: Implement logic to determine file type

        // function importJson($request)
        // {
        // }

        // function importXML($request)
        // {
        // }

        // switch ($request->fileType) {
        // case '1':
        //     importJson($request);
        //     break;

        // case '2':
        //     importXML($request);
        //     break;
        // }

        return redirect(route('product.index'));
    }
}
