<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 23/09/18
 * Time: 14:18
 */
?>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Tema</th>
                <th>Hasil Kesepakatan Rapat</th>
                <th>Tanggal Penyelesaian</th>
                <th>Status</th>
                <th>Unit</th>
            </tr>
            <?php $no = 1;
            foreach ($detail as $dashboard): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= Rapat::findFirstByRapatID($dashboard->tema)->rapatNama ?></td>
                    <td><?= $dashboard->hasilKesepatakanRapat ?></td>
                    <td><?= $dashboard->tanggalPenyelesaian ?></td>
                    <td><?= $dashboard->status ?></td>
                    <td><?= $dashboard->unit ?></td>
                </tr>
                <?php $no++; endforeach; ?>
        </table>
    </div>
</div>
