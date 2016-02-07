<?php

namespace Application\Request;
/**
 * Description of Request
 *
 * @author Cawa
 */
use Application\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    protected $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }
    
    public function getController()
    {
        return $this->params['controller'];
    }
    
    public function getAction()
    {
        return $this->params['action'];
    }
    
    public function getArgumets()
    {
        return $this->params['args'];
    }
}

