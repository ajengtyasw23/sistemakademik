<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExport
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function exportDataSiswa($data, $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tulis header "LAPORAN DATA SISWA" dan "KOBER PAUD DARUSHOWAAB"
        $sheet->setCellValue('A1', 'LAPORAN DATA SISWA');
        $sheet->mergeCells('A1:L1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

        $sheet->setCellValue('A2', 'KOBER PAUD DARUSHOWAAB');
        $sheet->mergeCells('A2:L2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(16);

        // Tulis header kolom
        $header = array('No', 'Nama Siswa', 'Username', 'Tahun Ajaran', 'TTL',  'Jenis Kelamin', 'Nama Ayah', 'Nama Ibu', 'Jumlah Saudara', 'Anak Ke', 'No Telp', 'Alamat');
        $column = 'A';
        $row = 3;

        foreach ($header as $item) {
            $sheet->setCellValue($column . $row, $item);
            if ($item === 'Nama Siswa' || $item === 'Username' || $item === 'Tahun Ajaran' || $item === 'Jenis Kelamin' || $item === 'Nama Ayah' || $item === 'Nama Ibu' || $item === 'TTL' || $item === 'Jumlah Saudara' || $item === 'No Telp' || $item === 'Alamat') {
                $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
                $sheet->getColumnDimension($column)->setWidth(15); // Atur lebar kolom (misalnya 30)
            }
            if ($item === 'No') {
                $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
                $sheet->getColumnDimension($column)->setWidth(4); // Atur lebar kolom (misalnya 30)
            }
            $column++;
        }

        // Tulis data siswa
        $row++;
        $no = 1;

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['nama_siswa']);
            $sheet->setCellValue('C' . $row, $item['username']);
            $sheet->setCellValue('D' . $row, $item['tahun_ajaran']);
            $sheet->setCellValue('E' . $row, $item['tempat_lahir'] . ', ' . $item['tanggal_lahir']);
            $sheet->setCellValue('F' . $row, $item['jenis_kelamin']);
            $sheet->setCellValue('G' . $row, $item['nama_ayah']);
            $sheet->setCellValue('H' . $row, $item['nama_ibu']);
            $sheet->setCellValue('I' . $row, $item['jml_saudara']);
            $sheet->setCellValue('J' . $row, $item['anak_ke']);
            $sheet->setCellValue('K' . $row, $item['no_telp_ortu']);
            $sheet->setCellValue('L' . $row, $item['alamat_ortu']);

            $no++;
            $row++;
        }

        // Buat response untuk file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = $filename . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
    public function exportDataGuru($data, $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tulis header "LAPORAN DATA SISWA" dan "KOBER PAUD DARUSHOWAAB"
        $sheet->setCellValue('A1', 'LAPORAN DATA GURU');
        $sheet->mergeCells('A1:H1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

        $sheet->setCellValue('A2', 'KOBER PAUD DARUSHOWAAB');
        $sheet->mergeCells('A2:H2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(16);

        // Tulis header kolom
        $header = array('No', 'Nama Guru', 'Username', 'Jenis Kelamin', 'Jabatan', 'No Telp', 'Alamat', 'Keterangan');
        $column = 'A';
        $row = 3;

        foreach ($header as $item) {
            $sheet->setCellValue($column . $row, $item);
            $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
            $sheet->getColumnDimension($column)->setWidth(15); // Atur lebar kolom (misalnya 30)
            if ($item === 'No') {
                $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
                $sheet->getColumnDimension($column)->setWidth(4); // Atur lebar kolom (misalnya 30)
            }
            $column++;
        }

        // Tulis data siswa
        $row++;
        $no = 1;

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['nama_guru']);
            $sheet->setCellValue('C' . $row, $item['username']);
            $sheet->setCellValue('D' . $row, $item['jenis_kelamin']);
            $sheet->setCellValue('E' . $row, $item['jabatan']);
            $sheet->setCellValue('F' . $row, $item['no_telp']);
            $sheet->setCellValue('G' . $row, $item['alamat']);
            $sheet->setCellValue('H' . $row, $item['keterangan']);

            $no++;
            $row++;
        }

        // Buat response untuk file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = $filename . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
    public function exportDataAbsensi($data, $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tulis header "LAPORAN DATA SISWA" dan "KOBER PAUD DARUSHOWAAB"
        $sheet->setCellValue('A1', 'LAPORAN DATA ABSENSI');
        $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

        $sheet->setCellValue('A2', 'KOBER PAUD DARUSHOWAAB');
        $sheet->mergeCells('A2:G2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(16);

        // Tulis header kolom
        $header = array('No', 'Nama Siswa', 'Kelas', 'Tahun Ajaran', 'Hari/Tanggal', 'Kehadiran',  'Keterangan');
        $column = 'A';
        $row = 3;

        foreach ($header as $item) {
            $sheet->setCellValue($column . $row, $item);
            $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
            $sheet->getColumnDimension($column)->setWidth(15); // Atur lebar kolom (misalnya 30)
            if ($item === 'No') {
                $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
                $sheet->getColumnDimension($column)->setWidth(4); // Atur lebar kolom (misalnya 30)
            }
            $column++;
        }

        // Tulis data siswa
        $row++;
        $no = 1;

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['nama_siswa']);
            $sheet->setCellValue('C' . $row, $item['kelas']);
            $sheet->setCellValue('D' . $row, $item['tahun_ajaran']);
            $sheet->setCellValue('E' . $row, $item['hari_absen'] . ', ' . $item['tanggal_absen']);
            $sheet->setCellValue('F' . $row, $item['kehadiran']);
            $sheet->setCellValue('G' . $row, $item['keterangan']);

            $no++;
            $row++;
        }

        // Buat response untuk file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = $filename . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
    public function exportDataJadwal($data, $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tulis header "LAPORAN DATA SISWA" dan "KOBER PAUD DARUSHOWAAB"
        $sheet->setCellValue('A1', 'LAPORAN DATA JADWAL');
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

        $sheet->setCellValue('A2', 'KOBER PAUD DARUSHOWAAB');
        $sheet->mergeCells('A2:F2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(16);

        // Tulis header kolom
        $header = array('No', 'Pelajaran', 'Guru', 'Hari', 'Jam Mulai', 'Jam Selesai');
        $column = 'A';
        $row = 3;

        foreach ($header as $item) {
            $sheet->setCellValue($column . $row, $item);
            $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
            $sheet->getColumnDimension($column)->setWidth(15); // Atur lebar kolom (misalnya 30)
            if ($item === 'No') {
                $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
                $sheet->getColumnDimension($column)->setWidth(4); // Atur lebar kolom (misalnya 30)
            }
            $column++;
        }

        // Tulis data siswa
        $row++;
        $no = 1;

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['pelajaran']);
            $sheet->setCellValue('C' . $row, $item['nama_guru']);
            $sheet->setCellValue('D' . $row, $item['hari']);
            $sheet->setCellValue('E' . $row, $item['jam_mulai']);
            $sheet->setCellValue('F' . $row, $item['jam_selesai']);

            $no++;
            $row++;
        }

        // Buat response untuk file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = $filename . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
