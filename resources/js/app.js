import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const lvl_input = document.getElementsByName("stuff_level");

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

        if (parseInt(lvl_input[0].value + event.key) > 200) {
            lvl_input[0].value = 200;
            event.preventDefault();
        }

        if (parseInt(lvl_input[0].value + event.key) < 1) {
            lvl_input[0].value = 1;
            event.preventDefault();
        }

        if (lvl_input[0].value.length >= 3) {
            lvl_input[0].value = 200;
            event.preventDefault();
        }
    }
);

vitality_parchment[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(vitality_parchment[0].value + event.key) > 100) {
            vitality_parchment[0].value = 100;
            event.preventDefault();
        }

        if (parseInt(vitality_parchment[0].value + event.key) < 0) {
            vitality_parchment[0].value = 0;
            event.preventDefault();
        }

        if (vitality_parchment[0].value.length >= 3) {
            vitality_parchment[0].value = 100;
            event.preventDefault();
        }
    }
);
wisdom_parchment[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(wisdom_parchment[0].value + event.key) > 100) {
            wisdom_parchment[0].value = 100;
            event.preventDefault();
        }

        if (parseInt(wisdom_parchment[0].value + event.key) < 0) {
            wisdom_parchment[0].value = 0;
            event.preventDefault();
        }

        if (wisdom_parchment[0].value.length >= 3) {
            wisdom_parchment[0].value = 100;
            event.preventDefault();
        }
    }
);
strength_parchment[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(strength_parchment[0].value + event.key) > 100) {
            strength_parchment[0].value = 100;
            event.preventDefault();
        }

        if (parseInt(strength_parchment[0].value + event.key) < 0) {
            strength_parchment[0].value = 0;
            event.preventDefault();
        }

        if (strength_parchment[0].value.length >= 3) {
            strength_parchment[0].value = 100;
            event.preventDefault();
        }
    }
);
intel_parchment[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(intel_parchment[0].value + event.key) > 100) {
            intel_parchment[0].value = 100;
            event.preventDefault();
        }

        if (parseInt(intel_parchment[0].value + event.key) < 0) {
            intel_parchment[0].value = 0;
            event.preventDefault();
        }

        if (intel_parchment[0].value.length >= 3) {
            intel_parchment[0].value = 100;
            event.preventDefault();
        }
    }
);
luck_parchment[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(luck_parchment[0].value + event.key) > 100) {
            luck_parchment[0].value = 100;
            event.preventDefault();
        }

        if (parseInt(luck_parchment[0].value + event.key) < 0) {
            luck_parchment[0].value = 0;
            event.preventDefault();
        }

        if (luck_parchment[0].value.length >= 3) {
            luck_parchment[0].value = 100;
            event.preventDefault();
        }
    }
);
agility_parchment[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(agility_parchment[0].value + event.key) > 100) {
            agility_parchment[0].value = 100;
            event.preventDefault();
        }

        if (parseInt(agility_parchment[0].value + event.key) < 0) {
            agility_parchment[0].value = 0;
            event.preventDefault();
        }

        if (agility_parchment[0].value.length >= 3) {
            agility_parchment[0].value = 100;
            event.preventDefault();
        }
    }
);


vitality_boost[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(vitality_boost[0].value + event.key) < 0) {
            vitality_boost[0].value = 0;
            event.preventDefault();
        }
    }
);
wisdom_boost[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(wisdom_boost[0].value + event.key) < 0) {
            wisdom_boost[0].value = 0;
            event.preventDefault();
        }
    }
);
strength_boost[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(strength_boost[0].value + event.key) < 0) {
            strength_boost[0].value = 0;
            event.preventDefault();
        }

    }
);
intel_boost[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(intel_boost[0].value + event.key) < 0) {
            intel_boost[0].value = 0;
            event.preventDefault();
        }
    }
);
luck_boost[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(luck_boost[0].value + event.key) < 0) {
            luck_boost[0].value = 0;
            event.preventDefault();
        }

    }
);
agility_boost[0].addEventListener('keypress',
    function (event) {
        if (isNaN(parseInt(event.key)) !== false) {
            event.preventDefault();
        }

        if (parseInt(agility_boost[0].value + event.key) < 0) {
            agility_boost[0].value = 0;
            event.preventDefault();
        }
    }
);

