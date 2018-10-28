<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $id;

    public function initialize()
    {
        $this->id = $this->session->get('id');
        if (empty($this->id)) {
            $this->response->redirect('session/login');
        }
    }
}
