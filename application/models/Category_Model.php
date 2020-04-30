
<?php
class Category_Model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function getlist()
        {
        	$query = $this->db->get('kategori_barang');
        	return $query->result_array();
        }

       public function getcount()
       {
       		return $this->db->count_all_results('kategori_barang');
       }
       public function add_category($data)
       {
            $this->db->insert('kategori_barang',$data);
       }
       public function deletecategory($id)
       {
            $this->db->where('id_kategori', $id);
            $this->db->delete('kategori_barang');
       }
       public function editcategory($data)
       {
            $this->db->set('Nama_Kategori', $data['Nama_Kategori']);
            $this->db->where('id_kategori', $data['id']);
            $this->db->update('kategori_barang');
       }
}
