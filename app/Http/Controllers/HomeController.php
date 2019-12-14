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
        $sql = "select * from product_translations as a, product_translations as b ";
        $sql .= "where a.country_code = 'dk' ";
        $sql .= "and b.country_code = 'dk' ";
        $sql .= "and a.product_sku = b.product_sku ";
        $sql .= "and not exists (select title from product_translations ";
        $sql .=                 "where country_code = :user_lang ";
        $sql .=                 "and product_sku = a.product_sku) ";

        // dd($sql);
        $user_lang = Auth::user()->country_code;
        $products = DB::select($sql, ['user_lang' => $user_lang]);

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
