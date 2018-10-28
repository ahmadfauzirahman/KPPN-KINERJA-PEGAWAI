<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 19:55
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPPN PEKANBARU</title>
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/iofrm-theme1.css">
</head>
<body>
<div class="form-body" class="container-fluid">
    <div class="website-logo">
        <a href="index.html">
            <div class="logo">
                <img class="logo-size" src="<?= $this->url->get('') ?>login/images/logo-light.svg" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">

            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Get more things done with Loggin platform.</h3>
                    <p>Access to the most powerfull tool in the entire design and web industry.</p>
                    <div class="page-links">
                        <a href="<?= $this->url->get('') ?>" class="active">Login</a>
                    </div>
                    <form>
                        <input class="form-control" type="text" name="nip" placeholder="Nip" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= $this->url->get('') ?>login/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= $this->url->get('') ?>login/js/popper.min.js"></script>
<script type="text/javascript" src="<?= $this->url->get('') ?>login/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $this->url->get('') ?>login/js/main.js"></script>
</body>
</html>
