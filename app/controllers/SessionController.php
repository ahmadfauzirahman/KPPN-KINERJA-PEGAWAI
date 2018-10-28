<?php

class SessionController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            $username = $this->request->getPost('nip');
            $password = $this->request->getPost('password');
            $pengguna = Pengguna::findFirstByNip($username);
            if ($pengguna) {
                if ($pengguna->nip == $username && $pengguna->password == $password) {

                    $this->session->set('id', $pengguna->id);
                    $this->session->set('username', $pengguna->username);
                    $this->session->set('password', $pengguna->password);
                    $this->session->set('alamat', $pengguna->alamat);
                    $this->session->set('nip', $pengguna->nip);
                    $this->session->set('email', $pengguna->email);
                    $this->session->set('status', $pengguna->status);
                    $this->session->set('hak_akses', $pengguna->hak_akses);
                    $this->flashSession->success("Halo Selamat Datang $username");
                    $this->response->redirect('index');
                } elseif ($pengguna->nip != $username || $pengguna->password != $password) {
                    $this->flashSession->error('Username atau Password Salah');
                    $this->response->redirect('');
                }
            } else {
                $this->flashSession->error('Akun Tidak Ada, Atau Tidak AKtif');
                $this->response->redirect('');
            }
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('session/login');
    }

}

