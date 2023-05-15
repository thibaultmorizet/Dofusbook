<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ItemsEncyclopediaController extends Controller
{
    /**
     * Display Equipements list
     */
    public function show(): View
    {
        return view('items-encyclopedia');
    }
}