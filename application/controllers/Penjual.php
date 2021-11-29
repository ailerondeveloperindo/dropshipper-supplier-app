<?php
Class Penjual extends CI_Controller {

	public function __construct()
	{
		    parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->model('penjual_model');
            $this->load->model('barang_model');
            $this->load->model('kurir_model');
            $this->load->model('pesanan_model');
            $this->load->model('pengiriman_model');
			$this->load->library('form_validation');
            $this->load->library('session');
            $this->load->helper('security');
	}
	// Method buat View
	public function viewlogin()
	{
		$this->load->view('/penjualviews/penjuallogin');
	}
	public function viewregister()
	{
		$this->load->view('/penjualviews/penjualregister');
	}
	public function index()
	{
        $data['order'] = $this->pesanan_model->getpenjorder($_SESSION['usersession']['id']);
	    $data['profile'] = $this->penjual_model->getuser($_SESSION['usersession']['id']);
        $data['pengiriman'] = $this->pengiriman_model->getlistinnerjoin($_SESSION['usersession']['id']);
		$this->load->view('/penjualviews/dashboard/headeruser',$data);
		$this->load->view('/penjualviews/dashboard/dashboarduser',$data);
		$this->load->view('/penjualviews/dashboard/footeruser');
	}
	public function usersetting()
	{
	    $data['profile'] = $this->penjual_model->getuser($_SESSION['usersession']['id']);
		$this->load->view('/penjualviews/dashboard/headeruser',$data);
		$this->load->view('/penjualviews/dashboard/settinguser',$data);
		$this->load->view('/penjualviews/dashboard/footeruser');		
	}
	public function ViewPesanan($id)
	{
        if($this->checksession())
        {  
            $data['profile'] = $this->penjual_model->getuser($_SESSION['usersession']['id']);
            $data['barang'] = $this->barang_model->getbarang($id);
            $data['kurir'] = $this->kurir_model->getlist();      
    		$this->load->view('/penjualviews/dashboard/headeruser',$data);
    		$this->load->view('/penjualviews/dashboard/checkout',$data);
    		$this->load->view('/penjualviews/dashboard/footeruser');
        }
        else
        {
             echo "<script>alert('Harap Login Sebelum Melakukan Pemesanan'); window.location.href='".base_url()."';</script>";
        }		
	}
    public function view_editpesanan($id)
    {
            $data['pesanan'] = $this->pesanan_model->getorder($id,'no_pesanan');
            $this->load->view('/penjualViews/dashboard/edit_pesanan',$data);        
    }
    private function checksession()
	{
		if($_SESSION['usersession']['logged_in'] != TRUE)
		{
           return false;
		}
        else
        {
            return true;
        }
	}
    public function bayar($id)
    {
        $array = array(
            'terbayar' => '1'
        );
        $this->pesanan_model->editpesanan($array,$id);
        redirect(base_url());
    }
	//Akhir Method Buat View
	//Start Method
	public function checklogin($data = null)
	{
		   $this->form_validation->set_rules('username', 'Username', 'required');
   		   $this->form_validation->set_rules('password', 'Password', 'required');
           $username = $this->input->post('username');
           $password = do_hash($this->input->post('password'), 'md5');
           $result = $this->penjual_model->getusertrue($username,$password);
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
				   unset($_SESSION['usersession1']);
                   $array = array(
                    'username' => $result['username'],
                    'id' => $result['Id_Penjual'],
                    'logged_in' => TRUE
                    );
					$this->session->set_userdata('usersession',$array);
					redirect(base_url(''));
			}
        }
        else
        {
        		$data['warning']='Both Username and Password Should be filled';
        	    $this->load->view('warning/warning',$data);
				$this->viewlogin();
        }
	}
    public function registeruser()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_penjual', 'Nama_Penjual', 'required');
        $data = array(
            'Nama_Penjual' => $this->input->post('nama_penjual'),
            'username' => $this->input->post('username'),
            'password' => do_hash($this->input->post('password'), 'md5')
        );
        if($this->form_validation->run() == FALSE)
        {
            $data['warning']='Form Shouldn\'t be empty';
            $this->load->view('warning/warning',$data);
            $this->viewregister();
        }
        else
        {
            $this->penjual_model->createuser($data);
            redirect(base_url());
        }
    }
    public function edit_user()
    {
        $this->form_validation->set_rules('nama_penjual', 'Harga_Barang', 'required');
        $this->form_validation->set_rules('username', 'Id_kategori', 'required');
        $this->form_validation->set_rules('alamat', 'Stok', 'required');
        $this->form_validation->set_rules('nomor_kartu', 'Stok', 'required');        
        $this->form_validation->set_rules('tgl_kartu', 'Stok', 'required');   
        $data['Nama_Penjual'] = $this->input->post('nama_penjual');
        $data['Username'] = $this->input->post('username');
        if($this->input->post('password') != '')
        {
            $data['Password'] = do_hash($this->input->post('password'),'md5');
        }
        $data['Alamat'] = $this->input->post('alamat');
        $data['Nomor_Kartu'] = $this->input->post('nomor_kartu');
        $data['Tanggal_Habis'] = $this->input->post('tgl_kartu');
        if($this->form_validation->run() == FALSE)
        {
            echo "<script>alert('Semua Field Harus Diisi'); window.location.href='".base_url('index.php/penjual/usersetting')."'</script>";
        }
        else
        {
            $this->penjual_model->edituser($data,$_SESSION['usersession']['id']);
            redirect(base_url('index.php/penjual/usersetting'));
        }
    }
    public function logout()
    {
    	$_SESSION['usersession']['id'] = FALSE;
        $_SESSION['usersession']['logged_in'] = FALSE;
    	redirect(base_url(''));
    }
    public function delete_account()
    {
    	 $this->penjual_model->deleteuser($_SESSION['usersession']['id']);
    	 $this->logout();
    }
    public function prosespesanan($id)
    {
        $this->form_validation->set_rules('nama_customer', 'Harga_Barang', 'required');        
        $this->form_validation->set_rules('alamat_customer', 'Harga_Barang', 'required');  
        $this->form_validation->set_rules('jumlah', 'Harga_Barang', 'required'); 
        $this->form_validation->set_rules('id_kurir', 'Harga_Barang', 'required');
        $barang = $this->barang_model->getbarang1($id);
        $jumlah = (int)$this->input->post('jumlah'); 
        $total =  $jumlah * $barang['harga_barang'];
        if($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('rule', 'Semua Field Harus Diisi');
        }
        else
        {
            $array = array(
                'tanggal_pesanan' => date("Y-m-d H:i:s"),
                'id_barang' => $id,
                'nama_cust' => $this->input->post('nama_customer'),
                'alamat_cust' => $this->input->post('alamat_customer'),
                'id_penjual' => $_SESSION['usersession']['id'],
                'id_kurir' => $this->input->post('id_kurir'),
                'id_supplier' => $barang['id_supplier'],
                'total' => $total,
                'jumlah' => $this->input->post('jumlah')
            );
            $this->pesanan_model->createpesanan($array);
            echo "<script>alert('Pesanan Telah Berhasil Diproses. Cek Statusnya di Dashboard'); window.location.href='".base_url()."'</script>";
        } 
    }
    public function edit_pesanan($id)
    {
        $array = array(
            "nama_cust" => $this->input->post('nama_customer'),
            "alamat_cust" => $this->input->post('alamat_customer')
        );
        $this->pesanan_model->editpesanan($array,$id);
        redirect(base_url('index.php/penjual'));
    }
    public function batalkanpesanan($id)
    {
        $this->pesanan_model->deletepesanan($id);
        redirect(base_url('index.php/penjual'));
    }
	//End Method
}?>