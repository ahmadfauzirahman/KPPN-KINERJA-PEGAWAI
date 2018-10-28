<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 12/09/18
 * Time: 18:49
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tema Rapat</label>
                        <select name="tema" id="" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach ($rapat as $item): ?>
                                <option value="<?= $item->rapatID ?>"><?= $item->rapatNama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Rapat</label>
                        <input type="text" class="datepicker form-control" name="tanggalRapat"
                               placeholder="Tanggal Rapat">
                    </div>
                    <div class="form-group">
                        <label for="">Hasil Kesepakatan Rapat</label>
                        <textarea rows="6" cols="30" class="form-control" name="hasilKesepakatanRapat"
                                  placeholder="Hasil Kesepakatan Rapat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Penyelesaian</label>
                        <input type="text" class="datepicker form-control" name="tanggalPenyelesaian"
                               placeholder="Tanggal Penyelesaian">
                    </div>
                    <div class="form-group">
                        <label for="">Unit</label>
                        <select name="unit" id="" class="form-control">
                            <option value="">Pilih Unit</option>
                            <option value="Kasubag Umum">Kasubag Umum</option>
                            <option value="Pencairan Dana">Pencairan Dana</option>
                            <option value="Seksi Bank">Seksi Bank</option>
                            <option value="MSKI">MSKI</option>
                            <option value="VERA">VERA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
