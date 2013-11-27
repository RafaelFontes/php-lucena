<?php


namespace Lucena\Core\App;


use Lucena\Core\Base\IBootstrap;
use Lucena\Core\Base\IControllerFactory;
use Lucena\Core\Base\IRouter;
use Lucena\Core\Box;
use Lucena\Core\CodeBox;
use Lucena\Core\FrontController;
use Lucena\Core\Response;

abstract class Bootstrap implements IBootstrap {

    /**
     * @param IRouter $router
     * @param Response $response
     * @return Box
     */
    public function &getCodeBox(IRouter &$router, Response $response)
    {
        $box = new Box($router, $this->getControllerFactory($router, $response));
        $box->parse();

        return $box;
    }

    /**
     * Starts the application
     * @return void
     */
    public function run()
    {
        $router = null;

        $response = new Response();

        try
        {
            $router = $this->getRouter();
            $responseBody = $router->getResponseType()->process( $this->getCodeBox($router, $response)->execute() );
            $response->writeResponse($responseBody);
        }
        catch (\Exception $e)
        {
            $response->writeError( $e );
        }
    }

    /**
     * @return IRouter
     */
    abstract public function &getRouter();

    /**
     * @param IRouter $router
     * @param Response $response
     * @return IControllerFactory
     */
    abstract public function &getControllerFactory(IRouter &$router, Response $response);
}