<?php

namespace App\Http\Controllers;

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

