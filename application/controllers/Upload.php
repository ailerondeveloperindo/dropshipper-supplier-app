<?php
class Upload extends CI_Controller {

        public function __construct()
        {
			parent::__construct();
            $this->load->database();
            $this->load->model('barang_model');
            $this->load->model('penjual_model');
            $this->load->model('supplier_model');
            $this->load->helper('url');
        }

        public function upload_gambar($id)
        {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 9000;
            $config['max_width']            = 9000;
            $config['max_height']           = 9000;
            $this->load->library('upload', $config);
                if($this->upload->do_upload('gambar'))
                {
                	//echo '<script>alert(\'bisa upload\')</script>';
                	$array =array(
                		'imagelink' => $this->upload->data('file_name')
                	); 
                	$this->barang_model->editbarang($array,$id);
                    redirect(base_url('index.php/supplier'));
                }
                else
                {
                    $error = $this->upload->display_errors();
                    echo '<script>alert(\''.$error.'\')</script>';
                    redirect(base_url('index.php/supplier'));
                }
        	}
        public function upload_gambarpenjual($id)
        {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 9000;
            $config['max_width']            = 9000;
            $config['max_height']           = 9000;
            $this->load->library('upload', $config);
                if($this->upload->do_upload('gambar'))
                {
                    //echo '<script>alert(\'bisa upload\')</script>';
                    $array =array(
                        'imagelink' => $this->upload->data('file_name')
                    ); 
                    $this->penjual_model->edituser($array,$id);
                    redirect(base_url('index.php/penjual/usersetting'));
                }
                else
                {
                    $error = $this->upload->display_errors();
                    echo '<script>alert(\''.$error.'\')</script>';
                    redirect(base_url('index.php/penjual/usersetting'));
                }
            }
         public function upload_gambarsupplier($id)
        {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 9000;
            $config['max_width']            = 9000;
            $config['max_height']           = 9000;
            $this->load->library('upload', $config);
                if($this->upload->do_upload('gambar'))
                {
                    //echo '<script>alert(\'bisa upload\')</script>';
                    $array =array(
                        'imagelink' => $this->upload->data('file_name')
                    ); 
                    $this->supplier_model->edituser($array,$id);
                    redirect(base_url('index.php/supplier/usersetting'));
                }
                else
                {
                    $error = $this->upload->display_errors();
                    echo '<script>alert(\''.$error.'\')</script>';
                    redirect(base_url('index.php/supplier/usersetting'));
                }
            }
        }

?>