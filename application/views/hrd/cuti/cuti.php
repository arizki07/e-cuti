<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layouts/hrd/head_hrd') ?>

<body>
    <script src="<?= base_url() ?>assets/static/js/initTheme.js"></script>
    <div id="app">
        <?php $this->load->view('layouts/hrd/sidebar_hrd') ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Pengajuan Cuti</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Success!</h4>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        </div>
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Failed!</h4>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <section class="section">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>id_user</th>
                                                    <th>Bagian</th>
                                                    <th>STB</th>
                                                    <th>Alamat</th>
                                                    <th>Tlpn</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Tanggal Cuti</th>
                                                    <th>Jenis Cuti</th>
                                                    <th>Alasan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $data_cuti = $this->cuti_model->getAllCuti();
                                                $data_cuti = $this->cuti_model->getPendingCuti(); // Menggunakan fungsi baru
                                                foreach ($data_cuti as $index => $cuti) :
                                                ?>
                                                    <tr>
                                                        <td><?= $index + 1 ?></td>
                                                        <td><?= $cuti->id_user ?></td>
                                                        <td><?= $cuti->bagian ?></td>
                                                        <td><?= $cuti->stb ?></td>
                                                        <td><?= $cuti->alamat ?></td>
                                                        <td><?= $cuti->tlpn ?></td>
                                                        <td><?= $cuti->tanggal_pengajuan ?></td>
                                                        <td><?= $cuti->tanggal_cuti ?></td>
                                                        <td><?= $cuti->jenis_cuti ?></td>
                                                        <td><?= $cuti->alasan ?></td>
                                                        <td>
                                                            <form action="<?= base_url('hrd/insert_approve/' . $cuti->id); ?>" method="post">
                                                                <button type="submit" class="btn btn-success">Approve</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="<?= base_url('hrd/insert_reject/' . $cuti->id); ?>" method="post">
                                                                <button type="submit" class="btn btn-danger">Reject</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>

            <?php $this->load->view('layouts/hrd/footer_hrd') ?>
        </div>
    </div>
    <?php $this->load->view('layouts/hrd/script_hrd') ?>

</body>

</html>