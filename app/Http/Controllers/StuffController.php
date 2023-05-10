<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Stuffs;
use Illuminate\View\View;

class StuffController extends Controller
{

    public function show(int $stuffId)
    {
        $stuff = Stuffs::where("id", $stuffId)->with(['class'])->get()->first();
        session()->put('stuff', $stuff);
        return view('stuff.show', ['stuff' => $stuff]);
    }
}
