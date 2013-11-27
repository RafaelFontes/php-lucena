<?php

namespace Lucena\Core\Base;

use Lucena\Core\Box;
use Lucena\Core\Response;

/**
 * Interface IBootstrap
 * @package Lucena\Core\Base
 */
interface IBootstrap {
    /**
     * Starts the application
     * @return void
     */
    public function run();

    /**
     * @return IRouter
     */
    public function &getRouter();

    /**
     * @param IRouter $router
     * @param Response $response
     * @return IControllerFactory
     */
    public function &getControllerFactory(IRouter &$router, Response $response);

    /**
     * @param IRouter $router
     * @param Response $response
     * @return Box
     */
    public function &getCodeBox(IRouter &$router, Response $response);
}