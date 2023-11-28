<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layouts/admin/head_admin') ?>

<body>
    <script src="<?= base_url() ?>assets/static/js/initTheme.js"></script>
    <div id="app">
        <?php $this->load->view('layouts/admin/sidebar_admin') ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="page-heading">
                                <div class="page-title">
                                    <div class="row">
                                        <div class="col-12 col-md-6 order-md-1 order-last">
                                            <h3><i class="fas fa-fw fa-users"></i> Data User</h3>
                                        </div>
                                        <div class="col-12 col-md-6 order-md-2 order-first">
                                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Data User</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <section class="section">
                                    <div class="card">
                                        <div class="card-header">
                                            <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
                                                <i class="fas fa-fw fa-plus"></i> Add Data User
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th>Level</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Ambil data pengguna dari database
                                                    $users = $this->db->get('tbuser')->result();

                                                    // Loop untuk setiap baris pengguna
                                                    foreach ($users as $index => $user) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $index + 1 ?></td>
                                                            <td><?= $user->username ?></td>
                                                            <td><?= $user->password ?></td>
                                                            <td><?= $user->level ?></td>
                                                            <td>
                                                                <!-- Tambahkan tombol aksi sesuai kebutuhan -->
                                                                <a href="#" class="btn btn-info btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
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
            <?php $this->load->view('layouts/admin/footer_admin') ?>
            <!-- Modal Tambah -->
            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Auth/tambahUser') ?>" method="post">
                                <div class="form-group">
                                    <label for="basicInput">Username</label>
                                    <input type="text" name="username" class="form-control" id="basicInput" placeholder="Enter username" required>
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">Password</label>
                                    <input type="password" name="password" class="form-control" id="helpInputTop" placeholder="Enter password" required>
                                </div>

                                <fieldset class="form-group">
                                    <label for="level">Level</label>
                                    <select class="form-select" name="level" id="level" required>
                                        <option value="admin">Admin</option>
                                        <option value="hrd">HRD</option>
                                        <option value="karyawan">Karyawan</option>
                                    </select>
                                </fieldset>

                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ms-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Accept</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts/admin/script_admin') ?>

</body>

</html>