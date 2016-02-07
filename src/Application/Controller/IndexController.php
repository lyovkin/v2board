<?php

namespace Application\Controller;

use Application\Controller\AbstractController;
use Application\View\ViewModel;

/**
 * Description of IndexController
 *
 * @author Cawa
 */
class IndexController extends AbstractController
{

    public function indexAction()
    {
        $viewModel = new ViewModel('index', ['promt' => 'INDEXACTION']);
        $this->view = $viewModel->getView();
    }

    public function testAction()
    {
        var_dump($this->arguments);
    }

}
