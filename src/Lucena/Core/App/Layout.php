<?php


namespace Lucena\Core\App;

use Lucena\Core\Base\ILayout;

abstract class Layout implements ILayout {
    protected $js = array();
    protected $css = array();
    protected $body;

    public function addJs($src)
    {
        $this->js[] = $src;
    }

    public function addCss($src)
    {
        $this->css[] = $src;
    }

    abstract public function render($data);

    public function setBody($content)
    {
        $this->body = $content;
    }

} 