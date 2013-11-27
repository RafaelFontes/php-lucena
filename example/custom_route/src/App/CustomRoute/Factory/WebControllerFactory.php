<?php


namespace App\CustomRoute\Factory;

use App\CustomRoute\Controller\HelloWorldController;
use Lucena\Core\App\ControllerFactory;
use Lucena\Core\Base\IControllerFactory;

class WebControllerFactory extends ControllerFactory implements IControllerFactory {

    public function parse()
    {
        switch($this->router->getRequestPartAt(0))
        {
            case "messenger":
                $this->controller = new HelloWorldController($this->getRequest(), $this->getResponse());
                break;
            default     :
                throw new \Exception("Page Not Found", 404);
                break;
        }
    }

} 