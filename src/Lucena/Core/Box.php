<?php


namespace Lucena\Core;


use Lucena\Core\App\Base;
use Lucena\Core\Base\IControllerFactory;
use Lucena\Core\Base\IRouter;

class Box extends Base {
    /**
     * @var IControllerFactory $factory
     */
    private $factory;
    /**
     * @var IRouter $router
     */
    private $router;

    /**
     * @var \ReflectionMethod $method
     */
    private $method;

    public function __construct(IRouter $router, IControllerFactory $factory)
    {
        $this->factory = $factory;
        $this->router  = $router;
    }

    public function parse()
    {
        $controller = new \ReflectionClass(get_class($this->factory->getController()));
        $methods = $controller->getMethods(\ReflectionMethod::IS_PUBLIC);

        /**
         * @var \ReflectionMethod $method
         */
        foreach($methods as $method)
        {
            $annotations = $this->parseAnnotations($method);


            if (array_key_exists('Action', $annotations) && array_key_exists('Route', $annotations))
            {
                if ($this->checkRoute(  implode(" ", $annotations['Route']) ) )
                {
                    $this->method = $method;
                    return;
                }
            }

            exit;
        }
    }

    private function checkRoute($route)
    {
        $route = preg_replace("~\\{([^\\}]+)\\}~", '(?P<' . '${1}' . '>[^/]+)', $route);

        if (!preg_match_all("~^$route$~", implode("/", $this->router->getRequestArgs()) , $matches)) {
            return false;
        }

        foreach($matches as $name => $value)
        {
            if (!is_numeric($name))
            {
                $this->factory->getController()->getRequest()->addParam($name,implode(" ", $value));
            }
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->method->invoke( $this->factory->getController() );
    }

    /**
     * @param \ReflectionMethod $method
     * @return array
     */
    private function parseAnnotations(\ReflectionMethod $method)
    {
        $doc = $method->getDocComment();

        preg_match_all("~@([^@]+)\n~s",$doc, $matches);

        $ret = array();

        if (!empty($matches[1]))
        {
            foreach($matches[1] as $i => $match)
            {
                $args = explode(" ", trim($match));

                $ret[trim(array_shift($args))] = ($args) ? $args : null;
            }
        }

        return $ret;
    }
} 