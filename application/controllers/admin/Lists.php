<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All List List';
		$data['rows'] = $this->common->getAllRecords('list' , 'DESC');
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/list/index' , $data);
		$this->load->view('admin/layout/footer');
	}



	public function view($id= '')
	{
		$data = array();
		$data['section_heading'] = 'List Details';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'status' => '1')  , 'list');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/list/view' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function add()
	{
		$data = array();
		$data['section_heading'] = 'Add List';
		$data['district'] =$this->common->getAllRecords('district' , 'DESC');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/list/add' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function save()
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');
			

			 if ($this->form_validation->run() == true)
                {


			$image = ''; 

			if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
				
				$imageStatus = do_upload('image' , '*');



				

				if (isset($imageStatus['error']) &&  !empty($imageStatus['error'])) {


					$this->session->set_flashdata('image_error', $imageStatus['error']);
				}else
				{
					$image = $imageStatus['upload_data']['file_name'];
				}




			}

                	$insert = array(
                		'title' => $_POST['title'], 
                		'district' => $_POST['district'], 
                		'image' => $image, 
                		'status' => '1', 
                	);


                	$insert_id = $this->common->insert('list' , $insert);

                	if ($insert_id) {


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record added successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
                	}else
                	{
                		$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                	}
                     
                      
                }else
                {

                	$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> '.validation_errors().' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');

                }


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/lists/add'));
	}


public function edit($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit List';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'list');
		$data['district'] =$this->common->getAllRecords('district' , 'DESC');

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/list/edit' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function update($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');


			$image = ''; 

			if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
				
				$imageStatus = do_upload('image' , '*');


				if (isset($imageStatus['error']) &&  !empty($imageStatus['error'])) {


					$this->session->set_flashdata('image_error', $imageStatus['error']);
				}else
				{
					$image = $imageStatus['upload_data']['file_name'];
				}




			}
			

			 if ($this->form_validation->run() == true)
                {


                	$update = array();
                	$update['title'] =  $_POST['title'];
                	$update['district'] =  $_POST['district'];
                
                	if(!empty($image))
                	{
                		$update['image'] = $image;
                	}


                	$update = $this->common->update($id , $update ,  'list');


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
                
                      
                }else
                {

                	$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> '.validation_errors().' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');

                }


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/lists/edit/'.$id));
	}


	public function delete($id= '')
	{


		
		$data['row'] = $this->common->getAllRecordsByFieldName(array('id'=> $id )  , 'list');


		$delete = $this->common->deleteRecordByColumnName(array('id'=> $id)  , 'list');

		if ($delete) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/lists'));
	}


	public function status($id= '')
	{


		
		$checkstatus = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'list');



		if ($checkstatus['status'] == '1') {
			$st = '0';
		}else
		{
			$st = '1';
		}

		$update = array('status' => $st);


		$update = $this->common->update($id , $update , 'list' );





		if ($update) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Status changed successfully  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Status not changed successfully    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/lists'));
	}









}
