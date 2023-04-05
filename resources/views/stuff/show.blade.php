<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $stuff->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pb-3">
                    <livewire:stuff.create :stuff_id="$stuff->id"
                                           :stuff_title="$stuff->title"
                                           :character_level="$stuff->character_level"
                                           :is_exo_pa="$stuff->is_exo_pa"
                                           :is_exo_pm="$stuff->is_exo_pm"
                                           :is_exo_po="$stuff->is_exo_po"
                                           :boost_vitality="$stuff->vitality_boost"
                                           :boost_wisdom="$stuff->wisdom_boost"
                                           :boost_strength="$stuff->strength_boost"
                                           :boost_intel="$stuff->intel_boost"
                                           :boost_luck="$stuff->luck_boost"
                                           :boost_agility="$stuff->agility_boost"
                                           :parchment_vitality="$stuff->vitality_parchment"
                                           :parchment_wisdom="$stuff->wisdom_parchment"
                                           :parchment_strength="$stuff->strength_parchment"
                                           :parchment_intel="$stuff->intel_parchment"
                                           :parchment_luck="$stuff->luck_parchment"
                                           :parchment_agility="$stuff->agility_parchment"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
