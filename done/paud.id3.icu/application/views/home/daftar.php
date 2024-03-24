<!--====== Start Hero Area ======-->
<section class="hero-area hero-v1" style="background-image: url(<?= base_url('') ?>assets/assets_homePage/img/hero/app-overview-main-bg.png);">
    <div class="container">
        <div class="hero-internal">
            <div class="section-particle-effect d-none d-md-block">
                <img class="particle-1 animate-zoom-fade" src="<?= base_url() ?>assets/assets_homePage/img/particle/particle-1.png" alt="particle One">
                <img class="particle-3 animate-zoominout" src="<?= base_url() ?>assets/assets_homePage/img/particle/particle-3.png" alt="particle Three">
                <img class="particle-4 animate-zoominout" src="<?= base_url() ?>assets/assets_homePage/img/particle/particle-4.png" alt="particle Four">
                <img class="particle-5 animate-zoominout" src="<?= base_url() ?>assets/assets_homePage/img/particle/particle-5.png" alt="particle Five">
                <img class="particle-2 animate-float-bob-y" src="<?= base_url() ?>assets/assets_homePage/img/particle/particle-2.png" alt="particle Two">
                <img class="particle-6 animate-zoom-fade" src="<?= base_url() ?>assets/assets_homePage/img/particle/particle-6.png" alt="particle Six">
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="mb-3">
                            <h3 class="text-center">MENDAFTAR</h3>
                            <h5 class="text-center">SISTEM INFORMASI AKADEMIK KOBER PAUD DARUSHOWAAB</h5>
                        </div>
                        <form class="row g-3 needs-validation" action="<?= base_url('home/daftar') ?>" method="post" enctype="multipart/form-data">
                            <div class="col-lg-6 col-md-6 col-am-10">
                                <div class="mb-3">
                                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jk">Jenis Kelamin</label>
                                    <div class="d-flex mt-2">
                                        <div class="form-check me-1">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check ms-1">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Perempuan
                                            </label>
                                        </div>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="anak_ke" class="form-label">Anak ke-</label>
                                    <input type="number" min="0" class="form-control" id="anak_ke" name="anak_ke" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jml_saudara" class="form-label">Jumlah Saudara Kandung</label>
                                    <input type="number" min="0" class="form-control" id="jml_saudara" name="jml_saudara" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-am-10">
                                <div class="mb-3">
                                    <label for="ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="ayah" name="nama_ayah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="ibu" name="nama_ibu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp_ortu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_ortu" class="form-label">Alamat Orang Tua</label>
                                    <textarea name="alamat_ortu" id="alamat" cols="25" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-danger">Kembali</button> -->
                                    <a href="<?= base_url('home') ?>" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-success ms-3">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div> <!-- /.col-lg-10 -->
            </div> <!-- /.row -->
        </div> <!-- /.section-internal -->
    </div> <!-- /.container-->
</section> <!-- /.hero-area -->