<?php

namespace Application\Controller;
/**
 * Description of IndexController
 *
 * @author Cawa
 */

class ErrorController
{
    public function __construct($code = 0) 
    {
        echo 'Error code:' . $code;
        die();
    }
    
}
