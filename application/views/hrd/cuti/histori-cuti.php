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
                <h3>Dashboard hrd</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <section class="section">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            Simple Datatable
                                        </h5>
                                    </div>
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
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Ambil data cuti dari model
                                                $data_cuti = $this->cuti_model->getAllCuti();

                                                // Loop untuk menampilkan setiap baris data
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
                                                            <?php if ($cuti->status == 1) : ?>
                                                                <span class="badge bg-success">Approved</span>
                                                            <?php elseif ($cuti->status == 2) : ?>
                                                                <span class="badge bg-danger">Rejected</span>
                                                            <?php else : ?>
                                                                <span class="badge bg-warning">Pending</span>
                                                            <?php endif; ?>
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