<?php


namespace Lucena\Core\Base;


interface IRouter {
    /**
     * @return IResponseType
     */
    public function getResponseType();

    /**
     * @param int $idx
     * @return mixed
     */
    public function getRequestPartAt($idx);

    public function getRequestParts();

    public function getRequestArgs();
} 