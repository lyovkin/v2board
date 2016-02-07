<?php
/**
 * @author Cawa
 * The routing class
 */
namespace Application\Router;


use Application\Request\Request;
use Application\Exception\WrongControllerException;

class Router 
{

    protected $config;
    
    /**
     * 
     * @param array $config
     * @return type Main\Request\Request
     */
    public function __construct(Array $config) 
    {
        $this->config = $config;
    }
    
    public function process() 
    {
        $params = [];
        
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $urlParam = array_filter(explode('/', str_replace('.php', '', $uri['path'])));
        
        /*if(in_array($uri, array_column($this->config,'uri')))
        {
            $controller = 
        }
        var_dump($uri); die();*/
        $controller = isset($urlParam[1]) ? $urlParam[1] : 'index';
        $action = isset($urlParam[2]) ? $urlParam[2] : 'index';
        
        $args = [];
        if(isset($uri['query'])){
            $args = explode('&', $uri['query']);
        }else{
            $args = isset($urlParam[3]) ? $urlParam[3] : null;
        }
        
        if (array_key_exists($controller, $this->config)) {
            $params['controller'] = ucfirst($controller).'Controller';
            $params['action'] = $action.'Action';
            $params['args'] = $args;
            return new Request($params);
        }
        throw new WrongControllerException();
    
        
    }
    
}