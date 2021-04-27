<?php

declare(strict_types=1);

namespace Eriksswe\Controller;

use Eriksswe\Dice\GameOf21;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderTwigView;

/**
 * Controller for showing how Twig views works.
 */
class GameOf21View
{
    public function __invoke(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $game = new GameOf21();

        $body = renderTwigView("game21.html", $game->getData());

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
