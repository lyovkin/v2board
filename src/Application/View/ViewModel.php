<?php

namespace Application\View;

use Application\Config\ConfigReader;

/**
 *
 * @author cawa
 */
class ViewModel
{

    protected $template;

    /**
     * 
     * @param string $template
     * @return type
     * @throws ViewException
     */
    public function __construct($template, $content = null)
    {
        if (!$template) {
            throw new ViewException();
        }
        $path = ConfigReader::getSection('view')['template_map'];
        //$content = $content;
        ob_start();
        require_once $path[$template];
        $this->template = ob_get_clean();
    }

    public function getView()
    {
        return $this->template;
    }

    /**
     * Render the partial view script
     * @param string $partialName
     * @return ViewModel
     */
    public function renderPartial($partialName, $content = null)
    {
        if (!$partialName) {
            throw new ViewException();
        }
        $path = ConfigReader::getSection('view')['template_map'];
        ob_start();
        require_once $path[$partialName];
        return ob_get_clean();
    }

}
