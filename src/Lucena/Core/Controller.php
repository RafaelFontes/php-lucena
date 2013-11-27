<?php


namespace Lucena\Core;


class Controller {

    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $name
     * @return string
     */
    public function param($name)
    {
        return $this->request->getParamByName($name);
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

} 