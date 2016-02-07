<?php

namespace Application\Exception;
/**
 * Description of BaseException
 *
 * @author Cawa
 */
class BaseException extends \Exception
{
    public function displayErrors()
    {
            echo get_class($this).'<br />'.'Trace:<br/><pre>';
            echo $this->getTraceAsString().'</pre>';
    }
}

