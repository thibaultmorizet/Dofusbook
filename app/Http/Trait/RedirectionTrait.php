<?php

namespace App\Http\Trait;

trait RedirectionTrait
{
    public function goToSet(string $setName)
    {
        return redirect()->route('sets-encyclopedia', ['setName' => $setName]);
    }

    public function goToSpellsPage()
    {
        return redirect()->route('spells-details');
    }

    public function openItemsEncyclopediaWithFilters(string $equipementType, int $maxLvl)
    {
        return redirect()->route('items-encyclopedia', [
            'equipementType' => $equipementType,
            'maxLvl' => $maxLvl]);
    }

    public function goToStuff(int $stuffId)
    {
        return redirect()->route('stuff.show', $stuffId);
    }

}