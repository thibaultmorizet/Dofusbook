<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EncyclopediaController extends Controller
{
    /**
     * Display Equipements list
     */
    public function show(): View
    {
        return view('encyclopedia');
    }
}