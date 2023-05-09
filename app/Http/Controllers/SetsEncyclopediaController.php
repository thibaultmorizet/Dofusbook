<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SetsEncyclopediaController extends Controller
{
    /**
     * Display sets list
     */
    public function show(): View
    {
        return view('sets-encyclopedia');
    }
}