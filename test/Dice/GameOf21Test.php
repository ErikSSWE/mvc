<?php

declare(strict_types=1);

namespace Eriksswe\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for the functions in src/functions.php.
 */
class GameOf21Test extends TestCase
{
    /**
     * Test the function playerRoll().
     */
    public function testPlayerRoll()
    {
        $_POST["howManyDices"] = 2;
        $_POST["howManySides"] = 6;
        $_POST["action"] = "start";
        $controller = new GameOf21();
        $_SESSION = [
            "playerScore" => 0
        ];
        $controller->playerRoll();

        $this->assertIsInt($_SESSION["playerScore"]);
    }

    public function testComputerRoll()
    {
        $_POST["howManyDices"] = 2;
        $_POST["howManySides"] = 6;
        $_POST["action"] = "start";
        $controller = new GameOf21();
        $_SESSION = [
            "computerScore" => 0
        ];
        $controller->computerRoll();

        $this->assertIsInt($_SESSION["computerScore"]);
    }

    public function testgetData()
    {
        $controller = new GameOf21();
        $res = $controller->getData();

        $this->assertIsArray($res);
    }

    public function testcontinueGame()
    {
        $_POST["howManyDices"] = 2;
        $_POST["howManySides"] = 6;
        $_POST["action"] = "roll";
        $controller = new GameOf21();
        $_SESSION = [
            "playerScore" => 0
        ];
        $controller->playerRoll();

        $this->assertIsInt($_SESSION["playerScore"]);
    }

    public function testEnd()
    {
        $_POST["howManyDices"] = 2;
        $_POST["howManySides"] = 6;
        $_POST["action"] = "end";
        $controller = new GameOf21();
        $_SESSION = [
            "playerScore" => 0
        ];
        $controller->playerRoll();

        $this->assertIsInt($_SESSION["playerScore"]);
    }

    public function testComputer()
    {
        $_POST["howManyDices"] = 2;
        $_POST["howManySides"] = 6;
        $_SESSION["computerScore"] = 0;
        $_SESSION["computerGames"] = 0;
        $_POST["action"] = "computer";
        $controller = new GameOf21();
        $_SESSION = [
            "playerScore" => 0
        ];
        $controller->playerRoll();

        $this->assertIsInt($_SESSION["playerScore"]);
    }

    public function testDefault()
    {
        $_POST["howManyDices"] = 2;
        $_POST["howManySides"] = 6;
        $_SESSION["computerScore"] = 0;
        $_SESSION["computerGames"] = 0;
        $_POST["action"] = "blabla";
        $controller = new GameOf21();
        $_SESSION = [
            "playerScore" => 0
        ];
        $data = $controller->getData();

        $this->assertIsInt($_SESSION["playerScore"]);
        $this->assertEquals($_SESSION["playerScore"], $data["playerScore"]);
    }


    public function testPlayerFull()
    {
        $_SESSION["computerGames"] = 0;
        $_SESSION["computerScore"] = 1;
        $controller = new GameOf21();
        $_SESSION["playerScore"] = 22;
        $_SESSION["computerScore"] = 0;
        $_SESSION["computerGames"] = 0;
        $_SESSION["playerGames"] = 0;
        $controller->correct();

        $this->assertGreaterThan($_SESSION["playerGames"], $_SESSION["computerGames"]);
    }

    public function testPlayerWins1()
    {
        $_SESSION["computerGames"] = 0;
        $_SESSION["computerScore"] = 1;
        $controller = new GameOf21();
        $_SESSION["playerScore"] = 21;
        $_SESSION["computerScore"] = 1;
        $_SESSION["computerGames"] = 0;
        $_SESSION["playerGames"] = 0;
        $controller->correct();

        $this->assertGreaterThan($_SESSION["computerGames"], $_SESSION["playerGames"]);
    }

    public function testDraw()
    {
        $controller = new GameOf21();
        $_SESSION["playerScore"] = 1;
        $_SESSION["computerScore"] = 1;
        $_SESSION["computerGames"] = 0;
        $_SESSION["playerGames"] = 0;
        $controller->correct();

        $this->assertGreaterThan($_SESSION["playerGames"], $_SESSION["computerGames"]);
    }

    public function testComputerFull()
    {
        $controller = new GameOf21();
        $_SESSION["playerScore"] = 10;
        $_SESSION["computerScore"] = 25;
        $_SESSION["computerGames"] = 0;
        $_SESSION["playerGames"] = 0;
        $controller->correct();

        $this->assertGreaterThan($_SESSION["computerGames"], $_SESSION["playerGames"]);
    }
}
