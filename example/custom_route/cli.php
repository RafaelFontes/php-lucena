<?php

include 'cli-config.php';

/**
 * @usage: php cli.php messenger say foo
 */

$bootstrap = new \App\CustomRoute\CliBootstrap();

$bootstrap->run();
