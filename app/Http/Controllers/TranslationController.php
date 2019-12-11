<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TranslationController extends Controller
{
    public function index()
    {
        // $sql = 'SELECT * ';
        // // $sql .= 'FROM product_translations AS p ';
        // $sql .= 'FROM products AS p ';
        // // $sql .= 'FULL OUTER JOIN product_translations AS t ';
        // // $sql .= 'ON p.sku = t.product_sku ';
        // $sql .= 'WHERE :user_lang ';
        // $sql .= 'NOT IN (SELECT t.country_code FROM product_translations AS t) ';
        // $sql .= 'ORDER BY p.is_priority DESC';

        // $sql = 'SELECT * FROM products AS p ';
        // $sql .= 'WHERE t.country_code in (dk) ';
        // $sql .= 'RIGHT JOIN product_translations AS t ON p.sku = t.product_sku';
        // $sql .= 'UNION ALL ';
        // $sql .= 'RIGHT JOIN product_translations AS t ON p.sku = t.product.sku ';
        // $sql .= 'WHERE `se` ';
        // $sql .= 'NOT IN (';
        // $sql .= 'SELECT t.country_code ';
        // $sql .= 'FROM product_translations AS t)';

        $sql = "SELECT products.*, product_translations.* ";
        $sql .= "FROM products ";
        $sql .= "LEFT OUTER JOIN product_translations ";
        $sql .= "ON products.sku = product_translations.product_sku ";
        // $sql .= "WHERE country_code != :user_lang1 ";
        $sql .= "WHERE :user_lang1 NOT IN (SELECT DISTINCT country_code FROM product_translations) ";
        $sql .= "UNION ";
        $sql .= "SELECT products.*, product_translations.* ";
        $sql .= "FROM products ";
        $sql .= "RIGHT OUTER JOIN product_translations ";
        $sql .= "ON products.sku = product_translations.product_sku ";
        // $sql .= "WHERE country_code != :user_lang2";
        $sql .= "WHERE :user_lang2 NOT IN (SELECT DISTINCT country_code FROM product_translations)";

        // dd($sql);
        $user_lang = Auth::user()->country_code;
        $products = DB::select($sql, ['user_lang1' => $user_lang, 'user_lang2' => $user_lang]);
        // $product = Product::firstOrFail();

        $maxTitle = 32;
        $maxContains = 64;
        $maxDescList = 128;
        $maxDesc = 256;
        return view(
            'pages.translate.index',
            [
                // 'product' => $product,
                'products' => $products,
                'maxTitle' => $maxTitle,
                'maxContains' => $maxContains,
                'maxDescList' => $maxDescList,
                'maxDesc' => $maxDesc,
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
                'user_lang' => 'required',
                'email' => 'required',
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
                'country_code' => $request['user_lang'],
                'title' => $request['title'],
                'description' => $request['description'],
                'description_list' => $request['description_list'],
                'package_contains' => $request['package_contains'],
                'translated_by' => $request['email'],
            ]
        );
        $product->translations()->save($productTranslation);
        $product->save();
        return back();
    }
}
