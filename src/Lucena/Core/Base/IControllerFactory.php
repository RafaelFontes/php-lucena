<?php


namespace Lucena\Core\Base;


use Lucena\Core\Controller;

interface IControllerFactory {

    /**
     * @return Controller
     */
    public function getController();
} 