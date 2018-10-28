<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 23:22
 */
?>
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-4 mb-3 bg-white border-bottom">
                    <div class="container-fluid container-account">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="media media-user-info align-items-center">
                                    <img src="<?= $this->url->get('') ?>img/logo.png"
                                         class="img-fluid rounded-circle mr-3" width="60" alt="">
                                    <div class="media-body lh-1">
                                        <p class="h4 m-0"><?= $this->session->get('username') ?></p>
                                        <p class="text-muted mb-0"><?= $this->session->get('hak_akses') ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-md-flex align-items-center justify-content-end">
                                <p class="mb-0 mr-3">
                                    <i class="material-icons md-18 align-middle text-primary">event_available</i>
                                    Last Login Date: <strong><?= date('d/m/Y') ?></strong>
                                </p>
                                <p class="mb-0">
                                    <i class="material-icons md-18 align-middle text-primary">access_time</i>
                                    Last Login Time: <strong><?= date('H:i:s') ?></strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-account">
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label>Nama Lengkap</label>
                                            <div class="input-group input-group--inline">
                                                <div class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </div>
                                                <input type="text" class="form-control" name="firstname"
                                                       placeholder="<?= $this->session->get('username') ?>"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Nip</label>
                                            <div class="input-group input-group--inline">
                                                <div class="input-group-addon">
                                                    <i class="material-icons"> card_membership </i>
                                                </div>
                                                <input type="text" class="form-control" name="lastname"
                                                       placeholder="<?= $this->session->get('nip') ?>"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="instant-messaging">Email</label>
                                            <div class="input-group input-group--inline">
                                                <div class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </div>
                                                <input type="text" class="form-control" name="instant-messaging"
                                                       placeholder="<?= $this->session->get('email') ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="instant-messaging">Alamat</label>
                                            <div class="input-group input-group--inline">
                                                <div class="input-group-addon">
                                                    <i class="material-icons">address</i>
                                                </div>
                                                <input type="text" class="form-control" name="instant-messaging"
                                                       placeholder="<?= $this->session->get('alamat') ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
