<?php


namespace Lucena\Core;


use Lucena\Core\Base\ILayout;

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
     * @var ILayout
     */
    protected $layout;

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


    public function getResponse()
    {
        return $this->response;
    }

    public function setLayout(ILayout $layout)
    {
        $this->layout = $layout;
    }

    public function getLayout()
    {
        return $this->layout;
    }

} 