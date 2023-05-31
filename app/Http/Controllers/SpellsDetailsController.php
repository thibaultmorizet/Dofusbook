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
        if (is_null(session()->get('stuff'))) {
            return view('dashboard');
        }
        return view('spells-details');
    }
}