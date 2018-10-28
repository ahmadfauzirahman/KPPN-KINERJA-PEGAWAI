<?php

use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Db\Column;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Utama";

        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
        ]);

    }

    public function homeAction()
    {

    }

    /*
    SELECT  unit  ,COUNT(case WHEN status ='On-Track' then 1 end) as ONTRACK,
    COUNT(CASE WHEN status = 'Off-Track' THEN 1 end) as OFFTRACK,
    COUNT(CASE WHEN status = 'Alert' THEN 1 end) as Alert,
    COUNT(CASE WHEN status = 'Done' THEN 1 end) as Done
    FROM tindaklanjut  GROUP BY unit*/
    public function dashboardAction()
    {
        $connection = new Mysql(
            [
                "host" => "localhost",
                "username" => "root",
                "password" => "enteraja",
                "dbname" => "project_2",
                "port" => 3306,
            ]
        );

        $connection->connect();

        $bred = "Halaman Utama";
        $bred1 = "Data Dashboard";
        $status = $this->modelsManager->createQuery("SELECT COUNT(status) as jumlah , status FROM Tindaklanjut GROUP BY status ")->execute();
        $resultset = $connection->query(
            "SELECT unit ,COUNT(case WHEN status ='On-Track' then 1 end) as ONTRACK, COUNT(CASE WHEN status = 'Off-Track' THEN 1 end) as OFFTRACK, COUNT(CASE WHEN status = 'Alert' THEN 1 end) as Alert, COUNT(CASE WHEN status = 'Done' THEN 1 end) as Done FROM tindaklanjut GROUP BY unit "
        )->fetchAll();
        /*echo (new Phalcon\Debug\Dump())->variables($resultset);
        exit();*/
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "dashboard" => $resultset,
            "status" => $status
        ]);
    }

    public function detailAction($id)
    {
        $dataKegiatan = Tindaklanjut::find(["conditions" => "unit like '$id'"]);
        $bred = "Halaman Utama";
        $bred1 = "Data Dashboard";
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "detail" => $dataKegiatan
        ]);

    }

}

