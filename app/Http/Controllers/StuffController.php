<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Stuff;
use Illuminate\View\View;

class StuffController extends Controller
{

    public function createStuffModal()
    {
        return view('create-stuff-modal');
    }

    public function show(Stuff $stuff)
    {
        $stuff->class_slug = Classe::query()->findOrFail($stuff->class_id)->slug;
        session()->put('stuff', $stuff);
        return view('stuff.show', ['stuff' => $stuff]);
    }
}