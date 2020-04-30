<?php
Class Admin extends CI_Controller {

	public function __construct()
	{
		    parent::__construct();
			$this->load->helper('url');
			$this->load->model('penjual_model');
			$this->load->model('admin_model');
			$this->load->model('supplier_model');			
			$this->load->model('barang_model');
			$this->load->model('kurir_model');
			$this->load->model('pengiriman_model');
			$this->load->library('form_validation');
			$this->load->model('category_model');
			$this->load->helper('cookie');
			$this->load->helper('form');
	}
	public function viewlogin()
	{
		$this->load->view('adminlogin');
	}
	public function index($page = 'Dashboard')
	{
			$username = $this->input->cookie('username',TRUE);
			if(!get_cookie('username'))
			{
				redirect(base_url('index.php/adminlogin'));
			}
			else
			{
				$data['appname'] = 'Dropshippin\'';
				$data['mytitle'] = 'Administrator'.' - '.ucfirst($page); // Capitalize the first letter
		        $data['adminname'] = $username;
		        $data['page'] = $page;
		        $data['usercount'] = $this->penjual_model->getcount();
		      	$data['suppliercount'] = $this->supplier_model->getcount();
		        $data['itemcount'] = $this->barang_model->getcount();
		        $this->load->view('adminsidebar', $data);
		        $this->load->view('admindashboard',$data);
		        $this->load->view('adminfooter', $data);
	    }
	}
	public function getuserlist($page = 'Daftar Penjual')
	{
			$username = $this->input->cookie('usernameadmin');
			$data['appname'] = 'Dropshippin\'';
			$data['mytitle'] = 'Administrator'.' - '.ucfirst($page); // Capitalize the first letter
	        $data['adminname'] = $username;
	        $data['page'] = $page;
	 		$data['usercount'] = $this->penjual_model->getcount();
	        $data['userlist'] = $this->penjual_model->getlist();
	        $this->load->view('adminsidebar', $data);
	        $this->load->view('adminusertable',$data);
	        $this->load->view('adminfooter', $data);
	}
	public function getpengirimanlist($page = 'Daftar Item')
	{
			$data['appname'] = 'Dropshippin\'';
			$data['mytitle'] = 'Administrator'.' - '.ucfirst($page); // Capitalize the first letter
	        $data['adminname'] = 'aa';
	        $data['page'] = $page;
	        $data['list'] = $this->pengiriman_model->getlist();
	        $this->load->view('adminsidebar', $data);
	        $this->load->view('listpengiriman',$data);
	        $this->load->view('adminfooter', $data);
	}
	public function statuspengiriman($id)
	{
		$array = array(
			'status' => '1'
		);
		$this->pengiriman_model->editpengiriman($array,$id);
		$this->getpengirimanlist();
	}
	public function deletepengiriman($id)
	{
		$this->pengiriman_model->deletepengiriman($id);
		$this->getpengirimanlist();		
	}
	public function getreportlist($page = 'Daftar Report')
	{
			$username = $this->input->cookie('usernameadmin');
			$data['appname'] = 'Dropshippin\'';
			$data['mytitle'] = 'Administrator'.' - '.ucfirst($page); // Capitalize the first letter
	        $data['adminname'] = 'test';
	        $data['page'] = $page;
	        $this->load->view('adminsidebar', $data);
	        $this->load->view('adminfooter', $data);
	}
	public function getcourierlist($page = 'Daftar Kurir') //Kurir
	{
			$data['appname'] = 'Dropshippin\'';
			$data['mytitle'] = 'Administrator'.' - '.ucfirst($page); // Capitalize the first letter
	        $data['adminname'] = 'test';
	        $data['page'] = $page;
		    $data['couriercount'] = $this->kurir_model->getcount();
		   	$data['courierlist'] = $this->kurir_model->getlist();
	        $this->load->view('adminsidebar', $data);
	        $this->load->view('admincouriertable', $data);
	        $this->load->view('adminfooter', $data);
	}
	public function getcategorylist($page = 'Daftar Kategori') //Kurir
	{
			$data['appname'] = 'Dropshippin\'';
			$data['mytitle'] = 'Administrator'.' - '.ucfirst($page); // Capitalize the first letter
	        $data['adminname'] = 'test';
	        $data['page'] = $page;
		    $data['categorycount'] = $this->category_model->getcount();
		   	$data['categorylist'] = $this->category_model->getlist();
	        $this->load->view('adminsidebar', $data);
	        $this->load->view('admincattable', $data);
	        $this->load->view('adminfooter', $data);
	}
	public function checklogin()
	{
		   $this->form_validation->set_rules('username', 'Username', 'required');
   		   $this->form_validation->set_rules('password', 'Password', 'required');
           $username = $this->input->post('username');
           $password = $this->input->post('password');
           $result = $this->admin_model->getlogin($username,$password);
        if($this->form_validation->run() != FALSE)
        {
        	if(!$result)
				{
					$data['warning']='Wrong Username/Password';
        	    	$this->load->view('warning/warning',$data);
					$this->load->view('/adminlogin');
				}
				else
				{
					delete_cookie('username');
					set_cookie('username',$username,30); //Set Cookie with Expiration Time 5 Minutes
					redirect(base_url('index.php/admin'));
			}
        }
        else
        {
        		$data['warning']='Both Username and Password Should be Filled';
        	    $this->load->view('warning/warning',$data);
        		$this->load->view('/adminlogin');
        }
	}
    public function addcategory()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama_Kategori', 'required');
        $data['Nama_Kategori'] = $this->input->post('nama_kategori');
        if($this->form_validation->run() == FALSE)
        {
            $data['warning']='Form Shouldn\'t be empty';
            $this->load->view('warning/warning',$data);
            $this->load->view('add_category');
        }
        else
        {
            $this->category_model->add_category($data);
            redirect(base_url('index.php/admin/getcategorylist'));
        }
    }
    public function editcategory($id)
    {
        $data['id'] = $id;
        $data['Nama_Kategori'] = $this->input->post('nama_kategori');
        $this->category_model->editcategory($data);       
        redirect(base_url('index.php/admin/getcategorylist'));
    }

    public function deletekurir($id)
    {
        $this->kurir_model->deletekurir($id);
        redirect('/admin/getcourierlist');
    }
    public function deletekategori($id)
    {
        $this->category_model->deletecategory($id);
        redirect('/admin/getcategorylist');
    }
}