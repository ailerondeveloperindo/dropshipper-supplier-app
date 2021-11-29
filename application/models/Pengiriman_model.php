<?php
class Pengiriman_Model extends CI_Model{

        public function __construct()
        {
                $this->load->database();
        }
        public function add_pengiriman($array)
        {
        	$this->db->insert('pengiriman',$array);
        }
        public function editpengiriman($array,$id = '')
        {
          if($id == '')
          {
            $this->db->set($array);
          }
          else
          {
            $this->db->where('No_Resi',$id);
            $this->db->set($array);
          }
          $this->db->update('pengiriman');
        }
        public function deletepengiriman($id)
        {
            $this->db->where('No_Resi',$id);
            $this->db->delete('pengiriman');          
        }
        public function getlist($queue = '',$id = ''){
          if($queue == '' && $id == '')
          {
            $query = $this->db->get('pengiriman');
          }
          else
          {
            $this->db->where($queue,$id);
            $query = $this->db->get('pengiriman');
          }
            return $query->result_array();
        }
        public function getlistinnerjoin($id)
        {
        	$query = $this->db->query('select pesanan.nama_cust, pesanan.alamat_cust,pesanan.no_pesanan, profil_kurir.nama_kurir, pengiriman.tanggal_kirim, pengiriman.status, pengiriman.no_resi, pengiriman.status from pesanan inner join profil_kurir on profil_kurir.id_kurir = pesanan.id_kurir inner join pengiriman on pengiriman.no_pesanan = pesanan.no_pesanan AND pengiriman.id_penjual = '.$id);
          return $query->result_array();        	
        }
}
?>