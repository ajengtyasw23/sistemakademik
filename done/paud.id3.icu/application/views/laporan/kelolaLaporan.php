<main id="main" class="main">

	<div class="pagetitle ">
		<h1>KELOLA LAPORAN</h1>
	</div><!-- End Page Title -->

	<!-- SISWA -->
	<div class="modal fade" id="cetakSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Cetak Data Siswa</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/laporan_siswa/') ?>" method="post">
						<div class="mb-3">
							<label for="siswa" class="form-label">Siswa</label>
							<select name="siswa" id="siswa" class="form-select">
								<option value="semua">Semua</option>
								<?php foreach ($siswa as $s): ?>
									<option value="<?= $s['id_siswa'] ?>">
										<?= $s['nama_siswa'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exportSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Export Data Siswa</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/exportToExcelSiswa/') ?>" method="post">
						<div class="mb-3">
							<label for="siswa" class="form-label">Siswa</label>
							<select name="siswa" id="siswa" class="form-select">
								<option value="semua">Semua</option>
								<?php foreach ($siswa as $s): ?>
									<option value="<?= $s['id_siswa'] ?>">
										<?= $s['nama_siswa'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- GURU -->
	<div class="modal fade" id="cetakGuru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Cetak Data Guru</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/laporan_guru/') ?>" method="post">
						<div class="mb-3">
							<label for="guru" class="form-label">Guru</label>
							<select name="guru" id="guru" class="form-select">
								<option value="semua">Semua</option>
								<?php foreach ($guru as $g): ?>
									<option value="<?= $g['id_guru'] ?>">
										<?= $g['nama_guru'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exportGuru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Export Data Guru</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/exportToExcelGuru/') ?>" method="post">
						<div class="mb-3">
							<label for="guru" class="form-label">Guru</label>
							<select name="guru" id="guru" class="form-select">
								<option value="semua">Semua</option>
								<?php foreach ($guru as $g): ?>
									<option value="<?= $g['id_guru'] ?>">
										<?= $g['nama_guru'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- ABSENSI -->
	<div class="modal fade" id="cetakAbsensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Cetak Data Absensi</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/laporan_absensi/') ?>" method="post">
						<div class="mb-3">
							<label for="absensi" class="form-label">Absensi</label>
							<select name="absensi" id="absensi" class="form-select">
								<option value="semua">Semua</option>
								<option value="filter">Filter Tanggal</option>
							</select>
							<small class="form-text text-warning">Bila memilih semua, tanggal jangan di isi.</small>

						</div>
						<div class="mb-3" id="filterTgl">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input type="date" name="tanggal" class="form-control" id="">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exportAbsensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Export Data Absensi</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/exportToExcelAbsensi/') ?>" method="post">
						<div class="mb-3">
							<label for="absensi" class="form-label">Absensi</label>
							<select name="absensi" id="absensi" class="form-select">
								<option value="semua">Semua</option>
								<option value="filter">Filter Tanggal</option>
							</select>
							<small class="form-text text-warning">Bila memilih semua, tanggal jangan di isi.</small>

						</div>
						<div class="mb-3" id="filterTgl">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input type="date" name="tanggal" class="form-control" id="">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Jadwal -->
	<!-- GURU -->
	<div class="modal fade" id="cetakJadwal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Cetak Data Jadwal</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/laporan_jadwal/') ?>" method="post">
						<div class="mb-3">
							<label for="guru" class="form-label">Guru</label>
							<select name="guru" id="guru" class="form-select">
								<option value="semua">Semua</option>
								<?php foreach ($guru as $g): ?>
									<option value="<?= $g['id_guru'] ?>">
										<?= $g['nama_guru'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exportJadwal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Export Data Jadwal</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('laporan/exportToExcelJadwal/') ?>" method="post">
						<div class="mb-3">
							<label for="guru" class="form-label">Guru</label>
							<select name="guru" id="guru" class="form-select">
								<option value="semua">Semua</option>
								<?php foreach ($guru as $g): ?>
									<option value="<?= $g['id_guru'] ?>">
										<?= $g['nama_guru'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
							<button type="submit" class="btn btn-success">Cetak</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<section class="section dashboard shadow p-3 mt-3">
		<div class="table-responsive">
			<table class="table table-hover table-bordered" id="tabelku">
				<thead class="bg-success text-white text-center">
					<tr class="text-center">
						<th class="text-center">No</th>
						<th class="text-center">Laporan</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">1</td>
						<td>Laporan Data Siswa</td>
						<td class="text-center">
							<button type="button" data-bs-toggle="modal" data-bs-target="#cetakSiswa"
								class="btn btn-info  mb-3">Cetak</button>
							<button type="button" data-bs-toggle="modal" data-bs-target="#exportSiswa"
								class="btn btn-success  mb-3">Export</button>
						</td>
					</tr>
					<tr>
						<td class="text-center">2</td>
						<td>Laporan Data Guru</td>
						<td class="text-center">
							<button type="button" data-bs-toggle="modal" data-bs-target="#cetakGuru"
								class="btn btn-info  mb-3">Cetak</button>
							<button type="button" data-bs-toggle="modal" data-bs-target="#exportGuru"
								class="btn btn-success  mb-3">Export</button>

						</td>
					</tr>

					<tr>
						<td class="text-center">3</td>
						<td>Laporan Data Absensi</td>
						<td class="text-center">
							<button type="button" data-bs-toggle="modal" data-bs-target="#cetakAbsensi"
								class="btn btn-info  mb-3">Cetak</button>
							<button type="button" data-bs-toggle="modal" data-bs-target="#exportAbsensi"
								class="btn btn-success  mb-3">Export</button>
						</td>
					</tr>
					<tr>
						<td class="text-center">4</td>
						<td>Laporan Data Jadwal</td>
						<td class="text-center">
							<button type="button" data-bs-toggle="modal" data-bs-target="#cetakJadwal"
								class="btn btn-info  mb-3">Cetak</button>
							<button type="button" data-bs-toggle="modal" data-bs-target="#exportJadwal"
								class="btn btn-success  mb-3">Export</button>

						</td>
					</tr>

				</tbody>
			</table>
		</div>
	</section>

</main><!-- End #main -->
