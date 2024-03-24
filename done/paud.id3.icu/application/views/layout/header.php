<?php
$role = $this->session->userdata('role');
$user_id = $this->session->userdata('user_id');
if ($role == 'siswa') {
    $user = $this->db->get_where('siswa', ['id_siswa' => $user_id])->row_array();
} elseif ($role == 'guru') {
    $user   = $this->db->get_where('guru', ['id_guru' => $user_id])->row_array();
} elseif ($role == 'kepsek') {
    $user   = $this->db->get_where('kepsek', ['id_kepsek' => $user_id])->row_array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - SI PAUD</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap5.min.css">
    <link href="<?= base_url() ?>assets/vendor/calendar/dist/zabuto_calendar.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo.png">

</head>

<body class="mb-5">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">SI-PAUD</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Tittle -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <?php if ($role == 'siswa') { ?>
                            <img src="<?= base_url() ?>upload/siswa/<?= $user['foto'] ?>" alt="Profile" class="rounded-circle" style="height: 40px;width:35px">
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['nama_siswa']; ?></span>
                        <?php } elseif ($role == 'guru') { ?>
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['nama_guru']; ?></span>

                        <?php } elseif ($role == 'kepsek') { ?>
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['nama_kepsek']; ?></span>

                        <?php } ?>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <?php if ($role == 'siswa') { ?>
                                <h6><?= $user['nama_siswa']; ?></h6>
                                <span><?= $role; ?></span>
                            <?php } elseif ($role == 'guru') {  ?>
                                <h6><?= $user['nama_guru']; ?></h6>
                                <span><?= $role; ?></span>
                            <?php } elseif ($role == 'kepsek') {  ?>
                                <h6><?= $user['nama_kepsek']; ?></h6>
                                <span><?= $role; ?></span>
                            <?php } ?>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile') ?>">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('home/logout') ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('dashboard') ?>">
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <?php if ($role == 'guru') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('siswa') ?>">
                        <i class="bi bi-people-fill"></i>
                        <span>Kelola Data Siswa</span>
                    </a>
                </li><!-- End Kelola Data Siswa Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('guru') ?>">
                        <i class="bi bi-people-fill"></i>
                        <span>Kelola Data Guru</span>
                    </a>
                </li><!-- End Kelola Data guru Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('absensi') ?>">
                        <i class="bi bi-person-check-fill"></i>
                        <span>Kelola Absensi</span>
                    </a>
                </li><!-- End Kelola Absensi Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('nilai') ?>">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Kelola Nilai</span>
                    </a>
                </li><!-- End Register Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('jadwal') ?>">
                        <i class="bi bi-calendar-week-fill"></i>
                        <span>Kelola Jadwal</span>
                    </a>
                </li><!-- End Membuat Jadwal Nav -->
            <?php } ?>
            <?php if ($role == 'guru' || $role == 'kepsek') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('laporan') ?>">
                        <i class="bi bi-file-earmark-break-fill
          "></i>
                        <span>Kelola Laporan</span>
                    </a>
                </li><!-- End Kelola Laporan Nav -->
            <?php } ?>
            <?php if ($role == 'siswa') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('jadwal/lihat') ?>">
                        <i class="bi bi-calendar-week-fill"></i>
                        <span>Lihat Jadwal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('rapor') ?>">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Lihat Raport</span>
                    </a>
                </li>
            <?php } ?>

        </ul>
    </aside><!-- End Sidebar-->