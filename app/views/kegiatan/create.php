<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 09/09/18
 * Time: 8:10
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2><?php $this->flashSession->output() ?></h2>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Waktu Kegiatan Yang Akan Dilaksanakan</label>
                        <input type="text" class="datepicker form-control" name="waktu" placeholder="Tanggal Kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="">Agenda Kegiatan</label>
                        <textarea name="agenda" id="" cols="30" rows="5" class="form-control"
                                  placeholder="Deskripsi Agenda Kegiatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat</label>
                        <input type="text" placeholder="Tempat Kegiatan" name="tempat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">PIC</label>
                        <input type="text" placeholder="Penanggung Jawab" name="pic" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Anggaran</label>
                        <textarea name="anggarandana" id="" cols="30" rows="10" class="form-control"
                                  placeholder="Dana Anggaran"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Lampiran Kegiatan</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary btn-block" type="submit">Simpan Data Kegiatan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
