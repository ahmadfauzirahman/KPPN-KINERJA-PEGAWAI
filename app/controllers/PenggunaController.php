<?php

class PenggunaController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $bred = "Pengguna";
        $bred1 = "Tampilan Utama";
        $data = Pengguna::find(['order' => "id DESC"]);
        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
            "data" => $data
        ]);
    }

    public function createAction()
    {
        $bred = "Dashboard";
        $bred1 = "Tampilan Tambah Pengguna";

        $this->view->setVars([
            "title1" => $bred,
            "title2" => $bred1,
        ]);
        if ($this->request->isPost()) {
            $model = new Pengguna();
            $model->username = $this->request->getPost('username');
            $model->password = $this->request->getPost('password');
            $model->nip = $this->request->getPost('nip');
            $model->alamat = $this->request->getPost('alamat');
            $model->nohp = $this->request->getPost('nohp');
            $model->email = $this->request->getPost('email');
            $model->hak_akses = $this->request->getPost('hak_akses');
            $model->status = "Aktif";
            $save = $model->save();
            if ($save) {
                $this->flashSession->success("Berhasil Menambahkan Data Pengguna");
                $this->response->redirect("pengguna/index");
            } else {
                $this->flashSession->error("Tida Berhasil Menambahkan Data Pengguna");
                $this->response->redirect("pengguna/index");
            }
        }
    }

    public function editAction($id)
    {
        $bred = "Pengguna";
        $bred1 = "Tampilan Edit Data Pengguna";
        $data = Pengguna::findFirstById($id);

        if ($this->request->isPost()) {
            $data->alamat = $this->request->getPost("alamat");
            $data->nohp = $this->request->getPost("nohp");
            $data->email = $this->request->getPost("email");
            $update = $data->save();
            if ($update) {
                $this->flashSession->success("Berhasil Mengupdate Data Pengguna");
                $this->response->redirect("pengguna/index");
            } else {
                $this->flashSession->success("Tidak Berhasil Mengupdate Data Pengguna");
                $this->response->redirect("pengguna/index");
            }
        }
        $this->view->setVars(
            [
                "data" => $data,
                "title1" => $bred,
                "title2" => $bred1]
        );
    }
}

