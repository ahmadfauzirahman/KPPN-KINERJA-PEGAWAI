<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 19:23
 */
?>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nip</label>
                <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">No Hp</label>
                <input type="text" class="form-control" name="nohp" placeholder="No Handphone">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Hak Akses</label>
                <select name="hak_akses" id="" class="form-control">
                    <option value="">Pilih Hak Akses</option>
                    <option value="Admin">Admin</option>
                    <option value="Kasubag Umum">Kasubag Umum</option>
                    <option value="Pencairan Dana">Pencairan Dana</option>
                    <option value="Seksi Bank">Seksi Bank</option>
                    <option value="MSKI">MSKI</option>
                    <option value="VERA">VERA</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
