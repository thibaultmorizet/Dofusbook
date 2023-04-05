<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class CreateStuffModal extends ModalComponent
{
    public Collection $classes;
    public int $selectedClass = 1;
    public int $character_level = 200;
    public string $stuff_title = "";
    public string $gender = "male";

    public function updateLevel(int $level)
    {
        $this->character_level = $level;
    }

    public function updateTitle(string $title)
    {
        $this->stuff_title = $title;
    }

    public function render()
    {
        $this->classes = Classe::all();
        return view('livewire.create-stuff-modal', ['classes' => $this->classes, 'gender' => $this->gender]);
    }
}
