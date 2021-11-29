<?php
class Admin_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function getlogin($username,$password)
        {
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query->num_rows();
        }
}