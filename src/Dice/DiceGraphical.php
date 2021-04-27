<?php

declare(strict_types=1);

namespace Eriksswe\Dice;

use Eriksswe\Dice\Dice;

class DiceGraphical extends Dice
{
    public function getLastRollGraphical()
    {
        return "<img src='../src/Dice/img/dice-six-faces-$this->roll.svg'>";
    }
}
