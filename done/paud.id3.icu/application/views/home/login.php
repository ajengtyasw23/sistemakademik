<div class="pesan2" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<!-- <div class="pesan2" data-flashdata="Pendaftaran Berhasil"></div> -->
<section class="hero-area hero-v1" style="background-image: url(<?= base_url() ?>assets/assets_homePage/img/hero/app-overview-main-bg.png);">
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
                <div class="col-lg-5 col-sm-8">
                    <div class="card p-4">
                        <div class="mb-3">
                            <h3 class="text-center">LOGIN</h3>
                            <h5 class="text-center">SISTEM INFORMASI AKADEMIK KOBER PAUD DARUSHOWAAB</h5>
                        </div>
                        <!-- <form action="" method="post"> -->
                        <?= $this->session->flashdata('message'); ?>
                        <form class="row g-3 needs-validation" novalidate action="<?= base_url('home/login') ?>" method="post">

                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" name="username" class="form-control" id="yourUsername" required>
                                    <div class="invalid-feedback">Please enter your username.</div>
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                                <a href="<?= base_url('home') ?>" class="btn btn-danger w-100 mt-3">Kembali</a>
                            </div>
                        </form>

                    </div>
                </div> <!-- /.col-lg-10 -->
            </div> <!-- /.row -->
        </div> <!-- /.section-internal -->
    </div> <!-- /.container-->
</section> <!-- /.hero-area -->
<!--====== End Hero Area ======-->