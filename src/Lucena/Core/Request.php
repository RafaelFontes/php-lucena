<?php


namespace Lucena\Core;

class Request {

    private $params = array();

    public function getParamByName($name)
    {
        return $this->params[$name];
    }

    public function addParam($name, $value)
    {
        $this->params[$name] = $value;
        return $this;
    }
} 