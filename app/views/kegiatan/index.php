<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 09/09/18
 * Time: 8:00
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= $this->url->get('kegiatan/create') ?>" class="btn btn-outline-primary">Tambah Data
                    Kegiatan</a>
                <h1 class="float-right">Data Kegiatan</h1>
                <br>
                <br>
                <hr>
                <p class="alert alert-danger"><i class="material-icons"> info </i> Klik Tombol Dilaksanakan Untuk
                    Merubah Status Kegiatan Menjadi Telah
                    Dilaksanakan, Jika
                    Rapat
                    Telah Dilaksanakan</p>
                <?php $this->flashSession->output() ?>
            </div>
            <div class="card-body">
                <div class="py-4">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kegiatan</th>
                                <th>Agenda Kegiatan</th>
                                <th>Tempat</th>
                                <th>Pic</th>
                                <th>File Kegiatan</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kegiatan</th>
                                <th>Agenda Kegiatan</th>
                                <th>Tempat</th>
                                <th>Pic</th>
                                <th>File Kegiatan</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $no = 1;
                            foreach ($data as $kegiatan) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= tanggal_indo($kegiatan->kegiatanWaktu) ?></td>
                                    <td><?= $kegiatan->agendaKegiatan ?></td>
                                    <td><?= $kegiatan->tempat ?></td>
                                    <td><?= $kegiatan->pic ?></td>
                                    <td><a target="_blank" href="<?= $this->url->get('img/pdfkegiatan/' . $kegiatan->file) ?>">Download
                                            File</a></td>
                                    <td> <?php if ($kegiatan->status == "Dilaksanakan"): ?>
                                            <a href="<?= $this->url->get('kegiatan/ubah/' . $kegiatan->kegiatanID) ?>"
                                               class="btn btn-outline-danger"><?= $kegiatan->status ?></a>
                                        <?php else: ?>
                                            <p class="alert alert-info"><?= $kegiatan->status ?></p>
                                        <?php endif; ?></td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
