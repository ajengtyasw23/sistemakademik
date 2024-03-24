<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_id') == false) {
			redirect('home/login');
		}
		if ($this->session->userdata('role') == 'siswa') {
			redirect('dashboard');
		}
	}
	public function index()
	{
		$data['siswa'] = $this->db->get('siswa')->result_array();
		$data['guru'] = $this->db->get('guru')->result_array();
		$this->load->view('layout/header');
		$this->load->view('laporan/kelolaLaporan', $data);
		$this->load->view('layout/footer');
	}
	public function laporan_guru()
	{
		$guru = $this->input->post('guru');
		if ($guru == 'semua') {
			$data['guru'] = $this->db->get('guru')->result_array();
		} else {
			$data['guru'] = $this->db->get_where('guru', ['id_guru' => $guru])->result_array();
		}
		$this->load->view('laporan/laporanguru', $data);
	}
	public function laporan_siswa()
	{
		$siswa = $this->input->post('siswa');
		if ($siswa == 'semua') {
			$data['siswa'] = $this->db->get('siswa')->result_array();
		} else {
			$data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $siswa])->result_array();
		}
		$this->load->view('laporan/laporansiswa', $data);
	}
	public function laporan_absensi()
	{
		$absensi = $this->input->post('absensi');
		if ($absensi == 'semua') {
			$data['absensi'] = $this->db->get('absensi')->result_array();
		} else {
			$tanggal = $this->input->post('tanggal');
			$data['absensi'] = $this->db->get_where('absensi', ['tanggal_absen' => $tanggal])->result_array();
		}
		$this->load->view('laporan/laporanabsensi', $data);
	}
	public function laporan_jadwal()
	{
		$guru = $this->input->post('guru');
		if ($guru == 'semua') {
			$data['jadwal'] = $this->M_paud->get_jadwal_all();
		} else {
			$data['jadwal'] = $this->M_paud->get_jadwal_guru($guru);
		}
		$this->load->view('laporan/laporanjadwal', $data);
	}
	public function exportToExcelSiswa()
	{
		$siswa = $this->input->post('siswa');
		if ($siswa == 'semua') {
			$dataSiswa = $this->db->get('siswa')->result_array();
		} else {
			$dataSiswa = $this->db->get_where('siswa', ['id_siswa' => $siswa])->result_array();
		}
		$this->load->library('ExcelExport');
		$filename = 'Laporan_Siswa';
		$this->excelexport->exportDataSiswa($dataSiswa, $filename);
	}
	public function exportToExcelGuru()
	{
		$this->load->library('ExcelExport');
		$guru = $this->input->post('guru');
		if ($guru == 'semua') {
			$dataGuru = $this->db->get('guru')->result_array();
		} else {
			$dataGuru = $this->db->get_where('guru', ['id_guru' => $guru])->result_array();
		}
		$filename = 'Laporan_Guru';
		$this->excelexport->exportDataGuru($dataGuru, $filename);
	}
	public function exportToExcelAbsensi()
	{
		$this->load->library('ExcelExport');
		$absensi = $this->input->post('absensi');
		if ($absensi == 'semua') {
			$dataAbsensi = $this->db->get('absensi')->result_array();
		} else {
			$tanggal = $this->input->post('tanggal');
			$dataAbsensi = $this->db->get_where('absensi', ['tanggal_absen' => $tanggal])->result_array();
		}
		$filename = 'Laporan_Absensi';
		$this->excelexport->exportDataAbsensi($dataAbsensi, $filename);
	}
	public function exportToExcelJadwal()
	{
		$this->load->library('ExcelExport');
		$guru = $this->input->post('guru');
		if ($guru == 'semua') {
			$dataJadwal = $this->M_paud->get_jadwal_all();
		} else {
			$dataJadwal = $this->M_paud->get_jadwal_guru($guru);
		}
		$filename = 'Laporan_Jadwal';
		$this->excelexport->exportDataJadwal($dataJadwal, $filename);
	}
}
