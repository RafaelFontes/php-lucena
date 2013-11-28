<?php

namespace Lucena\Core\Base;


interface ILayout {
    public function addJs($src);
    public function addCss($src);
    public function render($data);
    public function setBody($content);
}