<?php
class Kurir_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function getlist($id = '')
        {
          if($id == '')
          {
            $query = $this->db->get('profil_kurir');
          }
          else
          {
            $this->db->where('id_kurir',$id);
            $query = $this->db->get('profil_kurir');
          }
        	return $query->result_array();
        }

       public function getcount()
       {
       		return $this->db->count_all_results('profil_kurir');
       }
       public function add_courier($data)
       {
            $this->db->insert('profil_kurir',$data);
       }
       public function deletekurir($id)
       {
            $this->db->where('Id_Kurir', $id);
            $this->db->delete('profil_kurir');
       }
       public function editcourier($data)
       {
            $this->db->set('Nama_Kurir', $data['Nama_Kurir']);
            $this->db->where('Id_Kurir', $data['id']);
            $this->db->update('profil_kurir');
       }
}