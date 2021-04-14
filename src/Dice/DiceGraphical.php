<?php

declare(strict_types=1);

namespace Eriksswe\Dice;

use Eriksswe\Dice\Dice;

class DiceGraphical extends Dice
{
    public function getLastRollGraphical()
    {
        echo "<img src='../src/Dice/img/dice-six-faces-$this->roll.svg'>";
    }
}

//<img src="../src/Dice/img/dice-six-faces-{{ testing1 }}.svg" alt="tärning" style="height: 200px; width: 200px;">
