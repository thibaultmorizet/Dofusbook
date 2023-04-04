<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display stuffs list
     */
    public function show(): View
    {
        $stuffList = Stuff::query()
            ->where("user_id", Auth::user()->id)
            ->join('classes', function ($join) {
                $join->on('stuffs.class_id', '=', 'classes.id');
            })->get();
        return view('dashboard', ['stuffList' => $stuffList]);
    }
}

