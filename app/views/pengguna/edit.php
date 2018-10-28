<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 19:47
 */
?>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $data->username ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" class="form-control" name="password" value="<?= $data->password ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nip</label>
                <input type="text" class="form-control" name="nip" value="<?= $data->nip ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $data->username ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">No Hp</label>
                <input type="text" class="form-control" name="nohp" value="<?= $data->nohp ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $data->email ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
