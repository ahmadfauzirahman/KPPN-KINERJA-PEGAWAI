<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 20:48
 */
?>
<h2><?php $this->flashSession->output() ?></h2>
<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Rapat</label>
                <input type="text" class="form-control" name="rapatNama" placeholder="Nama Rapat">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Rapat</label>
                <input type="text" class="datepicker form-control" name="rapatTanggal" placeholder="Tanggal Rapat">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tema Rapat</label>
                <textarea name="rapatTema" id="" cols="30" rows="4" class="form-control"
                          placeholder="Tema Rapat"></textarea>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlInput1" class="col-2">Upload PDF <code>yg berisi foto rapat dan nota dinas</code></label>
                <div class="col-10">
                    <input type="file" name="file">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary btn-block" type="submit">Simpan Data Rapat</button>
            </div>
        </form>
    </div>
</div>
