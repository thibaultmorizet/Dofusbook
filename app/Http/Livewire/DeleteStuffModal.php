<?php

namespace App\Http\Livewire;

use App\Models\Stuffs;
use LivewireUI\Modal\ModalComponent;

class DeleteStuffModal extends ModalComponent
{
    public ?int $stuff_id = null;

    public function delete()
    {
        try {
            if (!is_null($this->stuff_id)) {
                $stuffToDelete = Stuffs::query()->findOrFail($this->stuff_id);
                $stuffToDelete->delete();
            }
            return redirect()->route('dashboard');
        } catch (\Exception $exception) {
            error_log($exception);
        }
    }

    public function render()
    {
        return view('livewire.delete-stuff-modal');
    }
}
