<?php

class KegiatanController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Utama Kegiatan";
        $data = Kegiatan::find(['order' => "kegiatanID DESC"]);
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "data" => $data
        ]);
    }

    public function createAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Utama Tambah Data Kegiatan";
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1
        ]);

        if ($this->request->isPost()) {
            $datatanggal = $this->request->getPost("waktu");
            $postfile = $this->request->getUploadedFiles();
            $agenda = $this->request->getPost("agenda");
            $nama = null;
            foreach ($postfile as $file) {
                $nama = $file->getName();
            }
            $nama = date('Y-m-d') . "-" . $nama;
            $pindahkan = $file->moveTo("img/pdfkegiatan/" . $nama);

            $extanggal = explode("/", $datatanggal);
            $tanggal = $extanggal[2] . "-" . $extanggal[0] . "-" . $extanggal[1];
            $tempat = $this->request->getPost("tempat");
            $anggarandana = $this->request->getPost("anggarandana");
            $pic = $this->request->getPost("pic");
            if ($tanggal <= date("Y-m-d")) {
                $this->flashSession->error("Maaf Data Tanggal Yang Anda Masukan Telah Berlalu");
            } else {
                $model = new Kegiatan();
                $model->kegiatanWaktu = $tanggal;
                $model->agendaKegiatan = $agenda;
                $model->tempat = $tempat;
                $model->pic = $pic;
                $model->status = "Dilaksanakan";
                $model->file = $nama;
                $model->anggarandana = $anggarandana;
                $save = $model->save();
                if ($save AND $pindahkan == true) {
                    $this->flashSession->success("Berhasil Memasukan Data Kegiatan");
                    $this->response->redirect("kegiatan/index");
                } else {
                    $this->flashSession->error("Tidak Berhasil Memasukan Data Kegiatan");
                    $this->response->redirect("kegiatan/create");
                }

            }
        }
    }

    public function ubahAction($id)
    {
        $data = Kegiatan::findFirstByKegiatanID($id);
        $data->status = "Telah Dilaksanakan";
        $update = $data->save();
        if ($update) {
            $this->flashSession->success("Berhasil Mengubah Data Kegiatan");
            $this->response->redirect("kegiatan/index");
        } else {
            $this->flashSession->error("Tidak Berhasil Mengubah Data Kegiatan");
            $this->response->redirect("kegiatan/index");
        }
    }

    public function kalenderAction()
    {
        $data = Kegiatan::find();
        $bred = "Dashboard";
        $bred1 = "Data Kegiatan Kalaender Bulanan";
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "data" => $data
        ]);
    }

    public function statistikAction()
    {
        $bred = "Dashboard";
        $bred1 = "Statistik";
        $dataKegiatan = $this->modelsManager->createQuery("SELECT COUNT(kegiatanID) as jumlah, status FROM Kegiatan GROUP BY status ")->execute();
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "data" => $dataKegiatan
        ]);
    }

    public function reportAction()
    {
        $bred = "Dashboard";
        $bred1 = "Kegiatan";
        $dataKegiatan = Kegiatan::find(['order' => "kegiatanID DESC"]);

        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $datatanggal = explode("/", $post['tanggal1']);
            $tanggal = $datatanggal[2] . "-" . $datatanggal[0] . "-" . $datatanggal[1];
            $datatanggal1 = explode("/", $post['tanggal2']);
            $tanggal1 = $datatanggal1[2] . "-" . $datatanggal1[0] . "-" . $datatanggal1[1];
            $dataKegiatan = $this->modelsManager->createQuery("SELECT * FROM Kegiatan where kegiatanWaktu between '$tanggal' and '$tanggal1'")->execute();
            $this->view->dataKegiatan = $dataKegiatan;
        }
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "dataKegiatan" => $dataKegiatan
        ]);
    }

    public function detailAction($id)
    {
        $dataKegiatan = Tindaklanjut::find(["conditions" => "unit like '$id'"]);
        $bred = "Halaman Utama";
        $bred1 = "Data Kegiatan";
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "detail" => $dataKegiatan
        ]);

    }
}

