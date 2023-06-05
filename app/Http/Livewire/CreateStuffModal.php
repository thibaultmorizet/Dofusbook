<?php

namespace App\Http\Livewire;

use App\Http\Trait\SpellTrait;
use App\Http\Trait\StuffTrait;
use App\Models\Classes;
use App\Models\Stuffs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use LivewireUI\Modal\ModalComponent;

class CreateStuffModal extends ModalComponent
{
    use SpellTrait;

    public int $stuff_id;

    public Collection $classes;
    public int $selectedClass = 1;
    public int $character_level = 200;
    public string $stuff_title = "";
    public string $gender = "male";
    public bool $is_private_stuff = true;
    public bool $is_updating_stuff = false;

    public Stuffs $stuff;

    public function mount()
    {
        $this->stuff = Stuffs::query()->where("id", "=", $this->stuff_id)->get()->first();
        $this->selectedClass = $this->stuff->class_id;
        $this->character_level = $this->stuff->character_level;
        $this->stuff_title = $this->stuff->title;
        $this->gender = $this->stuff->gender;
        $this->is_private_stuff = $this->stuff->is_private;
    }


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
            if ($this->stuff_title == "") {
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
                session()->put('stuff', $newStuff);
                $this->loadEffectsByStuff($newStuff);
                return Redirect::route('stuff.show', $newStuff->id);
            }
            return false;
        }
        if (!is_null($this->stuff_id)) {
            $this->stuff = Stuffs::query()->where("id", "=", $this->stuff_id)->get()->first();
            $this->stuff->title = $this->stuff_title;
            $this->stuff->character_level = $this->character_level;
            $this->stuff->gender = $this->gender;
            $this->stuff->is_private = $this->is_private_stuff;
            $this->stuff->class_id = $this->selectedClass === 0 ? 1 : $this->selectedClass;
            if ($this->stuff->save()) {
                session()->put('stuff', $this->stuff);
                $this->loadEffectsByStuff($this->stuff);
                return Redirect::route('stuff.show', $this->stuff->id);
            }
        }
        return false;
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
