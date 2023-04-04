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
        return view('livewire.dashboard');
    }

    public function goToStuffEdit(int $stuff_id)
    {
        dd(1);
        return redirect()->route('/stuff/show/' + $stuff_id);
    }

}
