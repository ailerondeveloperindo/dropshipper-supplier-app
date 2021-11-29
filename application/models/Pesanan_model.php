<?php
class Pesanan_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function createpesanan($data)
        {
        	$this->db->insert('pesanan',$data);
        }
        public function deletepesanan($id)
        {
        	$this->db->where('no_pesanan', $id);
            $this->db->delete('pesanan');
        }
        public function editpesanan($data, $id)
        {
        	$this->db->set($data);
         	$this->db->where('no_pesanan', $id);
         	$this->db->update('pesanan');       	
        }
        public function getsuporder($id)
        {
        	$query = $this->db->query('select pesanan.no_pesanan,detail_barang.nama_barang, pesanan.nama_cust, pesanan.alamat_cust,pesanan.total ,pesanan.status ,profil_penjual.nama_penjual, pesanan.terbayar, pesanan.id_penjual, pesanan.jumlah from pesanan inner join detail_barang on detail_barang.id_barang = pesanan.id_barang inner join profil_penjual on profil_penjual.id_penjual = pesanan.id_penjual AND pesanan.id_supplier = '.$id);
           return $query->result_array();
        }
        public function getpenjorder($id)
        {
            $query = $this->db->query('select pesanan.no_pesanan,detail_barang.nama_barang, pesanan.nama_cust, pesanan.alamat_cust,pesanan.total ,pesanan.terbayar, pesanan.tanggal_pesanan, pesanan.id_penjual, detail_barang.harga_barang, pesanan.jumlah from pesanan inner join detail_barang on detail_barang.id_barang = pesanan.id_barang AND pesanan.id_penjual = '.$id);
           return $query->result_array();
        }
        public function getorder($id,$queue)
        {
          $this->db->where($queue,$id);
          $query = $this->db->get('pesanan');
          return $query->result_array();
        }
    }?>