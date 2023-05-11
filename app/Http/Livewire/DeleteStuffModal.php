<?php

namespace App\Http\Livewire;

use App\Models\Stuffs;
use Exception;
use LivewireUI\Modal\ModalComponent;

class DeleteStuffModal extends ModalComponent
{
    public ?int $stuff_id = null;

    public function delete()
    {
        try {
            if (!is_null($this->stuff_id)) {
                $stuffToDelete = Stuffs::query()->where("id", "=", $this->stuff_id)->first();
                $stuffToDelete->delete();
            }
            return redirect()->route('dashboard');
        } catch (Exception $exception) {
            error_log($exception);
            return false;
        }
    }

    public function render()
    {
        return view('livewire.delete-stuff-modal');
    }
}
