<?php

class RapatController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Utama Rapat";
        $data = Rapat::find(['order' => "rapatID DESC"]);
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "data" => $data,
        ]);
    }


    public function createAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Tambah Data";
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,

        ]);

        if ($this->request->isPost()) {
            $datatanggal = $this->request->getPost("rapatTanggal");
            $postpdf = $this->request->getUploadedFiles()[0];

            $nama = $postpdf->getName();

            $pindahkan = $postpdf->moveTo('img/pdfrapat/' . $nama);
            $extanggal = explode("/", $datatanggal);
            $tanggal = $extanggal[2] . "-" . $extanggal[0] . "-" . $extanggal[1];
            $namarapat = $this->request->getPost("rapatNama");
            $temarapat = $this->request->getPost("rapatTema");
            if ($tanggal <= date('Y-m-d')) {
                $this->flashSession->error("Tidak Bisa Karna Tanggal Rapat Yang Anda Pilih Sudah Lewat Dari Tanggal Sekarang");
            } else {
                $model = new Rapat();
                $model->rapatTanggal = $tanggal;
                $model->rapatNama = $namarapat;
                $model->rapatTema = $temarapat;
                $model->file = $nama;
                $model->statusRapat = "Dilaksanakan";
                $save = $model->save();
                if ($save && $pindahkan == true) {
                    $this->flashSession->success("Berhasil Memasukan Data Rapat");
                    $this->response->redirect("rapat/index");
                } else {
                    $this->flashSession->error("Tidak Berhasil Memasukan Data Rapat");
                    $this->response->redirect("rapat/create");
                }

            }
        }
    }

    public function ubahstatusAction($id)
    {
        $data = Rapat::findFirstByRapatID($id);
        $data->statusRapat = "Selesai";
        $update = $data->save();
        if ($update) {
            $this->flashSession->success("Berhasil Mengubah Status Data Rapat");
            $this->response->redirect("rapat/index");
        } else {
            $this->flashSession->error("Tidak Berhasil Mengubah Status Data Rapat");
            $this->response->redirect("rapat/index");
        }
    }

    public function calenderAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Calander";


        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1

        ]);
    }

    public function reportAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Report";

        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1

        ]);
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $id = $post['namarapat'];
            $rapat = Rapat::findFirstByRapatID($post['namarapat']);
            $tindaklanjut = Tindaklanjut::find(['conditions' => "tema like '$id'"]);
            /*echo (new \Phalcon\Debug\Dump())->variable([$rapat, $tindaklanjut]);
            exit();*/
            $this->view->setVars([
                "data" => $rapat,
                "data1" => $tindaklanjut
            ]);
        }
    }
}

