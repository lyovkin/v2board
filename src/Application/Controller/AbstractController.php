<?php

namespace Application\Controller;
/**
 * Description of AbstractController
 *
 * @author Cawa
 */
use Exception\ActionNotFoundException;
        


abstract class AbstractController 
{
    protected $arguments = [];
    protected $view;

    protected function dispatch($action)
    {
        if (method_exists($this, $action)) {
            return $this->$action();
        }
        return $this->notFoundActin();
      
    }
    
    public function __construct($action,$args) 
    {
            $this->arguments = $args;
            $this->dispatch($action);
        
    }
    
    public function notFoundAction()
    {
        throw new ActionNotFoundException();
    }
    
    public function getView()
    {
        return $this->view;
    }
}
