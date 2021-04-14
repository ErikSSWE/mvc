<?php

require __DIR__ . "/../../vendor/autoload.php";

use Eriksswe\Dice\Dice;
use Eriksswe\Dice\DiceHand;
use Eriksswe\Dice\DiceGraphical;

$dice = new Dice();


for ($i=0; $i < 9; $i++) { 
    $dice->roll();
    echo $dice->getLastRoll() . ", ";
}

echo "\n klar med Dice";
echo "\n";

$diceHand = new DiceHand(2);

for ($i=0; $i < 9; $i++) { 
    $diceHand->rollDices();
    echo $diceHand->getLastRoll() . ", ";
}
echo "\n klar med DiceHand \n";

$diceGraph = new DiceGraphical();

$diceGraph->roll();
$diceGraph->getLastRoll();
$diceGraph->getLastRollGraphical();
