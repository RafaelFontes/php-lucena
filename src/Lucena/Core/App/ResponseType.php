<?php

namespace Lucena\Core\App;

use Lucena\Core\Base\IResponseType;

class ResponseType extends Base implements IResponseType {
    /**
     * @param $data
     * @return mixed
     */
    public function process($data)
    {
        echo $data;

        return null;
    }

    public function parse()
    {

    }
}