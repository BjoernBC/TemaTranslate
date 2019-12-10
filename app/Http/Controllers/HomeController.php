<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sql = "SELECT products.*, product_translations.* ";
        $sql .= "FROM products ";
        $sql .= "LEFT OUTER JOIN product_translations ";
        $sql .= "ON products.sku = product_translations.product_sku ";
        $sql .= "WHERE country_code != :user_lang1 ";
        $sql .= "UNION ";
        $sql .= "SELECT products.*, product_translations.* ";
        $sql .= "FROM products ";
        $sql .= "RIGHT OUTER JOIN product_translations ";
        $sql .= "ON products.sku = product_translations.product_sku ";
        $sql .= "WHERE country_code != :user_lang2";

        $user_lang = Auth::user()->country_code;
        $products = DB::select($sql, ['user_lang1' => $user_lang, 'user_lang2' => $user_lang]);

        // Sort users by avg/translation time
        $users = User::All();
        return view(
            'pages.home',
            [
                'users' => $users,
                'products' => $products,
            ]
        );
    }
}
