<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 20:36
 */
function tanggal_indo($tanggal)
{
    $bulan = array(1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

?>
<div class="card">
    <div class="card-header">
        <a href="<?= $this->url->get('rapat/create') ?>" class="btn btn-outline-primary float-right">
            Tambah Data
        </a>
        <a href="<?= $this->url->get('rapat/calender') ?>" class="btn btn-outline-dark">
            Kalander
        </a>
        <br>
        <br>
        <hr>
        <p class="alert alert-danger">Klik Tombol Dilaksanakan Untuk Merubah Status Rapat Menjadi Selesai, Jika Rapat
            Telah Dilaksanakan</p>
        <?php $this->flashSession->output() ?>
    </div>
    <div class="card-body">
        <div class="py-4">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Rapat</th>
                        <th>Tanggal Rapat</th>
                        <th>Tema Rapat</th>
                        <th>File Rapat</th>
                        <th>Status Rapat</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Rapat</th>
                        <th>Tanggal Rapat</th>
                        <th>Tema Rapat</th>
                        <th>File Rapat</th>
                        <th>Status Rapat</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $no = 1;
                    foreach ($data as $rapat): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $rapat->rapatNama ?></td>
                            <td><?= tanggal_indo($rapat->rapatTanggal) ?></td>
                            <td><?= $rapat->rapatTema ?></td>
                            <td><a href="<?= $this->url->get('img/pdfrapat/'.$rapat->file) ?>">Download</a></td></td>
                            <td>
                                <?php if ($rapat->statusRapat == "Dilaksanakan"): ?>
                                    <a href="<?= $this->url->get('rapat/ubahstatus/' . $rapat->rapatID) ?>"
                                       class="btn btn-outline-danger"><?= $rapat->statusRapat ?></a>
                                <?php else: ?>
                                    <p class="alert alert-info"><?= $rapat->statusRapat ?></p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
