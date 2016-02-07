<?php

namespace Application;

use Application\Exception\ConfigException;
use Application\Config\ConfigReader;
use Application\View\ViewModel;
use Application\Router\Router;
use Application\Interfaces\RequestInterface;
use Application\Controller\ErrorController;

/**
 * Main application class
 * @author cawa
 */
class Application
{

    /**
     * Route configuration array
     * @var array
     */
    protected $routeConfig;

    /**
     * Layout
     * @var PhpRenderer
     */
    protected $layout;

    public function run()
    {
        try {
            $this->setConfig();
            //
            $router = new Router($this->routeConfig['router']);
            $request = $router->process();
            $content = $this->startController($request);
            $layout = new ViewModel('layout', $content);
            echo $layout->getView();
        } catch (ConfigException $e) {
            echo $e->displayErrors();
        } catch (Exception\WrongControllerException $e) {
            echo $e->displayErrors();
        }
    }

    /**
     * 
     */
    public function getConfig()
    {
        
    }

    /**
     * Set up the application
     */
    public function __construct()
    {
        
    }

    /**
     * Read the config files
     */
    protected function setConfig()
    {
        $this->routeConfig = ConfigReader::getSection('route');
        //throw new ConfigException('Ошибка конфигурации');
    }

    protected function setLatyout()
    {
        
    }

    public function renderLayout()
    {
        
    }

    /**
     * 
     * @param \Interfaces\RequestInterface $request
     * @return type Controller
     * @throws WrongControllerException
     * @throws ActionNotFoundException
     */
    public function startController(RequestInterface $request)
    {
        try {
            $controller = 'Application\Controller\\' . $request->getController();
            $controllerInstance = class_exists($controller)
                    ?
                    new $controller($request->getAction(), $request->getArgumets())
                    :
                    new ErrorController('404');
        } catch (\Exception\WrongControllerException $e) {
            $e->displayErrors();
        } catch (\Exception\ActionNotFoundException $e) {
            $e->displayErrors();
        }
        return $controllerInstance->getView();
    }

}
