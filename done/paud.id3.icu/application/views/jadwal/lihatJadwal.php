<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-PAUD | SISWA </title>
    <!--====== Bootstrap ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/bootstrap.min.css">
    <!--====== Font Awesome ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/fonts/fontawesome/css/all.min.css">
    <!--====== Flaticon ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/fonts/flaticon/flaticon.css">
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/magnific-popup.min.css">
    <!--====== Slick Slider ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/slick.css">
    <!--====== Nice Select  ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/nice-select.css">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/default.css">
    <!--====== Main Stylesheet ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/style.css">
    <!--====== Responsive Stylesheet ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_homePage/css/responsive.css">
    <!-- Place favicon in the root directory -->
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo.png">
</head>

<body>
    <!--====== Start Hero Area ======-->
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
                <div class="text-center">
                    <h3>JADWAL PELAJARAN</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-8 px-5 py-5">
                        <div class="card ">
                            <ul class="list-group text-center">
                                <li class="list-group-item fw-bold h5 text-center bg-primary text-white">Senin</li>
                                <?php foreach ($senin as $data1) { ?>
                                    <li class="list-group-item"><?= $data1['pelajaran']; ?> [<?= $data1['jam_mulai']; ?> - <?= $data1['jam_selesai']; ?>]</li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 px-5 py-5">
                        <div class="card ">
                            <ul class="list-group text-center">
                                <li class="list-group-item fw-bold h5 text-center bg-primary text-white">Selasa</li>
                                <?php foreach ($selasa as $data2) { ?>
                                    <li class="list-group-item"><?= $data2['pelajaran']; ?> [<?= $data2['jam_mulai']; ?> - <?= $data2['jam_selesai']; ?>]</li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 px-5 py-5">
                        <div class="card ">
                            <ul class="list-group text-center">
                                <li class="list-group-item fw-bold h5 text-center bg-primary text-white">Rabu</li>
                                <?php foreach ($rabu as $data3) { ?>
                                    <li class="list-group-item"><?= $data3['pelajaran']; ?> [<?= $data3['jam_mulai']; ?> - <?= $data3['jam_selesai']; ?>]</li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 px-5 py-5">
                        <div class="card ">
                            <ul class="list-group text-center">
                                <li class="list-group-item fw-bold h5 text-center bg-primary text-white">Kamis</li>
                                <?php foreach ($kamis as $data4) { ?>
                                    <li class="list-group-item"><?= $data4['pelajaran']; ?> [<?= $data4['jam_mulai']; ?> - <?= $data4['jam_selesai']; ?>]</li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 px-5 py-5">
                        <div class="card ">
                            <ul class="list-group text-center">
                                <li class="list-group-item fw-bold h5 text-center bg-primary text-white">Jumat</li>
                                <?php foreach ($jumat as $data5) { ?>
                                    <li class="list-group-item"><?= $data5['pelajaran']; ?> [<?= $data5['jam_mulai']; ?> - <?= $data5['jam_selesai']; ?>]</li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div> <!-- /.row -->
                <a href="<?= base_url('dashboard') ?>" class="btn btn-danger"> Kembali</a>
            </div> <!-- /.section-internal -->
        </div> <!-- /.container-->
    </section> <!-- /.hero-area -->
    <!--====== End Hero Area ======-->

    <!--====== End Footer Area ======-->
    <!--======= Scroll To Top =======-->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!--====== Optional Javascript ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/jquery-3.6.0.min.js"></script>
    <!--====== Popper JS ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/popper.min.js"></script>
    <!--====== Bootstrap JS ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/bootstrap.min.js"></script>
    <!--====== Slick Slider JS ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/slick.min.js"></script>
    <!--====== Wow JS ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/wow.js"></script>
    <!--====== Nice Select ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/jquery.nice-select.min.js"></script>
    <!--====== Counter Up JS ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/jquery.counterup.min.js"></script>
    <!--====== Magnific Popup JS ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/jquery.magnific-popup.min.js"></script>
    <!--====== Waypoint JS ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/jquery.waypoints.js"></script>
    <!--====== Main Script ======-->
    <script src="<?= base_url() ?>assets/assets_homePage/js/main.js"></script>
</body>

</html>