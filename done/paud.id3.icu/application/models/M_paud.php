<?php
class M_paud extends CI_Model
{
    public function get_nilai_siswa()
    {
        $this->db->select('nilai.*,siswa.nama_siswa');
        $this->db->from('nilai');
        $this->db->join('siswa', 'nilai.id_siswa = siswa.id_siswa');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_nilai_siswa_where($id)
    {
        $this->db->select('nilai.*,siswa.nama_siswa');
        $this->db->from('nilai');
        $this->db->join('siswa', 'nilai.id_siswa = siswa.id_siswa');
        $this->db->where('id_nilai', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    public function get_nilai_siswa_where2($tahun_ajaran, $id)
    {
        $this->db->select('nilai.*,siswa.nama_siswa');
        $this->db->from('nilai');
        $this->db->join('siswa', 'nilai.id_siswa = siswa.id_siswa');
        $this->db->where('nilai.tahun_ajaran', $tahun_ajaran);
        $this->db->where('nilai.id_siswa', $id);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function get_jadwal($hari)
    {
        $this->db->select('*');
        $this->db->from('jadwal_pelajaran');
        $this->db->join('pelajaran', 'jadwal_pelajaran.id_pelajaran = pelajaran.id_pelajaran');
        $this->db->where('jadwal_pelajaran.hari', $hari);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function insert_nilai($data, $data2)
    {

        $this->db->insert('nilai', $data);
        $id_nilai = $this->db->insert_id();
        foreach ($data2['capaian'] as $key => $lingkup) {
            $detail_nilai = array(
                'id_nilai' => $id_nilai,
                'cpa' => implode(',', $data2['capaian'][$key]),
            );
			// var_dump($detail_nilai);
            $this->db->insert('detail_nilai', $detail_nilai);
        }
    }
    public function get_jadwal_all()
    {
        $this->db->select('jadwal_pelajaran.*, pelajaran.pelajaran,guru.nama_guru');
        $this->db->from('jadwal_pelajaran');
        $this->db->join('pelajaran', 'jadwal_pelajaran.id_pelajaran = pelajaran.id_pelajaran');
        $this->db->join('guru', 'jadwal_pelajaran.id_guru = guru.id_guru');
        $this->db->order_by('hari', "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_jadwal_guru($guru_id)
    {
        $this->db->select('jadwal_pelajaran.*, pelajaran.pelajaran,guru.nama_guru');
        $this->db->from('jadwal_pelajaran');
        $this->db->join('pelajaran', 'jadwal_pelajaran.id_pelajaran = pelajaran.id_pelajaran');
        $this->db->join('guru', 'jadwal_pelajaran.id_guru = guru.id_guru');
        $this->db->order_by('hari', "desc");
		$this->db->where('jadwal_pelajaran.id_guru', $guru_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_pelajaran($id)
    {
        $query = $this->db->get_where('pelajaran', ['id_pelajaran' => $id])->row_array();
        return $query;
    }
}
