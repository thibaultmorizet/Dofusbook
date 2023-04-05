<?php

namespace App\Http\Livewire;

use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
    }

    public function render(): View
    {
        $stuffList = Stuff::query()
            ->select('*','stuffs.id as stuff_id')
            ->where("user_id", Auth::user()->id)
            ->join('classes', function ($join) {
                $join->on('stuffs.class_id', '=', 'classes.id');
            })->get();

        return view('livewire.dashboard', ['stuffList' => $stuffList]);
    }

    public function goToStuffEdit(int $stuff_id)
    {
        return redirect()->route('stuff.show', $stuff_id);
    }

}
