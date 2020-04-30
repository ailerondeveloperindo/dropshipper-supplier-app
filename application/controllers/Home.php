<?php
Class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
        $this->load->library('session');
        $this->load->model('barang_model');
        $this->load->model('supplier_model');
        $this->load->helper('form');
	}

	public function index()
	{
		$data['barang'] = $this->barang_model->getlistfull();
		if(!isset($_SESSION['usersession']))
		{
			$this->header();
			$this->load->view('home_rec',$data);
			$this->load->view('homefooter');
		}
		else if(isset($_SESSION['usersession1']))
		{
			redirect(base_url('index.php/supplier'));
		}
		else
		{
			$this->header();
			$this->load->view('home_rec',$data);
			$this->load->view('homefooter');
		}
	}
    public function viewprofil($id)
    {
        $data['profile'] = $this->supplier_model->getuser($id);
       			$this->header();
        $this->load->view('profilsupplier',$data);
      			$this->load->view('homefooter');
    }
	public function viewbarang($id)
	{
	    $this->header();
		$data['profilbarang'] = $this->barang_model->getbarang($id);
		$this->load->view('profilbarang',$data);
	    $this->load->view('homefooter');
	}
	public function header()
	{
		if($_SESSION['usersession']['id'] != FALSE)
		{
			$data['username'] = $_SESSION['usersession']['username'];
			$data['id'] = $_SESSION['usersession']['id'];
			$this->load->view('homeheadlogin',$data);
		}
		else
		{
			$this->load->view('homeheader');
		}		
	}
	public function viewsearch()
	{
		$string = $this->input->post('search');
		$data['hasil'] = $this->barang_model->searchbarang($string);
		$this->header();
		$this->load->view('searchbarang',$data);
	    $this->load->view('homefooter');
	}
}