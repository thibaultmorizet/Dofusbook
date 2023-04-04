<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StuffController extends Controller
{
    /**
     * Display the creation stuff form.
     */
    public function create()
    {
        return view('stuff.create-stuff');
    }
}