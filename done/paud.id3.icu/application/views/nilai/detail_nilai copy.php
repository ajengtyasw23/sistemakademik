<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raport Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <table class="container mt-5">
        <tr>
            <td>
                <h4 class="fw-bold text-center">LAPORAN PERKEMBANGAN PESERTA DIDIK PENDIDIKAN <br> ANAK USIA DINI KELOMPOK USIA 5-6 TAHUN </h4>
            </td>
        </tr>
    </table>
    <table class="container w-100 mt-3 text-start">
        <tr class="">
            <td width="14%">SEMESTER</td>
            <td width="2%">:</td>
            <td><?= $nilai['semester']; ?></td>
            <td width="20%">TAHUN AJARAN</td>
            <td width="1%">:</td>
            <td><?= $nilai['tahun_ajaran']; ?></td>
        </tr>
        <tr>
            <td width="14%">NAMA ANAK</td>
            <td width="2%">:</td>
            <td><?= $nilai['nama_siswa']; ?></td>
            <td width="14%">NO INDUK / NISN</td>
            <td width="2%">:</td>
            <td></td>
        </tr>
    </table>
    <table class="table table-bordered container align-middle mt-3">
        <tr class="text-center align-item-center">

            <th rowspan="2" colspan="2">LINGKUP PENGEMBANGAN DAN KOMPETENSI DASAR</th>
            <th rowspan="2">INDIKATOR</th>
            <th colspan="4">CAPAIAN PERKEMBANGAN ANAK</th>
        </tr>
        <tr class="text-center align-item-center">
            <td style="width: 50px ;" class="text-center">BB</td>
            <td style="width: 50px ;" class="text-center">MB</td>
            <td style="width: 50px ;" class="text-center">BSH</td>
            <td style="width: 50px ;" class="text-center">BSB</td>
        </tr>
        <?php
        $no = 1;
        foreach ($detail_nilai as $data) :
        ?>
            <tr>

                <td><?= $no++; ?></td>
                <td><?= $data['lpkd']; ?></td>

                <td><?= $data['indikator']; ?></td>
                <?php if ($data['cpa'] == 'bb') { ?>
                    <td style="width: 50px ;" class="text-center"><i class="bi bi-check-lg"></i></td>
                <?php } else { ?>
                    <td style="width: 50px ;" class="text-center"></td>
                <?php } ?>
                <?php if ($data['cpa'] == 'mb') { ?>
                    <td style="width: 50px ;" class="text-center"><i class="bi bi-check-lg"></i></td>
                <?php } else { ?>
                    <td style="width: 50px ;" class="text-center"></td>
                <?php } ?>
                <?php if ($data['cpa'] == 'bsh') { ?>
                    <td style="width: 50px ;" class="text-center"><i class="bi bi-check-lg"></i></td>
                <?php } else { ?>
                    <td style="width: 50px ;" class="text-center"></td>
                <?php } ?>
                <?php if ($data['cpa'] == 'bsb') { ?>
                    <td style="width: 50px ;" class="text-center"><i class="bi bi-check-lg"></i></td>
                <?php } else { ?>
                    <td style="width: 50px ;" class="text-center"></td>
                <?php } ?>


            </tr>
        <?php endforeach ?>

    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>