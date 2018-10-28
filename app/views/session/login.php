<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPPN PEKANBARU</title>
    <link rel="icon" href="<?= $this->url->get('img/images.jpeg') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->url->get('') ?>login/css/iofrm-theme13.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700);
        @import url(https://fonts.googleapis.com/css?family=Karla:400,700);
        @import url(https://fonts.googleapis.com/css?family=Rancho);

        .logos {
            font-family: "Rancho";
            font-size: 40px;
        }
    </style>
</head>
<body>
<div class="form-body" class="container-fluid">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <h2 class="text-white"><strong>SeMAKIN </strong> <br></h2>
                <span class="logos text-warning text-capitalize">( sistem monitoring kegiatan internal )</span>
                <h3 class="text-center">KPPN PEKANBARU - RIAU</h3>
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <?php $this->flashSession->output() ?>
                    <div class="page-links">
                        <a href="<?= $this->url->get('') ?>" class="active">Selamat Berkerja, Silahkan Login</a>
                    </div>
                    <form action="" method="post">
                        <input class="form-control" type="text" name="nip" placeholder="Nip Anda" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button">
                            <button type="submit" class="btn btn-warning">Login</button>
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