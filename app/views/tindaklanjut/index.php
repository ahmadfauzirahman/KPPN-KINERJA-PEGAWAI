<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 22:38
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
                <h2> Data Tindak Lanjut Rapat</h2>
                <a href="<?= $this->url->get('tindaklanjut/tambah') ?>" class="btn btn-outline-primary btn-block">Tambah
                    Data</a>
                <hr>
                <?php $this->flashSession->output() ?>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="py-4">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Upload Dokumen</th>
                                    <th>Status</th>
                                    <th>Tema</th>
                                    <th>Tanggal Rapat</th>
                                    <th>Hasil Kesepakatan Rapat</th>
                                    <th>Tanggal Penyelesaian</th>
                                    <th>Unit</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Upload Dokumen</th>
                                    <th>Status</th>
                                    <th>Tema</th>
                                    <th>Tanggal Rapat</th>
                                    <th>Hasil Kesepakatan Rapat</th>
                                    <th>Tanggal Penyelesaian</th>
                                    <th>Unit</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $no = 1;
                                foreach ($data as $datum): ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><a href="<?= $this->url->get('tindaklanjut/upload') ?>">Upload Dokumen</a></td>
                                        <td><?= $datum->status ?></td>
                                        <td><?= Rapat::findFirstByRapatID($datum->tema)->rapatNama ?></td>
                                        <td><?= tanggal_indo($datum->tanggalRapat) ?></td>
                                        <td><?= $datum->hasilKesepatakanRapat ?></td>
                                        <td><?= tanggal_indo($datum->tanggalPenyelesaian) ?></td>
                                        <td><?= $datum->unit ?></td>

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
</div>
