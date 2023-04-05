<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\View\View;

class StuffController extends Controller
{
    /**
     * Display the creation stuff form.
     */
    public function create()
    {
        return view('stuff.create');
    }

    public function createStuffModal()
    {
        return view('create-stuff-modal');
    }

    public function show(Stuff $stuff)
    {
        return view('stuff.show', ['stuff' => $stuff]);
    }
}