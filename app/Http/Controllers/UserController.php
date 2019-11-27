<?php

namespace App\Http\Controllers;

use App\Locale;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        $locales = Locale::All();
        return view('pages.user', compact('users', 'locales'));
    }
}
