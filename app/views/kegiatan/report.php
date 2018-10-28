<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 23/09/18
 * Time: 11:57
 */
function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari',
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
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="input-group input-daterange">
                <input type="text" class="form-control" name="tanggal1" placeholder="<?= date('Y-m-d') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">to</div>
                </div>
                <input type="text" class="form-control" name="tanggal2" placeholder="<?= date('Y-m-d') ?>">
            </div>
            <br>
            <button class="btn btn-primary btn-block" type="submit">Filter</button>
        </form>
    </div>
</div>
<div class="card">
    <hr>
    <button onclick="printContent('p1')" class="btn btn-danger btn-block btn-lg"><i
                class="fa fa-file-pdf-o"></i> Print PDF
    </button>
    <hr>
    <div class="card-body" id="p1">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Waktu Kegiatan</th>
                <th>Agenda Kegiatan</th>
                <th>Tempat</th>
                <th>Penanggung Jawab</th>
                <th>Anggaran</th>
                <th>File Kegiatan</th>
            </tr>
            </thead>
            <tbody>
            <?php $no = 1;
            foreach ($dataKegiatan as $data): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= tgl_indo($data->kegiatanWaktu) ?></td>
                    <td><?= $data->agendaKegiatan ?></td>
                    <td><?= $data->tempat ?></td>
                    <td><?= $data->pic ?></td>
                    <td><?= $data->anggarandana ?></td>
                    <th><a href="<?= $this->url->get('img/pdfkegiatan/' . $data->file) ?>">Download File</a></th>
                </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>