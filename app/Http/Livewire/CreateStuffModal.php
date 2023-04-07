<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Stuff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use LivewireUI\Modal\ModalComponent;

class CreateStuffModal extends ModalComponent
{
    public Collection $classes;
    public int $selectedClass = 1;
    public int $character_level = 200;
    public string $stuff_title = "";
    public string $gender = "male";
    public bool $is_confidential_stuff = true;

    public function updateLevel(int $level)
    {
        $this->character_level = $level;
    }

    public function updateTitle(string $title)
    {
        $this->stuff_title = $title;
    }

    public function updateSelectedGender(string $gender)
    {
        $this->gender = $gender;
    }

    public function updateSelectedClass(int $class_id)
    {
        $this->selectedClass = $class_id;
    }

    public function updateIsConfidentialStuff(bool $is_confidential_stuff)
    {
        $this->is_confidential_stuff = $is_confidential_stuff;
    }

    public function create()
    {
        if ($this->stuff_title == "" || is_null($this->stuff_title)) {
            return false;
        }
        $newStuff = new Stuff();
        $newStuff->user_id = Auth::user()->id;
        $newStuff->class_id = $this->selectedClass === 0 ? 1 : $this->selectedClass;
        $newStuff->is_private = $this->is_confidential_stuff;
        $newStuff->character_level = $this->character_level;
        $newStuff->gender = $this->gender;
        $newStuff->title = $this->stuff_title;
        if ($newStuff->save()) {
            return Redirect::route('stuff.show', $newStuff->id);
        }
    }

    public function render()
    {
        $this->classes = Classe::all();
        return view('livewire.create-stuff-modal', ['classes' => $this->classes, 'gender' => $this->gender]);
    }
}
