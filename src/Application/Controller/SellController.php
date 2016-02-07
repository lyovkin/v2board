<?php

namespace Application\Controller;

use Application\Controller\AbstractController;
use Application\View\ViewModel;

/**
 * Description of SellController
 *
 * @author Cawa
 */
class SellController extends AbstractController
{

    public function indexAction()
    {
        $viewModel = new ViewModel('sell/index', ['promt' => 'sell controller']);
        $this->view = $viewModel->getView();
    }

    public function testAction()
    {
        var_dump($this->arguments);
    }

}
