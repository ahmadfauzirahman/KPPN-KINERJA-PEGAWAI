<?php

class TindaklanjutController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $bred = "Tindak Lanjut";
        $bred1 = "Tampilan Utama";
        $data = Tindaklanjut::find(['order' => "idTindak DESC"]);
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "data" => $data,

        ]);
    }


    public function tambahAction()
    {
        $bred = "Tindak Lanjut";
        $bred1 = "Tampilan Form Tambah Data";
        $rapat = Rapat::find();
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "rapat" => $rapat
        ]);
        if ($this->request->isPost()) {
            $post = $this->request->getPost('');
            $tglrapat = explode("/", $post['tanggalRapat']);
            $tglpenyelesaian = explode("/", $post['tanggalPenyelesaian']);
            $tanggalPenyelesaian = $tglpenyelesaian[2] . "-" . $tglpenyelesaian[0] . "-" . $tglpenyelesaian[1];
            $tanggalRapat = $tglrapat[2] . "-" . $tglrapat[0] . "-" . $tglrapat[1];

            $model = new Tindaklanjut();
            $model->tanggalPenyelesaian = $tanggalPenyelesaian;
            $model->tanggalRapat = $tanggalRapat;
            $model->tema = $post['tema'];
            $model->hasilKesepatakanRapat = $post['hasilKesepakatanRapat'];
            $model->status = "Not Status";
            $model->unit = $post['unit'];
            $save = $model->save();
            if ($save) {
                $this->flashSession->success("Berhasil Memasukan Data");
                $this->response->redirect("tindaklanjut/index");
            } else {
                $this->flashSession->error("Tidak Berhasil Memasukn data");
                $this->response->redirect("tindaklanjut/tambah");
            }
        }
        
    }

    public function uploadAction()
    {
        if ($this->request->isPost()){
            
        }
    }
}

