<?php

namespace App\Http\Controllers;

use App\Models\Stuffs;
use Illuminate\View\View;

class StuffController extends Controller
{

    public function show(int $stuffId): View
    {
        $stuff = Stuffs::query()->where("id", $stuffId)->with(['class'])->get()->first();
        session()->put('stuff', $stuff);
        return view('stuff.show', ['stuff' => $stuff]);
    }
}
