<?php
class Penjual_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function getlist()
        {
        	$query = $this->db->get('profil_penjual');
        	return $query->result_array();
        }

       public function getcount()
       {
       		return $this->db->count_all_results('profil_penjual');
       }
       public function getuser($id)
       {
            $this->db->select('*');
            $this->db->from('profil_penjual');
            $this->db->where('Id_Penjual', $id);
            $query = $this->db->get();
            return $query->result_array();
       }
       public function getusertrue($username,$password)
       {
            $this->db->select('*');
            $this->db->from('profil_penjual');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query->row_array();
       }
       public function createuser($data)
       {
            $this->db->insert('profil_penjual',$data);
       }
       public function deleteuser($id)
       {
            $this->db->where('Id_Penjual', $id);
            $this->db->delete('profil_penjual');
       }
       public function edituser($data,$id)
       {
            $this->db->set($data);
            $this->db->where('id_penjual', $id);
            $this->db->update('profil_penjual');
       }
}