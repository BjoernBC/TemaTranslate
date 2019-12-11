<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\validator;
use App\Locale;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        $locales = Locale::All();
        return view('pages.user.index', compact('users', 'locales'));
    }

    public function setLocale(Request $request)
    {
        $user = Auth::user();
        $user->country_code = $request->country_code;
        $user->save();
        return back();
    }
}
