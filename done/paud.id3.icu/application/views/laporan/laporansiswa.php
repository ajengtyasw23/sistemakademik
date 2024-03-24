<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Siswa</title>
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
            margin-right: 10px;
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 5px 5px;
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
            <h1 style="margin-bottom: 0;margin-top: 30px;">LAPORAN DATA SISWA</h1>
            <h1 style="margin: 0;">KOBER PAUD DARUSHOWAAB</h1>
        </center>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Nama Siswa</th>
                    <th>Username</th>
                    <th>Tahun Ajaran</th>
                    <th>Jenis Kelamin</th>
                    <th>TTL</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Jumlah Saudara</th>
                    <th>Anak Ke</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($siswa as $data) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_siswa']; ?></td>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['tahun_ajaran']; ?></td>
                        <td><?= $data['jenis_kelamin']; ?></td>
                        <td><?= $data['tempat_lahir']; ?>, <?= $data['tanggal_lahir']; ?></td>
                        <td><?= $data['nama_ayah']; ?></td>
                        <td><?= $data['nama_ibu']; ?></td>
                        <td><?= $data['jml_saudara']; ?></td>
                        <td><?= $data['anak_ke']; ?></td>
                        <td><?= $data['no_telp_ortu']; ?></td>
                        <td><?= $data['alamat_ortu']; ?></td>
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