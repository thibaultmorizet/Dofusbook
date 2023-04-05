<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display stuffs list
     */
    public function show(): View
    {
        return view('dashboard');
    }
}

