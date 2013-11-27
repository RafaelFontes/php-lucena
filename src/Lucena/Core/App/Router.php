<?php

namespace Lucena\Core\App;

use Lucena\Core\Base\IResponseType;
use Lucena\Core\Base\IRouter;

abstract class Router extends Base implements IRouter {

    /**
     * @var IResponseType $responseType
     */
    protected $responseType;

    /**
     * @var string
     */
    protected $requestString;

    /**
     * @var array
     */
    protected $requestParts = array();

    /**
     * @var string
     */
    protected $requestStringSeparator = "/";

    public function setRequestString($strRequest)
    {
        $this->requestString = $strRequest;
        $this->requestParts = explode($this->requestStringSeparator, $strRequest);
    }

    /**
     * @return \Lucena\Core\Base\IResponseType
     */
    public function getResponseType()
    {
        return $this->responseType;
    }


    /**
     * @param int $idx
     * @return string
     */
    public function getRequestPartAt($idx)
    {
        return (!empty($this->requestParts[$idx])) ? $this->requestParts[$idx] : null;
    }

    public function getRequestParts()
    {
        return $this->requestParts;
    }

    public function getRequestArgs()
    {
        $parts = $this->requestParts;

        array_shift($parts);

        return $parts;
    }
}