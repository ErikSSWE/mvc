<?php

declare(strict_types=1);

namespace Eriksswe\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller TwigView.
 */
class ControllerGameOf21ViewTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass1()
    {
        $controller = new GameOf21View();
        $this->assertInstanceOf("\Eriksswe\Controller\GameOf21View", $controller);
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse1()
    {
        $controller = new GameOf21View();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
