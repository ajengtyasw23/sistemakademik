<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<main id="main" class="main">

    <div class="pagetitle ">
        <h1>KELOLA ABSENSI</h1>
    </div><!-- End Page Title -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAbsen">
        <i class="bi bi-plus"></i> Absen </button>

    <!-- Modal Tambah Absen-->
    <div class="modal fade" id="tambahAbsen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Tambah Absen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('absensi/') ?>" method="post">
                        <div class="mb-3">
                            <label for="tahun_ajaran" class="form-label">Tahun/ Ajaran</label>
                            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran">
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Kelas</label>
                            <select class="form-select" aria-label="" name="kelas" id="kelas">
                                <option selected>Pilih Kelas</option>
                                <option value="Paud A">Paud A</option>
                                <option value="Paud B">Paud B</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select class="form-select" aria-label="" name="hari" id="hari">
                                <option selected>Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="siswa" class="form-label">Nama Siswa</label>
                            <select class="form-select" aria-label="" name="siswa">
                                <option selected disabled>Pilih Siswa</option>
                                <?php foreach ($siswa as $data1) : ?>
                                    <option value="<?= $data1['nama_siswa'] ?>"><?= $data1['nama_siswa'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kehadiran">Kehadiran</label>
                            <div class="d-flex mt-2">
                                <div class="form-check me-1">
                                    <input class="form-check-input" type="radio" name="kehadiran" value="hadir" id="kehadiran1">
                                    <label class="form-check-label" for="kehadiran1">
                                        Hadir
                                    </label>
                                </div>
                                <div class="form-check me-1">
                                    <input class="form-check-input" type="radio" name="kehadiran" value="sakit" id="kehadiran1">
                                    <label class="form-check-label" for="kehadiran1">
                                        Sakit
                                    </label>
                                </div>
                                <div class="form-check ms-1">
                                    <input class="form-check-input" type="radio" name="kehadiran" value="ijin" id="kehadiran2">
                                    <label class="form-check-label" for="kehadiran2">
                                        Ijin
                                    </label>
                                </div>
                                <div class="form-check ms-1">
                                    <input class="form-check-input" type="radio" name="kehadiran" value="alfa" id="kehadiran2">
                                    <label class="form-check-label" for="kehadiran2">
                                        Alfa
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan (Optional)</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- End Modal Tambah Absen -->
    <!-- Modal Ubah Absen-->

    <!-- End Modal Ubah Absen -->
    <!-- end Hapus Absen -->
    <section class="section dashboard shadow p-3 mt-3">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabelku">
                <thead class="bg-success text-white text-center">
                    <tr class="text-center">
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Nama</th>
                        <!-- <th class="text-center">Kelas</th> -->
                        <th class="text-center">Hadir</th>
                        <th class="text-center">Ijin</th>
                        <th class="text-center">Sakit</th>
                        <th class="text-center">Alfa</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($absensi as $data) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $data['tanggal_absen']; ?></td>
                            <td><?= $data['nama_siswa']; ?></td>
                            <!-- <td><?= $data['kelas']; ?></td> -->
                            <?php if ($data['kehadiran'] == 'hadir') { ?>
                                <td class="text-center">✔</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($data['kehadiran'] == 'ijin') { ?>
                                <td></td>
                                <td class="text-center">✔</td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($data['kehadiran'] == 'sakit') { ?>
                                <td></td>
                                <td></td>
                                <td class="text-center">✔</td>
                                <td></td>
                            <?php } elseif ($data['kehadiran'] == 'alfa') { ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">✔</td>
                            <?php } ?>
                            <td><?= $data['keterangan']; ?></td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#ubahAbsen<?= $data['id_absensi'] ?>">Ubah</button>
                                <a href="<?= base_url('absensi/hapus/' . $data['id_absensi']) ?>" class="btn btn-danger btn-sm mb-3 tombol-hapus">Hapus</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="ubahAbsen<?= $data['id_absensi'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Ubah Absen</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('absensi/update/' . $data['id_absensi']) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Siswa</label>
                                                <input type="text" class="form-control" id="nama" value="<?= $data['nama_siswa'] ?>" disabled name="nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tahun_ajaran" class="form-label">Tahun/ Ajaran</label>
                                                <input type="text" class="form-control" id="tahun_ajaran" value="<?= $data['tahun_ajaran'] ?>" name="tahun_ajaran">
                                            </div>
                                            <div class="mb-3">
                                                <label for="hari" class="form-label">Kelas</label>
                                                <select class="form-select" aria-label="" name="kelas" id="kelas">
                                                    <?php if ($data['kelas'] == 'Paud A') { ?>
                                                        <option value="Paud A" selected>Paud A</option>
                                                        <option value="Paud B">Paud B</option>
                                                    <?php } elseif ($data['kelas'] == 'Paud B') { ?>
                                                        <option value="Paud B" selected>Paud B</option>
                                                        <option value="Paud A">Paud A</option>
                                                    <?php } else { ?>
                                                        <option selected>Pilih Kelas</option>
                                                        <option value="Paud A">Paud A</option>
                                                        <option value="Paud B">Paud B</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="hari" class="form-label">Hari</label>
                                                <select class="form-select" aria-label="" name="hari" id="hari">
                                                    <option value="<?= $data['hari_absen'] ?>" selected><?= $data['hari_absen'] ?></option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" value="<?= $data['tanggal_absen'] ?>" name="tanggal">
                                            </div>

                                            <div class="mb-3">
                                                <label for="kehadiran">Kehadiran</label>
                                                <div class="d-flex mt-2">
                                                    <div class="form-check me-1">
                                                        <?php if ($data['kehadiran'] == 'hadir') {  ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="hadir" id="kehadiran1" checked>
                                                        <?php } else { ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="hadir" id="kehadiran1">
                                                        <?php } ?>
                                                        <label class="form-check-label" for="kehadiran1">
                                                            Hadir
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-1">
                                                        <?php if ($data['kehadiran'] == 'sakit') {  ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="sakit" id="kehadiran1" checked>
                                                        <?php } else { ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="sakit" id="kehadiran1">
                                                        <?php } ?>

                                                        <label class="form-check-label" for="kehadiran1">
                                                            Sakit
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-1">
                                                        <?php if ($data['kehadiran'] == 'ijin') {  ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="ijin" id="kehadiran2" checked>
                                                        <?php } else { ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="ijin" id="kehadiran2">
                                                        <?php } ?>
                                                        <label class="form-check-label" for="kehadiran2">
                                                            Ijin
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-1">
                                                        <?php if ($data['kehadiran'] == 'alfa') {  ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="alfa" id="kehadiran2" checked>
                                                        <?php } else { ?>
                                                            <input class="form-check-input" type="radio" name="kehadiran" value="alfa" id="kehadiran2">
                                                        <?php } ?>
                                                        <label class="form-check-label" for="kehadiran2">
                                                            Alfa
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $data['keterangan']; ?></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </section>

</main><!-- End #main -->