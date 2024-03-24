<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<main id="main" class="main">

    <div class="pagetitle ">
        <h1>KELOLA DATA GURU</h1>
    </div><!-- End Page Title -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuru">
        <i class="bi bi-plus"></i> Tambah Data </button>

    <!-- Modal Tambah Guru-->
    <div class="modal fade" id="tambahGuru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Tambah Data Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('guru') ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                        </div>
                        <div class="mb-3">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="d-flex mt-2">
                                <div class="form-check me-1">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin">
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check ms-1">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin">
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
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

    <!-- End Modal Tambah Guru -->
    <!-- Modal Ubah Guru-->


    <!-- End Modal Ubah Guru -->

    <!-- end Hapus Guru -->
    <section class="section dashboard shadow p-3 mt-3">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabelku">
                <thead class="bg-success text-white text-center">
                    <tr class="text-center">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">No Telp</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = $this->session->userdata('user_id');
                    $no = 1;
                    foreach ($guru as $data) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $data['nama_guru']; ?></td>
                            <td><?= $data['jenis_kelamin']; ?></td>
                            <td><?= $data['jabatan']; ?></td>
                            <td><?= $data['no_telp']; ?></td>
                            <td><?= $data['keterangan']; ?></td>
                            <td class="text-center">
                                <?php if ($data['id_guru'] != $id) { ?>
                                    <button class="btn btn-info btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#ubahGuru<?= $data['id_guru'] ?>">Ubah</button>
                                    <a href="<?= base_url('guru/hapus/' . $data['id_guru']) ?>" class="btn btn-danger btn-sm mb-3 tombol-hapus">Hapus</a>
                                <?php } else { ?>
                                    <button class="btn btn-info btn-sm mb-3" disabled>Ubah</button>
                                    <button class="btn btn-danger btn-sm mb-3" disabled>Hapus</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <div class="modal fade" id="ubahGuru<?= $data['id_guru'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Ubah Data Guru</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('guru/update/' . $data['id_guru']) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="nama_guru" class="form-label">Nama Guru</label>
                                                <input type="text" class="form-control" id="nama_guru" value="<?= $data['nama_guru'] ?>" name="nama_guru">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jk">Jenis Kelamin</label>
                                                <div class="d-flex mt-2">
                                                    <?php if ($data['jenis_kelamin'] == 'laki-laki') { ?>
                                                        <div class="form-check me-1">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin" checked>
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Laki-Laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check ms-1">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    <?php } elseif ($data['jenis_kelamin'] == 'perempuan') { ?>
                                                        <div class="form-check me-1">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin" checked>
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Laki-Laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check ms-1">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="form-check me-1">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Laki-Laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check ms-1">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" value="<?= $data['jabatan'] ?>" id="jabatan" name="jabatan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_telp" class="form-label">No Telp</label>
                                                <input type="text" class="form-control" value="<?= $data['no_telp'] ?>" id="no_telp" name="no_telp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $data['alamat'] ?> </textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $data['keterangan'] ?></textarea>
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