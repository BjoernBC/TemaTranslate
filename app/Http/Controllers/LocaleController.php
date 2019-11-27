<?php

namespace App\Http\Controllers;

use App\Locale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function index()
    {
        $locales = Locale::all();
        return view('pages.locale', compact('locales'));
    }

    public function store(Request $request)
    {
        Locale::create([
            'name' => ucfirst(strtolower($request['name'])),
            'country_code' => strtolower($request['country_code']),
        ]);

        return back();
    }
}
