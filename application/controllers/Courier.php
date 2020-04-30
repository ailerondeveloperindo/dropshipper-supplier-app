<?php
Class Courier extends CI_Controller {

	public function __construct()
	{
		    parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->model('penjual_model');
            $this->load->model('kurir_model');
			$this->load->library('form_validation');
	}
    public function viewform()
    {
        $this->load->view('add_courier');
    }
    public function viewformedit($id)
    {
        $data['id'] = $id;
        $data['kurir'] = $this->kurir_model->getlist($id);
        $this->load->view('edit_courier',$data);
    }
    public function addcourier()
    {
        $this->form_validation->set_rules('nama_kurir', 'Nama_Kurir', 'required');
        $data['Nama_Kurir'] = $this->input->post('nama_kurir');
        if($this->form_validation->run() == FALSE)
        {
            $data['warning']='Form Shouldn\'t be empty';
            $this->load->view('warning/warning',$data);
            $this->load->view('add_courier');
        }
        else
        {
            $this->kurir_model->add_courier($data);
            redirect(base_url('index.php/admin/getcourierlist'));
        }
    }
    public function editcourier($id)
    {
        $data['id'] = $id;
        $data['Nama_Kurir'] = $this->input->post('nama_kurir');
        $this->kurir_model->editcourier($data);       
        redirect(base_url('index.php/admin/getcourierlist'));
    }
}