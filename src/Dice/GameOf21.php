<?php

declare(strict_types=1);

namespace Eriksswe\Dice;

use Eriksswe\Dice\DiceHand;
use SebastianBergmann\Environment\Console;

use function Mos\Functions\{
    url
};

class GameOf21
{
    protected $diceHand = null;

    protected $playerScore = 0;

    protected array $data = [
        "header" => "Game21 page",
        "message" => "Test, player!",
        "playerScore" => 0,
    ];

    public function __construct()
    {
        if (empty($_SESSION["playerGames"])) {
            $_SESSION["playerGames"] = 0;
        }

        if (empty($_SESSION["computerGames"])) {
            $_SESSION["computerGames"] = 0;
        }

        if (empty($_SESSION["howManySides"])) {
            $_SESSION["howManySides"] = 6;
        }

        if (empty($_SESSION["howManyDices"])) {
            $_SESSION["howManyDices"] = 2;
        }

        $_SESSION['pushes'] = 0;

        $action = strtolower($_POST["action"] ?? "");

        switch ($action) {
            case 'roll':
                $this->continueGame();
                $this->playerRoll();
                break;
            case 'start':
                $_SESSION['playerScore'] = 0;
                $_SESSION['computerScore'] = 0;
                break;
            case 'end':
                $this->endGame();
                $this->initGame();
                break;
            case 'computer':
                $this->continueGame();
                while ($_SESSION["computerScore"] < 21 && $_SESSION["computerScore"] < $_SESSION["playerScore"]) {
                    $this->computerRoll();
                }
                $this->correct();
                $_SESSION['pushes'] += 1;
                break;
            default:
                break;
        }
    }

    public function correct()
    {
        if ($_SESSION["playerScore"] > 21) {
            $_SESSION["computerGames"] += 1;
        } elseif ($_SESSION["computerScore"] <= 21 && $_SESSION["computerScore"] > $_SESSION["playerScore"]) {
            $_SESSION["computerGames"] += 1;
        } elseif ($_SESSION["playerScore"] <= 21 && $_SESSION["computerScore"] < $_SESSION["playerScore"]) {
            $_SESSION["playerGames"] += 1;
        } elseif ($_SESSION["computerScore"] == $_SESSION["playerScore"] && $_SESSION["playerScore"] <= 21) {
            $_SESSION["computerGames"] += 1;
        } elseif ($_SESSION["computerScore"] > 21 && $_SESSION["playerScore"] <= 21) {
            $_SESSION["playerGames"] += 1;
        }
    }

    public function endGame()
    {
        $_SESSION["computerGames"] = 0;
        $_SESSION["playerGames"] = 0;
    }

    public function initGame()
    {
        $_SESSION["playerScore"] = 0;
        $_SESSION["computerScore"] = 0;
        $_SESSION["howManyDices"] = (int)$_POST["howManyDices"] ?? 2;
        $_SESSION["howManySides"] = (int)$_POST["howManySides"] ?? 6;
        $this->diceHand = new DiceHand($_SESSION["howManyDices"], $_SESSION["howManySides"]);
    }

    public function continueGame()
    {
        $this->diceHand = new DiceHand(
            (int)$_SESSION["howManyDices"] ?? 2,
            (int)$_SESSION["howManySides"] ?? 6
        );
    }

    public function playerRoll()
    {
        $_SESSION["playerScore"] += $this->diceHand->rollDices();
    }

    public function computerRoll()
    {
        $_SESSION["computerScore"] += $this->diceHand->rollDices();
    }


    public function getData()
    {
        return [
            "testinUrl" => url("/game21"),
            "header" => "Game21 page",
            "message" => "Test, player!",
            "howManyDices" => $_SESSION["howManyDices"] ?? 1,
            "howManySides" => $_SESSION["howManySides"] ?? 6,
            "playerScore" => $_SESSION["playerScore"] ?? 0,
            "computerScore" => $_SESSION["computerScore"] ?? 0,
            "playerGames" => $_SESSION["playerGames"] ?? 0,
            "computerGames" => $_SESSION["computerGames"] ?? 0,
            "back" => url("/"),
            'pushes' => $_SESSION['pushes'],
            'test' => $_SESSION['pushes'],
        ];
    }
}
