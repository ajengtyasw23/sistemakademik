<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Absensi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @page {
            size: A4
        }

        h1 {
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            font-size: 15px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            /* padding: 3px 3px; */
            border: 1px solid #000000;
            font-size: 13px;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        hr {
            color: #000000;
            line-height: 2em;
        }
    </style>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <center>
            <h1 style="margin-bottom: 0;margin-top: 30px;">LAPORAN DATA ABSENSI</h1>
            <h1 style="margin: 0;">KOBER PAUD DARUSHOWAAB</h1>
        </center>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Hari/Tanggal</th>
                    <th>Kehadiran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($absensi as $data) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_siswa']; ?></td>
                        <td><?= $data['kelas']; ?></td>
                        <td><?= $data['tahun_ajaran']; ?></td>
                        <td><?= $data['hari_absen']; ?>, <?= $data['tanggal_absen']; ?></td>
                        <td><?= $data['kehadiran']; ?></td>
                        <td><?= $data['keterangan']; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </section>
</body>

<script>
    window.print()
</script>

</html>