<?php


namespace App\CustomRoute\Controller;


use Lucena\Core\Controller;

class HelloWorldController extends Controller {

    /**
     * @Action
     * @Route say/{name}
     */
    public function say()
    {
        return "Hello " . $this->param("name");
    }
}