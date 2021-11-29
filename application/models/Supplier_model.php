<?php
class Supplier_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function getlist()
        {
        	$query = $this->db->get('profil_supplier');
        	return $query->result_array();
        }

       public function getcount()
       {
       		return $this->db->count_all_results('profil_supplier');
       }
       public function getuser($id)
       {
            $this->db->select('*');
            $this->db->from('profil_supplier');
            $this->db->where('id_supplier', $id);
            $query = $this->db->get();
            return $query->result_array();
       }
       public function getusertrue($username,$password)
       {
            $this->db->select('*');
            $this->db->from('profil_supplier');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query->row_array();
       }
       public function createuser($data)
       {
            $this->db->insert('profil_supplier',$data);
       }
       public function deleteuser($id)
       {
            $this->db->select('*');
            $this->db->from('profil_supplier');
            $this->db->where('id_supplier', $id);
            $this->db->delete('profil_supplier');
       }
       public function edituser($data,$id)
       {
            $this->db->set($data);
            $this->db->where('id_supplier', $id);
            $this->db->update('profil_supplier');
       }
}