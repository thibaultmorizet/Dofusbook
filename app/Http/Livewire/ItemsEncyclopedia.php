<?php

namespace App\Http\Livewire;

use App\Models\Items;
use App\Models\Stuffs;
use App\Models\Types;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Livewire\WithPagination;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ItemsEncyclopedia extends Component
{
    use withPagination;

    public string $equipmentTypeName;
    public Types $equipmentType;
    public ?string $stuffName = null;
    public array $equipmentTranslate = [
        "Amulette" => "amulet_id",
        "Bouclier" => "shield_id",
        "Anneau" => ["ring_1_id", "ring_2_id"],
        "Ceinture" => "belt_id",
        "Bottes" => "boots_id",
        "Chapeau" => "hat_id",
        "Cape" => "cape_id",
        "Dofus" => [
            "dofus_1_id",
            "dofus_2_id",
            "dofus_3_id",
            "dofus_4_id",
            "dofus_5_id",
            "dofus_6_id"],
        "Familier" => "animal_id",
        "Montilier" => "animal_id",
        "Dragodinde" => "animal_id",
        "Muldo" => "animal_id",
        "Volkorne" => "animal_id",
        "Arc" => "weapon_id",
        "Baguette" => "weapon_id",
        "Bâton" => "weapon_id",
        "Épée" => "weapon_id",
        "Faux" => "weapon_id",
        "Hache" => "weapon_id",
        "Lance" => "weapon_id",
        "Marteau" => "weapon_id",
        "Pelle" => "weapon_id",
        "Pioche" => "weapon_id",
        "Trophée" => [
            "dofus_1_id",
            "dofus_2_id",
            "dofus_3_id",
            "dofus_4_id",
            "dofus_5_id",
            "dofus_6_id"],
        "Prysmaradite" => [
            "dofus_1_id",
            "dofus_2_id",
            "dofus_3_id",
            "dofus_4_id",
            "dofus_5_id",
            "dofus_6_id"],
    ];
    public array $itemFilters = [
        "Amulette" => "amulet",
        "Bouclier" => "shield",
        "Anneau" => "ring",
        "Ceinture" => "belt",
        "Bottes" => "boots",
        "Chapeau" => "hat",
        "Cape" => "cape",
        "Dofus" => "dofus",
        "Familier" => "animal",
        "Montilier" => "mount",
        "Dragodinde" => "dragodinde",
        "Muldo" => "muldo",
        "Volkorne" => "volkorne",
        "Arc" => "bow",
        "Baguette" => "rod",
        "Bâton" => "stick",
        "Épée" => "sword",
        "Faux" => "scythe",
        "Hache" => "axe",
        "Lance" => "spear",
        "Marteau" => "hammer",
        "Pelle" => "shovel",
        "Pioche" => "pickaxe",
        "Trophée" => "trophy",
        "Prysmaradite" => "prysmaradite",
    ];
    public array $primaryFilters = [
        [
            "characteristicsFiltersName" => "PA",
            "imageName" => "/img/icons/pa.png",
            "imageAlt" => "pa image",
            "span" => "PA",
        ],
        [
            "characteristicsFiltersName" => "PM",
            "imageName" => "/img/icons/pm.png",
            "imageAlt" => "pm image",
            "span" => "PM",
        ],
        [
            "characteristicsFiltersName" => "Portée",
            "imageName" => "/img/icons/po.png",
            "imageAlt" => "po image",
            "span" => "PO",
        ],
        [
            "characteristicsFiltersName" => "Puissance",
            "imageName" => "/img/icons/power.png",
            "imageAlt" => "power image",
            "span" => "Puissance",
        ],
        [
            "characteristicsFiltersName" => "% Critique",
            "imageName" => "/img/icons/critic.png",
            "imageAlt" => "critic image",
            "span" => "% Critique",
        ],
        [
            "characteristicsFiltersName" => "Vitalité",
            "imageName" => "/img/icons/vitality.png",
            "imageAlt" => "vitality image",
            "span" => "Vitalité",
        ],
        [
            "characteristicsFiltersName" => "Agilité",
            "imageName" => "/img/icons/agility.png",
            "imageAlt" => "agility image",
            "span" => "Agilité",
        ],
        [
            "characteristicsFiltersName" => "Chance",
            "imageName" => "/img/icons/luck.png",
            "imageAlt" => "luck image",
            "span" => "Chance",
        ],
        [
            "characteristicsFiltersName" => "Force",
            "imageName" => "/img/icons/strength.png",
            "imageAlt" => "strength image",
            "span" => "Force",
        ],
        [
            "characteristicsFiltersName" => "Intelligence",
            "imageName" => "/img/icons/intel.png",
            "imageAlt" => "intel image",
            "span" => "Intelligence",
        ],
        [
            "characteristicsFiltersName" => "Sagesse",
            "imageName" => "/img/icons/wisdom.png",
            "imageAlt" => "wisdom image",
            "span" => "Sagesse",
        ],
    ];
    public array $secondaryFilters = [
        [
            "characteristicsFiltersName" => "Retrait PA",
            "imageName" => "/img/icons/avoid_pa.png",
            "imageAlt" => "avoid_pa image",
            "span" => "Retrait PA",
        ],
        [
            "characteristicsFiltersName" => "Esquive PA",
            "imageName" => "/img/icons/pa_recession.png",
            "imageAlt" => "pa_recession image",
            "span" => "Esquive PA",
        ],
        [
            "characteristicsFiltersName" => "Retrait PM",
            "imageName" => "/img/icons/avoid_pm.png",
            "imageAlt" => "avoid_pm image",
            "span" => "Retrait PM",
        ],
        [
            "characteristicsFiltersName" => "Esquive PM",
            "imageName" => "/img/icons/pm_recession.png",
            "imageAlt" => "pm_recession image",
            "span" => "Esquive PM",
        ],
        [
            "characteristicsFiltersName" => "Soins",
            "imageName" => "/img/icons/health.png",
            "imageAlt" => "health image",
            "span" => "Soins",
        ],
        [
            "characteristicsFiltersName" => "Tacle",
            "imageName" => "/img/icons/tackle.png",
            "imageAlt" => "tackle image",
            "span" => "Tacle",
        ],
        [
            "characteristicsFiltersName" => "Fuite",
            "imageName" => "/img/icons/leak.png",
            "imageAlt" => "leak image",
            "span" => "Fuite",
        ],
        [
            "characteristicsFiltersName" => "Initiative",
            "imageName" => "/img/icons/initiative.png",
            "imageAlt" => "initiative image",
            "span" => "Initiative",
        ],
        [
            "characteristicsFiltersName" => "Invocation",
            "imageName" => "/img/icons/invocation.png",
            "imageAlt" => "invocation image",
            "span" => "Invocation",
        ],
        [
            "characteristicsFiltersName" => "Prospection",
            "imageName" => "/img/icons/prospection.png",
            "imageAlt" => "prospection image",
            "span" => "Prospection",
        ],
        [
            "characteristicsFiltersName" => "Pods",
            "imageName" => "/img/icons/pods.png",
            "imageAlt" => "pods image",
            "span" => "Pods",
        ],
    ];
    public array $dommagesFilters = [
        [
            "characteristicsFiltersName" => "Dommages",
            "imageName" => "/img/icons/do.png",
            "imageAlt" => "do image",
            "span" => "Dommages",
        ],
        [
            "characteristicsFiltersName" => "Dommages Critiques",
            "imageName" => "/img/icons/do_critique.png",
            "imageAlt" => "do_critique image",
            "span" => "Dommages Critiques",
        ],
        [
            "characteristicsFiltersName" => "Renvoie dommages",
            "imageName" => "/img/icons/return_attack.png",
            "imageAlt" => "return_attack image",
            "span" => "Renvoie dommages",
        ],
        [
            "characteristicsFiltersName" => "Dommages Pièges",
            "imageName" => "/img/icons/do_tricks.png",
            "imageAlt" => "do_tricks image",
            "span" => "Dommages Pièges",
        ],
        [
            "characteristicsFiltersName" => "Puissance (pièges)",
            "imageName" => "/img/icons/trick_power.png",
            "imageAlt" => "trick_power image",
            "span" => "Puissance (pièges)",
        ],
        [],
        [
            "characteristicsFiltersName" => "Dommages Neutre",
            "imageName" => "/img/icons/do_neutral.png",
            "imageAlt" => "do_neutral image",
            "span" => "Dommages Neutre",
        ],
        [
            "characteristicsFiltersName" => "Dommages Terre",
            "imageName" => "/img/icons/do_earth.png",
            "imageAlt" => "do_earth image",
            "span" => "Dommages Terre",
        ],
        [
            "characteristicsFiltersName" => "Dommages Feu",
            "imageName" => "/img/icons/do_fire.png",
            "imageAlt" => "do_fire image",
            "span" => "Dommages Feu",
        ],
        [
            "characteristicsFiltersName" => "Dommages Eau",
            "imageName" => "/img/icons/do_water.png",
            "imageAlt" => "do_water image",
            "span" => "Dommages Eau",
        ],
        [
            "characteristicsFiltersName" => "Dommages Air",
            "imageName" => "/img/icons/do_air.png",
            "imageAlt" => "do_air image",
            "span" => "Dommages Air",
        ],
        [],
        [
            "characteristicsFiltersName" => "% Dommages aux sorts",
            "imageName" => "/img/icons/do_spell.png",
            "imageAlt" => "do_spell image",
            "span" => "% Dommages sorts",
        ],
        [
            "characteristicsFiltersName" => "% Dommages d\'armes",
            "imageName" => "/img/icons/do_weapon.png",
            "imageAlt" => "do_weapon image",
            "span" => "% Dommages d'armes",
        ],
        [
            "characteristicsFiltersName" => "Dommages Poussée",
            "imageName" => "/img/icons/do_push.png",
            "imageAlt" => "do_push image",
            "span" => "Dommages Poussée",
        ],
        [
            "characteristicsFiltersName" => "% Dommages distance",
            "imageName" => "/img/icons/do_distance.png",
            "imageAlt" => "do_distance image",
            "span" => "% Dommages distance",
        ],
        [
            "characteristicsFiltersName" => "% Dommages mêlée",
            "imageName" => "/img/icons/do_melee.png",
            "imageAlt" => "do_melee image",
            "span" => "% Dommages mêlée",
        ],
    ];
    public array $resistancesFilters = [
        [
            "characteristicsFiltersName" => "Résistances Neutre",
            "imageName" => "/img/icons/neutral_res.png",
            "imageAlt" => "neutral_res image",
            "span" => "Résistances Neutre",
        ],
        [
            "characteristicsFiltersName" => "% Résistances Neutre",
            "imageName" => "/img/icons/neutral_res.png",
            "imageAlt" => "neutral_res image",
            "span" => "% Résistances Neutre",
        ],
        [
            "characteristicsFiltersName" => "Résistances Terre",
            "imageName" => "/img/icons/earth_res.png",
            "imageAlt" => "earth_res image",
            "span" => "Résistances Terre",
        ],
        [
            "characteristicsFiltersName" => "% Résistances Terre",
            "imageName" => "/img/icons/earth_res.png",
            "imageAlt" => "earth_res image",
            "span" => "% Résistances Terre",
        ],
        [
            "characteristicsFiltersName" => "Résistances Feu",
            "imageName" => "/img/icons/fire_res.png",
            "imageAlt" => "fire_res image",
            "span" => "Résistances Feu",
        ],
        [],
        [
            "characteristicsFiltersName" => "Résistances Eau",
            "imageName" => "/img/icons/water_res.png",
            "imageAlt" => "water_res image",
            "span" => "Résistances Eau",
        ],
        [
            "characteristicsFiltersName" => "% Résistances Eau",
            "imageName" => "/img/icons/water_res.png",
            "imageAlt" => "water_res image",
            "span" => "% Résistances Eau",
        ],
        [
            "characteristicsFiltersName" => "Résistances Air",
            "imageName" => "/img/icons/air_res.png",
            "imageAlt" => "air_res image",
            "span" => "Résistances Air",
        ],
        [
            "characteristicsFiltersName" => "% Résistances Air",
            "imageName" => "/img/icons/air_res.png",
            "imageAlt" => "air_res image",
            "span" => "% Résistances Air",
        ],
        [
            "characteristicsFiltersName" => "% Résistances Feu",
            "imageName" => "/img/icons/fire_res.png",
            "imageAlt" => "fire_res image",
            "span" => "% Résistances Feu",
        ],
        [],
        [
            "characteristicsFiltersName" => "Résistances Critiques",
            "imageName" => "/img/icons/critique_res.png",
            "imageAlt" => "critique_res image",
            "span" => "Résistances Critiques",
        ],
        [
            "characteristicsFiltersName" => "Résistances Poussée",
            "imageName" => "/img/icons/push_res.png",
            "imageAlt" => "push_res image",
            "span" => "Résistances Poussée",
        ],
        [
            "characteristicsFiltersName" => "% Résistances aux armes",
            "imageName" => "/img/icons/weapon_res.png",
            "imageAlt" => "weapon_res image",
            "span" => "% Résistances aux armes",
        ],
        [
            "characteristicsFiltersName" => "% Résistances distance",
            "imageName" => "/img/icons/distance_res.png",
            "imageAlt" => "distance_res image",
            "span" => "% Résistances distance",
        ],
        [
            "characteristicsFiltersName" => "% Résistances mêlée",
            "imageName" => "/img/icons/melee_res.png",
            "imageAlt" => "melee_res image",
            "span" => "% Résistances mêlée",
        ],
    ];
    public Collection $items;
    public Collection $itemsToView;
    public int $itemsLoaded = 24;
    public int $minLvl = 1;
    public int $maxLvl = 200;
    public int $totalItemsNumber;
    public bool $returnReplacementModal = false;
    public array $itemsToReplace = [];
    public array $characteristicsFilters = [];
    public bool $primaryFilterTabIsOpen = false;
    public bool $secondaryFilterTabIsOpen = false;
    public bool $dommagesFilterTabIsOpen = false;
    public bool $resistancesFilterTabIsOpen = false;
    public Stuffs $stuff;
    public Items $lastItemAdded;
    public bool $isOpenNotification = false;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mount()
    {
        $this->equipmentTypeName = request()->query->get("equipementType") ?? "Amulette";
        $this->stuffName = request()->query->get("itemName") ?? null;
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->maxLvl = request()->query->get("maxLvl") ?? 200;
        $this->stuff = session()->get('stuff');
        $this->itemsToView = $this->updateItems();
    }

    public function updateEquipmentType(string $equipmentTypeName)
    {
        if ($this->equipmentTypeName != $equipmentTypeName) {
            $this->equipmentTypeName = $equipmentTypeName;
            $newType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
            if ($newType !== false) {
                $this->equipmentType = $newType;
                $this->itemsToView = $this->updateItems();
            }
        }
    }

    public function updateItemsToLoad()
    {
        $this->items = $this->updateItemsToView();
        $this->itemsLoaded += 24;
        $this->itemsToView = $this->itemsToView->merge($this->items);
        $this->totalItemsNumber = $this->countItems();
    }

    private function countItems(): int
    {
        $result = Items::query()
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%$this->stuffName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl);
        foreach ($this->characteristicsFilters as $aCharacteristicFilter) {
            $result->whereHas('effects', function (Builder $query) use ($aCharacteristicFilter) {
                $query
                    ->where('name', '=', $aCharacteristicFilter)
                    ->where(function ($q) {
                        $q->where('int_maximum', '>=', '1')
                            ->orWhere('int_minimum', '>=', '1');
                    });
            });
        }
        return $result->count();
    }

    private function updateItemsToView(): Collection|array
    {
        $result = Items::query()
            ->with(['type', 'effects', 'conditions'])
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%$this->stuffName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->offset($this->itemsLoaded);
        foreach ($this->characteristicsFilters as $aCharacteristicFilter) {
            $result->whereHas('effects', function (Builder $query) use ($aCharacteristicFilter) {
                $query
                    ->where('name', '=', $aCharacteristicFilter)
                    ->where(function ($q) {
                        $q->where('int_maximum', '>=', '1')
                            ->orWhere('int_minimum', '>=', '1');
                    });
            });
        }

        return $result->get();

    }

    private function updateItems(): Collection|array
    {
        $this->isReturnReplacementModal();

        $this->itemsLoaded = 24;
        $this->totalItemsNumber = $this->countItems();
        $result = Items::query()
            ->with(['type', 'effects', 'conditions'])
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%$this->stuffName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24);
        foreach ($this->characteristicsFilters as $aCharacteristicFilter) {
            $result->whereHas('effects', function (Builder $query) use ($aCharacteristicFilter) {
                $query
                    ->where('name', '=', $aCharacteristicFilter)
                    ->where(function ($q) {
                        $q->where('int_maximum', '>=', '1')
                            ->orWhere('int_minimum', '>=', '1');
                    });
            });
        }

        return $result->get();
    }

    public function updateStuffName(string $stuffName)
    {
        $this->stuffName = $stuffName;
        $this->itemsToView = $this->updateItems();
    }

    public function deleteFilters()
    {
        $this->minLvl = 1;
        $this->maxLvl = 200;
        $this->equipmentTypeName = "Amulette";
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->stuffName = null;
        $this->characteristicsFilters = [];
        $this->itemsToView = $this->updateItems();
    }

    public function updateMinLvl(int $minLvl)
    {
        $this->minLvl = $minLvl;
        $this->itemsToView = $this->updateItems();
    }

    public function updateMaxLvl(int $maxLvl)
    {
        $this->maxLvl = $maxLvl;
        $this->itemsToView = $this->updateItems();
    }


    public function addItemToStuff(int $item_id)
    {
        if (!is_null($this->stuff)) {
            $databaseEquipmentName = $this->equipmentTranslate[$this->equipmentTypeName];
            if (!is_array($databaseEquipmentName)) {
                $this->stuff->{$databaseEquipmentName} = $item_id;
                $this->stuff->save();
                $this->lastItemAdded = Items::query()->where("id", "=", $item_id)->get()->first();
                return redirect()->route('stuff.show', $this->stuff->id);
            }

            foreach ($databaseEquipmentName as $itemEmplacement) {
                if (is_null($this->stuff->{$itemEmplacement})) {
                    $this->stuff->{$itemEmplacement} = $item_id;
                    $this->stuff->save();
                    $this->lastItemAdded = Items::query()->where("id", "=", $item_id)->get()->first();
                    $this->isOpenNotification = true;
                    $this->isReturnReplacementModal();
                    return true;
                }
            }
        }
        return false;
    }

    public function goToSet(string $setName)
    {
        return redirect()->route('sets-encyclopedia', ['setName' => $setName]);
    }

    public function goToStuff(int $stuffId)
    {
        return redirect()->route('stuff.show', $stuffId);
    }


    private function isReturnReplacementModal(): void
    {
        $this->itemsToReplace = [];
        if (!is_null($this->stuff)) {
            $databaseEquipmentName = $this->equipmentTranslate[$this->equipmentTypeName];
            if (is_array($databaseEquipmentName)) {
                foreach ($databaseEquipmentName as $itemEmplacement) {
                    if (is_null($this->stuff->{$itemEmplacement})) {
                        $this->returnReplacementModal = false;
                        $this->itemsToReplace = [];
                        return;
                    }
                }
                foreach ($databaseEquipmentName as $itemEmplacement) {
                    $this->itemsToReplace[$itemEmplacement] = Items::query()->find($this->stuff->{$itemEmplacement});
                }
                $this->returnReplacementModal = true;
                return;

            }
        }
        $this->returnReplacementModal = false;
        $this->itemsToReplace = [];
    }

    public function updateCharacteristicsFilters(string $characteristicName)
    {

        if (($key = array_search($characteristicName, $this->characteristicsFilters)) === false) {
            $this->characteristicsFilters[] = $characteristicName;
        } else {
            unset($this->characteristicsFilters[$key]);
        }
        $this->itemsToView = $this->updateItems();
    }

    public function toggleFilterTab(string $tabName)
    {
        $this->{$tabName . "FilterTabIsOpen"} = !$this->{$tabName . "FilterTabIsOpen"};
    }

    public function render(): View
    {
        return view('livewire.items-encyclopedia');
    }

}
