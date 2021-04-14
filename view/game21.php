<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use function Mos\Functions\url;

?>

<form method="POST" action="<?= url("/game21") ?>">
    <label for="howManyDices">How many dices?<br></label>
    <input name="howManyDices" type="number" min="1" max="2">
    <label for="howManySides"><br>How many sides?<br></label>
    <input name="howManySides" type="number" min="1">
    <br>
    <input type="submit" name="send" value="start">
</form>




<img src="../src/Dice/img/dice-six-faces-{{ testing1 }}.svg" alt="tärning" style="height: 200px; width: 200px;">
<img src="../src/Dice/img/dice-six-faces-{{ testing2 }}.svg" alt="tärning" style="height: 200px; width: 200px;">
<img src="../src/Dice/img/dice-six-faces-{{ testing3 }}.svg" alt="tärning" style="height: 200px; width: 200px;">
<img src="../src/Dice/img/dice-six-faces-{{ testing4 }}.svg" alt="tärning" style="height: 200px; width: 200px;">
<img src="../src/Dice/img/dice-six-faces-{{ testing5 }}.svg" alt="tärning" style="height: 200px; width: 200px;">
<img src="../src/Dice/img/dice-six-faces-{{ testing6 }}.svg" alt="tärning" style="height: 200px; width: 200px;">
