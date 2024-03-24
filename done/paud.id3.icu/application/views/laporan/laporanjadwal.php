<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Pembayaran SPP</title>
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
            <h1 style="margin-bottom: 0;margin-top: 30px;">LAPORAN DATA JADWAL</h1>
            <h1 style="margin: 0;">KOBER PAUD DARUSHOWAAB</h1>
        </center>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelajaran</th>
                    <th>Guru</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jadwal as $data) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['pelajaran']; ?></td>
                        <td> <?= $data['nama_guru']; ?></td>
                        <td><?= $data['hari']; ?></td>
                        <td> <?= $data['jam_mulai']; ?></td>
                        <td> <?= $data['jam_selesai']; ?></td>

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