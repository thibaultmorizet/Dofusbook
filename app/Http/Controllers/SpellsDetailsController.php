<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SpellsDetailsController extends Controller
{
    /**
     * Display spell list
     */
    public function show(): View
    {
        return view('spells-details');
    }
}