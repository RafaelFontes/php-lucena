<?php


namespace Lucena\Core\App;

use Lucena\Core\Base\IControllerFactory;
use Lucena\Core\Base\IRouter;
use Lucena\Core\Controller;
use Lucena\Core\Request;
use Lucena\Core\Response;

abstract class ControllerFactory extends Base implements IControllerFactory {
    /**
     * @var IRouter $router
     */
    protected $router;

    /**
     * @var Controller $controller
     */
    protected $controller;

    /**
     * @var Request $request
     */
    protected $request;
    /**
     * @var Response $response
     */
    protected $response;

    public function __construct(IRouter &$router, Response $response)
    {
        $this->router = $router;
        $this->response = $response;
        $this->request = new Request($router);
    }

    /**
     * @return Controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param \Lucena\Core\Response $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return \Lucena\Core\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \Lucena\Core\Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return \Lucena\Core\Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}