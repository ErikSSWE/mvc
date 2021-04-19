<?php

declare(strict_types=1);

namespace Eriksswe\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use Eriksswe\Yatzy\YatzyGame;

use function Mos\Functions\renderTwigView;

class YatzyView
{

    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $game = new YatzyGame();

        $msg = $game->getData();

        $body = renderTwigView("yatzy.html", $msg);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
