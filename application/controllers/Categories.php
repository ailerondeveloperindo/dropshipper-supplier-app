<?php
Class Categories extends CI_Controller {

	public function __construct()
	{
		    parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->model('category_model');
			$this->load->library('form_validation');
	}
	public function viewform()
	{
		$this->load->view('add_category');
	}
    public function viewformedit($id)
    {
        $data['id'] = $id;
        $this->load->view('edit_category',$data);
    }
}