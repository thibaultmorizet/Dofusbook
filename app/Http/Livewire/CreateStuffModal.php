<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Stuffs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use LivewireUI\Modal\ModalComponent;

class CreateStuffModal extends ModalComponent
{
    public ?int $stuff_id = null;

    public Collection $classes;
    public int $selectedClass = 1;
    public int $character_level = 200;
    public string $stuff_title = "";
    public string $gender = "male";
    public bool $is_private_stuff = true;
    public bool $is_updating_stuff = false;

    public Stuffs $stuff;

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

    public function updateIsConfidentialStuff(bool $is_private_stuff)
    {
        $this->is_private_stuff = $is_private_stuff;
    }

    public function create()
    {
        if (!$this->is_updating_stuff) {
            if ($this->stuff_title == "" || is_null($this->stuff_title)) {
                return false;
            }
            $newStuff = new Stuffs();
            $newStuff->user_id = Auth::user()->id;
            $newStuff->class_id = $this->selectedClass === 0 ? 1 : $this->selectedClass;
            $newStuff->is_private = $this->is_private_stuff;
            $newStuff->character_level = $this->character_level;
            $newStuff->gender = $this->gender;
            $newStuff->title = $this->stuff_title;
            if ($newStuff->save()) {
                return Redirect::route('stuff.show', $newStuff->id);
            }
            return false;
        }
        if (!is_null($this->stuff_id)) {
            $this->stuff = Stuffs::query()->findOrFail($this->stuff_id);
            $this->stuff->title = $this->stuff_title;
            $this->stuff->character_level = $this->character_level;
            $this->stuff->gender = $this->gender;
            $this->stuff->is_private = $this->is_private_stuff;
            $this->stuff->class_id = $this->selectedClass === 0 ? 1 : $this->selectedClass;
            if ($this->stuff->save()) {
                return Redirect::route('stuff.show', $this->stuff->id);
            }
        }
    }

    public function render()
    {
        $this->classes = Classes::all();
        return view('livewire.create-stuff-modal', [
            'classes' => $this->classes,
            'gender' => $this->gender,
            'character_level' => $this->character_level,
            'selectedClass' => $this->selectedClass,
            'stuff_title' => $this->stuff_title,
            'is_private_stuff' => $this->is_private_stuff
        ]);
    }
}
