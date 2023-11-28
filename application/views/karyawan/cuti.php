<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layouts/karyawan/head_karyawan') ?>

<body>
    <script src="<?= base_url() ?>assets/static/js/initTheme.js"></script>
    <div id="app">
        <?php $this->load->view('layouts/karyawan/sidebar_karyawan') ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard karyawan</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <section id="multiple-column-form">
                                <div class="row match-height">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <?php if ($this->session->flashdata('error_message')) : ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?= $this->session->flashdata('error_message') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form action="<?= base_url('karyawan/tambahCuti') ?>" method="post" data-parsley-validate>
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="bagian" class="form-label">Bagian</label>
                                                                    <input type="text" id="bagian" class="form-control" name="bagian" placeholder="Bagian" data-parsley-required="true" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="stb" class="form-label">Stb</label>
                                                                    <input type="text" id="stb" class="form-control" name="stb" placeholder="Stb" data-parsley-required="true" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="alamat" class="form-label">Alamat</label>
                                                                    <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" data-parsley-required="true" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tlpn" class="form-label">No.tlp</label>
                                                                    <input type="text" id="tlpn" class="form-control" name="tlpn" placeholder="No.tlp" data-parsley-required="true" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                                                    <input type="date" id="tanggal_pengajuan" class="form-control" name="tanggal_pengajuan" placeholder="Tanggal Pengajuan" data-parsley-required="true" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group mandatory">
                                                                    <label for="tanggal_cuti" class="form-label">Tanggal Cuti</label>
                                                                    <input type="date" id="tanggal_cuti" class="form-control" name="tanggal_cuti" placeholder="Tanggal Cuti" data-parsley-required="true" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Jenis Cuti</label>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="cuti_tahunan" class="form-check-input" name="jenis_cuti[]" value="Cuti Tahunan" checked />
                                                                        <label for="cuti_tahunan" class="form-check-label">Cuti Tahunan</label>
                                                                    </div>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="cuti_anak" class="form-check-input" name="jenis_cuti[]" value="Mengkhitankan Anak" />
                                                                        <label for="cuti_anak" class="form-check-label">Mengkhitankan Anak</label>
                                                                    </div>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="pekerja_menikah" class="form-check-input" name="jenis_cuti[]" value="Pekerja Menikah" />
                                                                        <label for="pekerja_menikah" class="form-check-label">Pekerja Menikah</label>
                                                                    </div>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="babtis_anak" class="form-check-input" name="jenis_cuti[]" value="Membabtis Anak" />
                                                                        <label for="babtis_anak" class="form-check-label">Membabtiskan Anak</label>
                                                                    </div>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="anak_nikah" class="form-check-input" name="jenis_cuti[]" value="Menikahkan anak" />
                                                                        <label for="anak_nikah" class="form-check-label">Menikahkan Anak</label>
                                                                    </div>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="isti_lahiran" class="form-check-input" name="jenis_cuti[]" value="Istri melahirkan/keguguran" />
                                                                        <label for="isti_lahiran" class="form-check-label">Istri melahirkan/keguguran</label>
                                                                    </div>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="keluarga" class="form-check-input" name="jenis_cuti[]" value="Keluarga Meninggal" />
                                                                        <label for="keluarga" class="form-check-label">Suami/istri, anak, meninggal dunia</label>
                                                                    </div>
                                                                    <div class="form-check mandatory">
                                                                        <input type="checkbox" id="anggota_keluarga" class="form-check-input" name="jenis_cuti[]" value="Anggota Keluarga Meninggal" />
                                                                        <label for="anggota_keluarga" class="form-check-label">Semua anggota keluarga meninggal</label>
                                                                    </div>
                                                                    <!-- Add other checkboxes based on your requirements -->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="alasan" class="form-label">Alasan Cuti</label>
                                                                    <input type="text" id="alasan" class="form-control" name="alasan" placeholder="Alasan Cuti" data-parsley-required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                                <button type="reset" onclick="return confirm('Apakah Anda yakin ingin mereset formulir?')" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>

            <?php $this->load->view('layouts/karyawan/footer_karyawan') ?>
        </div>
    </div>
    <?php $this->load->view('layouts/karyawan/script_karyawan') ?>

</body>

</html>