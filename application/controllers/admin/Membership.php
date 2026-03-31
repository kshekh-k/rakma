<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All Membership List';
		$data['rows'] = $this->common->getAllRecords('membership' , 'DESC');
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/membership/index' , $data);
		$this->load->view('admin/layout/footer');
	}


public function edit($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Membership';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'membership');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/membership/edit' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function update($id = '')
	{
		if (isset($_POST) || isset($_FILES)) {
			$this->form_validation->set_rules('name', 'membership name', 'required');
			$this->form_validation->set_rules('price', 'price', 'required|numeric');
			if ($this->form_validation->run() == true)
                {
                	$update = array();
                	$update['name'] =  $_POST['name'];
                	$update['price'] =  $_POST['price'];
                	$update['description'] =  $_POST['description'];
                	$update = $this->common->update($id , $update ,  'membership');
                	$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                }else
                {
                	$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> '.validation_errors().' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                }
        }else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		redirect(base_url('admin/membership/edit/'.$id));
	}


}
