<?php

use App\CustomRoute\WebBootstrap;

include '../bootstrap.php';

/**
  * Bootstrap -> FrontController -> ControllerFactory -> Router
 *                               -> $controller :: $method
 *                               -> Response
 */

$bootstrap = new WebBootstrap();

$bootstrap->run();

