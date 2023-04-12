<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EncyclopediaFilters extends Component
{
    public string $equipment_or_mounts = "equipment";
    public string $equipment_type = "Amulette";

    public function mount()
    {
        if (request()->equipment_or_mounts) {
            $this->equipment_or_mounts = request()->equipment_or_mounts;
        }
        if (request()->equipment_type) {
            $this->equipment_type = request()->equipment_type;
        }
    }


    public function updateEquipmentType(string $equipment_or_mounts, string $equipment_type)
    {
        if ($this->equipment_type != $equipment_type || $this->equipment_or_mounts != $equipment_or_mounts) {
            $this->equipment_type = $equipment_type;
            $this->equipment_or_mounts = $equipment_or_mounts;
//            return view('livewire.encyclopedia', ['equipment_type' => $this->equipment_type]);
            return redirect()->route('encyclopedia', ['equipment_type' => $this->equipment_type, 'equipment_or_mounts' => $this->equipment_or_mounts]);
        }
    }

}
