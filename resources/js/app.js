import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
if (window.location.pathname === "/stuff/create" || window.location.pathname.includes("/stuff/show/")) {
    const lvl_input = document.getElementsByName("character_level");

    const vitality_boost = document.getElementsByName("vitality_boost");
    const wisdom_boost = document.getElementsByName("wisdom_boost");
    const strength_boost = document.getElementsByName("strength_boost");
    const intel_boost = document.getElementsByName("intel_boost");
    const luck_boost = document.getElementsByName("luck_boost");
    const agility_boost = document.getElementsByName("agility_boost");

    const vitality_parchment = document.getElementsByName("vitality_parchment");
    const wisdom_parchment = document.getElementsByName("wisdom_parchment");
    const strength_parchment = document.getElementsByName("strength_parchment");
    const intel_parchment = document.getElementsByName("intel_parchment");
    const luck_parchment = document.getElementsByName("luck_parchment");
    const agility_parchment = document.getElementsByName("agility_parchment");
    lvl_input[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );

    lvl_input[0].addEventListener('keyup',
        function (event) {
            if (parseInt(lvl_input[0].value) > 200) {
                lvl_input[0].value = 200;
            }
            if (parseInt(lvl_input[0].value) < 1) {
                lvl_input[0].value = 1;
            }

            lvl_input[0].value = isNaN(parseInt(lvl_input[0].value)) || parseInt(lvl_input[0].value) === 0 ? 1 : parseInt(lvl_input[0].value)
        }
    );

    vitality_parchment[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );
    vitality_parchment[0].addEventListener('keyup',
        function (event) {
            if (parseInt(vitality_parchment[0].value) > 100) {
                vitality_parchment[0].value = 100;
            }
            if (parseInt(vitality_parchment[0].value) < 0) {
                vitality_parchment[0].value = 0;
            }

            vitality_parchment[0].value = isNaN(parseInt(vitality_parchment[0].value)) ? 0 : parseInt(vitality_parchment[0].value)
        }
    );
    wisdom_parchment[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );
    wisdom_parchment[0].addEventListener('keyup',
        function (event) {
            if (parseInt(wisdom_parchment[0].value) > 100) {
                wisdom_parchment[0].value = 100;
            }
            if (parseInt(wisdom_parchment[0].value) < 0) {
                wisdom_parchment[0].value = 0;
            }
            wisdom_parchment[0].value = isNaN(parseInt(wisdom_parchment[0].value)) ? 0 : parseInt(wisdom_parchment[0].value)
        }
    );

    strength_parchment[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );
    strength_parchment[0].addEventListener('keyup',
        function (event) {
            if (parseInt(strength_parchment[0].value) > 100) {
                strength_parchment[0].value = 100;
            }
            if (parseInt(strength_parchment[0].value) < 0) {
                strength_parchment[0].value = 0;
            }
            strength_parchment[0].value = isNaN(parseInt(strength_parchment[0].value)) ? 0 : parseInt(strength_parchment[0].value)
        }
    );

    intel_parchment[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );
    intel_parchment[0].addEventListener('keyup',
        function (event) {
            if (parseInt(intel_parchment[0].value) > 100) {
                intel_parchment[0].value = 100;
            }
            if (parseInt(intel_parchment[0].value) < 0) {
                intel_parchment[0].value = 0;
            }
            intel_parchment[0].value = isNaN(parseInt(intel_parchment[0].value)) ? 0 : parseInt(intel_parchment[0].value)
        }
    );

    luck_parchment[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );
    luck_parchment[0].addEventListener('keyup',
        function (event) {
            if (parseInt(luck_parchment[0].value) > 100) {
                luck_parchment[0].value = 100;
            }
            if (parseInt(luck_parchment[0].value) < 0) {
                luck_parchment[0].value = 0;
            }
            luck_parchment[0].value = isNaN(parseInt(luck_parchment[0].value)) ? 0 : parseInt(luck_parchment[0].value)
        }
    );

    agility_parchment[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );
    agility_parchment[0].addEventListener('keyup',
        function (event) {
            if (parseInt(agility_parchment[0].value) > 100) {
                agility_parchment[0].value = 100;
            }
            if (parseInt(agility_parchment[0].value) < 0) {
                agility_parchment[0].value = 0;
            }
            agility_parchment[0].value = isNaN(parseInt(agility_parchment[0].value)) ? 0 : parseInt(agility_parchment[0].value)
        }
    );


    vitality_boost[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );

    vitality_boost[0].addEventListener('keyup',
        function (event) {
            if (parseInt(vitality_boost[0].value) > 995) {
                vitality_boost[0].value = 995;
            }
            if (parseInt(vitality_boost[0].value) < 0) {
                vitality_boost[0].value = 0;
            }
            vitality_boost[0].value = isNaN(parseInt(vitality_boost[0].value)) ? 0 : parseInt(vitality_boost[0].value)
        }
    );

    wisdom_boost[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );

    wisdom_boost[0].addEventListener('keyup',
        function (event) {
            if (parseInt(wisdom_boost[0].value) > 331) {
                wisdom_boost[0].value = 331;
            }
            if (parseInt(wisdom_boost[0].value) < 0) {
                wisdom_boost[0].value = 0;
            }
            wisdom_boost[0].value = isNaN(parseInt(wisdom_boost[0].value)) ? 0 : parseInt(wisdom_boost[0].value)
        }
    );

    strength_boost[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );

    strength_boost[0].addEventListener('keyup',
        function (event) {
            if (parseInt(strength_boost[0].value) > 398) {
                strength_boost[0].value = 398;
            }
            if (parseInt(strength_boost[0].value) < 0) {
                strength_boost[0].value = 0;
            }

            strength_boost[0].value = isNaN(parseInt(strength_boost[0].value)) ? 0 : parseInt(strength_boost[0].value)
        }
    );

    intel_boost[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );

    intel_boost[0].addEventListener('keyup',
        function (event) {
            if (parseInt(intel_boost[0].value) > 398) {
                intel_boost[0].value = 398;
            }
            if (parseInt(intel_boost[0].value) < 0) {
                intel_boost[0].value = 0;
            }

            intel_boost[0].value = isNaN(parseInt(intel_boost[0].value)) ? 0 : parseInt(intel_boost[0].value)
        }
    );

    luck_boost[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );

    luck_boost[0].addEventListener('keyup',
        function (event) {
            if (parseInt(luck_boost[0].value) > 398) {
                luck_boost[0].value = 398;
            }
            if (parseInt(luck_boost[0].value) < 0) {
                luck_boost[0].value = 0;
            }

            luck_boost[0].value = isNaN(parseInt(luck_boost[0].value)) ? 0 : parseInt(luck_boost[0].value)
        }
    );

    agility_boost[0].addEventListener('keypress',
        function (event) {
            if (isNaN(parseInt(event.key)) !== false) {
                event.preventDefault();
            }
        }
    );

    agility_boost[0].addEventListener('keyup',
        function (event) {
            if (parseInt(agility_boost[0].value) > 398) {
                agility_boost[0].value = 398;
            }
            if (parseInt(agility_boost[0].value) < 0) {
                agility_boost[0].value = 0;
            }

            agility_boost[0].value = isNaN(parseInt(agility_boost[0].value)) ? 0 : parseInt(agility_boost[0].value)
        }
    );
}