<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 19:11
 */
?>

<div class="card">
    <div class="card-header">
        <a href="<?= $this->url->get('pengguna/create') ?>" class="btn btn-primary">
            Tambah Data
        </a>
        <?php $this->flashSession->output() ?>
    </div>
    <div class="card-body">
        <div class="py-4">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nip</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Hak Akses</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nip</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Hak Akses</th>
                        <th>Edit</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $no = 1;
                    foreach ($data as $pengguna): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $pengguna->username ?></td>
                            <td><?= $pengguna->password ?></td>
                            <td><?= $pengguna->nip ?></td>
                            <td><?= $pengguna->alamat ?></td>
                            <td><?= $pengguna->nohp ?></td>
                            <td><?= $pengguna->email ?></td>
                            <td><?= $pengguna->status ?></td>
                            <td><?= $pengguna->hak_akses ?></td>
                            <td><a href="<?= $this->url->get('pengguna/edit/' . $pengguna->id) ?>"
                                   class="btn btn-outline-primary">Edit</a></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
