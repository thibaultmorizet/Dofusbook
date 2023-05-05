<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Stuffs;
use Illuminate\View\View;

class StuffController extends Controller
{

    public function createStuffModal()
    {
        return view('create-stuff-modal');
    }

    public function show(Stuffs $stuff)
    {
        $stuff->class_slug = Classes::query()->findOrFail($stuff->class_id)->class_slug;
        session()->put('stuff', $stuff);
        return view('stuff.show', ['stuff' => $stuff]);
    }
}