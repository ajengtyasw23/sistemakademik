<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<main id="main" class="main">

    <div class="pagetitle ">
        <h1>JADWAL PELAJARAN</h1>
    </div><!-- End Page Title -->

    <!-- Modal -->
    <div class="modal fade" id="tambahPelajaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pelajaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('jadwal/tambah_mapel/') ?>" method="post">
                        <div class="mb-3">
                            <label for="kode_pelajaran" class="form-label">Kode Pelajaran</label>
                            <input type="text" class="form-control" id="kode_pelajaran" name="kode_pelajaran">
                        </div>
                        <div class="mb-3">
                            <label for="pelajaran" class="form-label">Pelajaran</label>
                            <input type="text" class="form-control" id="pelajaran" name="pelajaran">
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
    <div class="modal fade" id="tambahJadwal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jadwal Pelajaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('jadwal/') ?>" method="post">
                        <div class="mb-3">
                            <label for="kode_pelajaran" class="form-label">Pelajaran</label>
                            <select class="form-select" aria-label="" name="pelajaran" id="pelajaran">
                                <option selected disabled>Pilih Mata Pelajaran</option>
                                <?php foreach ($mapel as $data) : ?>
                                    <option value="<?= $data['id_pelajaran'] ?>"><?= $data['pelajaran'] ?></option>
                                <?php endforeach ?>
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
                                <option value="Jumat">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <div class="d-flex">
                                <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai">
                                <span class="mx-3">Sampai</span>
                                <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="guru" class="form-label">Guru</label>
                            <select class="form-select" aria-label="" name="guru">
                                <option selected disabled>Pilih Guru</option>
                                <?php foreach ($guru as $data1) : ?>
                                    <option value="<?= $data1['id_guru'] ?>"><?= $data1['nama_guru'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>

                            <button type="submit" class="btn btn-success ms-3">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-end">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJadwal">
                <i class="bi bi-plus"></i> Jadwal Pelajaran </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPelajaran">
                <i class="bi bi-plus"></i>Pelajaran </button>
        </div>

    </div>
    <section class="section dashboard shadow p-3 mt-3">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabelku">
                <thead class="bg-success text-white text-center">
                    <tr class="text-center">
                        <th class="text-center">No</th>
                        <th class="text-center">Pelajaran</th>
                        <th class="text-center">Guru</th>
                        <th class="text-center">Hari</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jadwal as $data) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $data['pelajaran'] ?></td>
                            <td><?= $data['nama_guru'] ?></td>
                            <td><?= $data['hari'] ?></td>
                            <td><?= $data['jam_mulai'] ?> - <?= $data['jam_selesai'] ?></td>
                            <td class="text-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ubah_jadwal<?= $data['id_jadwal_pelajaran'] ?>" class="btn btn-info btn-sm mb-3">Ubah</a>
                                <a href="<?= base_url('jadwal/hapus/' . $data['id_jadwal_pelajaran']) ?>" class="btn btn-danger btn-sm mb-3 tombol-hapus">Hapus</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="ubah_jadwal<?= $data['id_jadwal_pelajaran'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jadwal Pelajaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('jadwal/ubah/' . $data['id_jadwal_pelajaran']) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="kode_pelajaran" class="form-label">Pelajaran</label>
                                                <select class="form-select" aria-label="" name="pelajaran" id="pelajaran">
                                                    <option value="<?= $data['id_pelajaran'] ?>" selected><?= $data['pelajaran'] ?></option>
                                                    <?php foreach ($mapel as $data2) : ?>
                                                        <option value="<?= $data2['id_pelajaran'] ?>"><?= $data2['pelajaran'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="hari" class="form-label">Hari</label>
                                                <select class="form-select" aria-label="" name="hari" id="hari">
                                                    <option value="<?= $data['hari'] ?>" selected><?= $data['hari'] ?></option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jum'at</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="waktu" class="form-label">Waktu</label>
                                                <div class="d-flex">
                                                    <input type="time" class="form-control" value="<?= $data['jam_mulai'] ?>" name="waktu_mulai" id="waktu_mulai">
                                                    <span class="mx-3">Sampai</span>
                                                    <input type="time" class="form-control" value="<?= $data['jam_selesai'] ?>" name="waktu_selesai" id="waktu_selesai">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="guru" class="form-label">Guru</label>
                                                <select class="form-select" aria-label="" name="guru">
                                                    <option value="<?= $data['id_guru'] ?>"><?= $data['nama_guru'] ?></option>
                                                    <?php foreach ($guru as $data1) : ?>
                                                        <option value="<?= $data1['id_guru'] ?>"><?= $data1['nama_guru'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>

                                                <button type="submit" class="btn btn-success ms-3">Simpan</button>
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