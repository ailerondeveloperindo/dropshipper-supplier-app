<?php
class Barang_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function getbarang($id)
        {
          $this->db->where('id_barang',$id);
          $query = $this->db->get('detail_barang');
          return $query->result_array();
        }
        public function getbarang1($id)
        {
          $this->db->where('id_barang',$id);
          $query = $this->db->get('detail_barang');
          return $query->row_array();
        }
        public function getlist($par)
        {
          $query = $this->db->query('select detail_barang.id_barang, detail_barang.Nama_Barang, kategori_barang.Nama_Kategori, detail_barang.stok, detail_barang.Harga_Barang, detail_barang.imagelink from detail_barang inner join kategori_barang on detail_barang.id_kategori = kategori_barang.id_kategori AND detail_barang.id_supplier ='.$par);
        	return $query->result_array();
        }
        public function getlistfull()
        {
          $query = $this->db->get('detail_barang');
          return $query->result_array();
        }
       public function getcount()
       {
       		return $this->db->count_all_results('detail_barang');
       }
       public function add_barang($data)
       {
            $this->db->insert('detail_barang',$data);
       }
       public function deletebarang($id)
       {
            $this->db->where('id_barang', $id);
            $this->db->delete('detail_barang');
       }
       public function editbarang($data,$id)
       {
            $this->db->set($data);
            $this->db->where('id_barang',$id);
            $this->db->update('detail_barang');
       }
       public function searchbarang($data)
       {
          $query = $this->db->query('select * from (select d.id_supplier, d.id_barang, d.nama_barang, d.harga_barang, d.deskripsi, d.stok, s.nama_perusahaan from detail_barang as d inner join profil_supplier as s ON s.id_supplier = d.id_supplier) as q where q.Nama_Barang Like \''.$data.'%\' OR q.Nama_Barang Like \'%'.$data.'\'OR q.Nama_Barang Like \'%'.$data.'%\'');
          return $query->result_array();
       }
}
