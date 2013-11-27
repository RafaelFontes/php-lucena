<?php


namespace Lucena\Core\Base;


interface IResponseType extends IBase {
    /**
     * @param $data
     * @return mixed
     */
    public function process($data);
} 