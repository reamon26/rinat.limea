<?php

class Controller_Auth extends Controller
{

    function action_index()
    {
        $this->view->generate('auth_view.php', 'template_view.php');
    }

    function action_redirect()
    {
        $this->view->generate('auth_redirect_view.php', 'template_view.php');
    }
}
