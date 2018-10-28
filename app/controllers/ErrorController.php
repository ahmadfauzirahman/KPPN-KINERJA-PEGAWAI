<?php

class ErrorController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function show404Action()
    {
        $bred = "404 NOT FOUND";
        $bred1 = "TAMPILAN TIDAK DITEMUKAN";
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,

        ]);
    }
}

