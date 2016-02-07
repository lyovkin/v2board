<?php

namespace Application\Controller;

use Application\Controller\AbstractController;
use Application\View\ViewModel;

/**
 * User controller
 * Registration, auth, and other user fucntions
 * @author Cawa
 */
class UserController extends AbstractController
{

    public function indexAction()
    {
        $viewModel = new ViewModel('user/index', ['promt' => 'user controller']);
        $this->view = $viewModel->getView();
    }

    public function testAction()
    {
        var_dump($this->arguments);
    }

}
