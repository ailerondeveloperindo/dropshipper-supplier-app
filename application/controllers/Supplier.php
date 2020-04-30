<?php
Class Supplier extends CI_Controller {
	public function __construct()
	{
		    parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->model('supplier_model');
			$this->load->model('kurir_model');
			$this->load->model('category_model');
			$this->load->model('barang_model');
            $this->load->model('pesanan_model');
           $this->load->model('pengiriman_model');
			$this->load->library('form_validation');
            $this->load->library('session');
            $this->load->helper('security');
	}
	public function viewlogin()
	{
		$this->load->view('/supplierviews/supplierlogin');
	}
	public function viewregister()
	{
		$this->load->view('/supplierviews/supplierregister');
	}
    public function viewadd_barang()
    {
        $data['category'] = $this->category_model->getlist();
        $this->load->view('/supplierviews/barangform',$data);      
    }
    public function viewadd_resi($id,$id2)
    {
        $data['id'] = $id;
        $data['id2'] = $id2;
        $this->load->view('/penjualviews/add_resi',$data);
    }
    public function viewedit_barang($id)
    {
        $data['category'] = $this->category_model->getlist();
        $data['barang'] = $this->barang_model->getbarang($id);
        $this->load->view('/supplierviews/editbarangform',$data);      
    }
	public function index()
	{
		$this->checksession();
        $data['barang'] = $this->barang_model->getlist($_SESSION['usersession1']['id']);
        $data['profile'] = $this->supplier_model->getuser($_SESSION['usersession1']['id']);
	    $data['order'] = $this->pesanan_model->getsuporder($_SESSION['usersession1']['id'],'id_supplier');
		$this->load->view('/supplierViews/dashboard/headeruser',$data);
		$this->load->view('/supplierViews/dashboard/dashboarduser',$data);
		$this->load->view('/supplierViews/dashboard/footeruser');
	}
	public function usersetting()
	{
        $this->checksession();
		$data['profile'] = $this->supplier_model->getuser($_SESSION['usersession1']['id']);
		$this->load->view('/supplierViews/dashboard/headeruser',$data);
		$this->load->view('/supplierViews/dashboard/settinguser',$data);
		$this->load->view('/supplierViews/dashboard/footeruser');		
	}
	private function checksession()
	{
		if(!isset($_SESSION['usersession1']['id']))
		{
			redirect(base_url());
		}
	}
	public function checklogin($data = null)
	{
		   $this->form_validation->set_rules('username', 'Username', 'required');
   		   $this->form_validation->set_rules('password', 'Password', 'required');
           $username = $this->input->post('username');
           $password = do_hash($this->input->post('password'),'md5');
           $result = $this->supplier_model->getusertrue($username,$password);
        if($this->form_validation->run() != FALSE)
        {
        	if(!count($result))
				{
					$data['warning']='Wrong Username/Password';
        	    	$this->load->view('warning/warning',$data);
					$this->viewlogin();
				}
				else
				{
                   $array = array(
                    'username' => $result['Username'],
                    'id' => $result['id_supplier']
                    );
                    $this->session->set_userdata('usersession1',$array);
					redirect(base_url('index.php/supplier'));
			}
        }
        else
        {
                $this->form_validation->set_message('rule', 'Username dan Password tidak boleh kosong');
        		$this->viewregister();
        }
	}
    public function registeruser()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama_Supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $data = array(
            'Nama_Perusahaan' => $this->input->post('nama_supplier'),
            'username' => $this->input->post('username'),
            'password' => do_hash($this->input->post('password'),'md5'),
            'alamat' => $this->input->post('alamat'),
        );
        if($this->form_validation->run() == FALSE)
        {
            $data['warning']='Form Shouldn\'t be empty';
            $this->load->view('warning/warning',$data);
            $this->viewregister();
        }
        else
        {
            $this->supplier_model->createuser($data);
            redirect(base_url('index.php/home/'));
        }
    }
    public function add_barang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama_Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga_Barang', 'required');
        $this->form_validation->set_rules('id_kategori', 'Id_kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $data['Nama_Barang'] = $this->input->post('nama_barang');
        $data['Harga_Barang'] = $this->input->post('harga_barang');
        $data['id_kategori'] = $this->input->post('id_kategori');
        $data['stok'] = $this->input->post('stok');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $data['id_supplier'] = $_SESSION['usersession1']['id'];
        if($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('rule', 'Semua Field Harus Diisi');
            redirect(base_url('index.php/supplier'));
        }
        else
        {
            $this->barang_model->add_barang($data);
            redirect(base_url('index.php/supplier'));
        }
    }
    public function edit_barang($id)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama_Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga_Barang', 'required');
        $this->form_validation->set_rules('id_kategori', 'Id_kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $data['Nama_Barang'] = $this->input->post('nama_barang');
        $data['Harga_Barang'] = $this->input->post('harga_barang');
        $data['id_kategori'] = $this->input->post('id_kategori');
        $data['stok'] = $this->input->post('stok');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $data['id_supplier'] = $_SESSION['usersession1']['id'];
        if($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('rule', 'Semua Field Harus Diisi');
            redirect(base_url('index.php/supplier'));
        }
        else
        {
            $this->barang_model->editbarang($data,$id);
            redirect(base_url('index.php/supplier'));
        }
    }
    public function edit_user()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'Nama_Barang', 'required');
        $this->form_validation->set_rules('username', 'Harga_Barang', 'required');
        $this->form_validation->set_rules('alamat', 'Deskripsi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Stok', 'required');
        $this->form_validation->set_rules('nomor_rekening', 'Stok', 'required');        
        $this->form_validation->set_rules('nama_bank', 'Stok', 'required');   
        $data['Nama_Perusahaan'] = $this->input->post('nama_perusahaan');
        $data['Username'] = $this->input->post('username');
        if($this->input->post('password') != '')
        {
            $data['Password'] = do_hash($this->input->post('password'),'md5');
        }
        $data['Alamat'] = $this->input->post('alamat');
        $data['Deskripsi'] = $this->input->post('deskripsi');
        $data['No_rekening'] = $this->input->post('nomor_rekening');
        $data['Nama_Bank'] = $this->input->post('nama_bank');
        if($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('rule', 'Semua Field Harus Diisi');
            redirect(base_url('index.php/supplier/usersetting'));
        }
        else
        {
            $this->supplier_model->edituser($data,$_SESSION['usersession1']['id']);
            redirect(base_url('index.php/supplier/usersetting'));
        }
    }
    public function delete_barang($id)
    {
        $this->barang_model->deletebarang($id);
        redirect(base_url('index.php/supplier'));
    }
    public function logout()
    {
    	unset($_SESSION['usersession1']);
    	redirect(base_url(''));
    }
    public function delete_account()
    {
    	 $this->supplier_model->deleteuser($_SESSION['usersession1']['id']);
    	 $this->logout();
    }
    public function tolakpesanan($id)
    {
        $this->pesanan_model->deletepesanan($id);
        redirect(base_url('index.php/supplier'));
    }
    public function terimapesanan($id)
    {
        $array = array(
            'status' => '1'
        );
        $this->pesanan_model->editpesanan($array,$id);
        redirect(base_url('index.php/supplier'));
    }
    public function tambah_resi($id,$id2)
    {
        $array1 = array(
            'No_Resi' => $this->input->post('resi'),
            'no_pesanan' => $id,
            'tanggal_kirim' => date("Y-m-d H:i:s"),
            'id_penjual' => $id2
        );
        $this->pengiriman_model->add_pengiriman($array1);
         redirect(base_url('index.php/supplier'));
    }
}