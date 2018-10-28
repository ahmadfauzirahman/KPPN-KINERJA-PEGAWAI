<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 23/09/18
 * Time: 5:55
 */
?>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="" class="col-2">Pilih Nama Rapat</label>
                    <div class="col-10">
                        <select name="namarapat" class="form-control" id="">
                            <option value="">--Pilih Tema Rapat--</option>
                            <?php $namarapat = Rapat::find(['order' => "rapatID DESC"]) ?>
                            <?php foreach ($namarapat as $rapat): ?>
                                <option value="<?= $rapat->rapatID ?>"><?= $rapat->rapatNama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark btn-block" type="submit">Lihat Repot</button>
                </div>
            </form>
        </div>
    </div>
<?php if ($data == null || $data1 == null): ?>
    <div class="card">
        <div class="card-body">
            <label for="" class="text-danger">Tidak Ada Laporan</label>
        </div>
    </div>
<?php else: ?>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Rapat</th>
                <td><?= $data->rapatNama ?></td>
            </tr>
            <tr>
                <th>Tanggal Rapat</th>
                <td><?= date('d/m/Y', strtotime($data->rapatTanggal)) ?></td>
            </tr>
            <tr>
                <th>Rapat Tema</th>
                <td><?= $data->rapatTema ?></td>
            </tr>
            <tr>
                <th>Status Rapat</th>
                <td><?= $data->statusRapat ?></td>
            </tr>
        </table>
    </div>
    <div class="card-body">
        <h2 class="text-center">Repot Tindak Lanjut Rapat</h2>
        <hr>
        <?php foreach ($data1 as $tindaklanjut): ?>
            <div class="card">
                <div class="card-header">
                    <h3><?= $tindaklanjut->hasilKesepatakanRapat ?></h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                            <div class="media align-items-center">
                                <i class="material-icons md-14 align-middle mr-2 text-success">lens</i>
                                <img src="<?= $this->url->get('') ?>img/logo.png"
                                     class="img-fluid rounded-circle mr-1"
                                     width="35" alt="">
                                <div class="media-body lh-1">
                                    <a href="#"><h2>Unit <?= $tindaklanjut->unit ?></h2></a>
                                    <div>
                                        <strong class="text-muted"><?= $tindaklanjut->status ?></strong>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <hr style="background-color: #0096ff;">
        <?php endforeach; ?>
    </div>
<?php endif; ?>