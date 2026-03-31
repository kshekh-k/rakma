<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All Slider List';
		$data['rows'] = $this->common->getAllRecords('slider' , 'DESC');
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/slider/index' , $data);
		$this->load->view('admin/layout/footer');
	}



	public function view($id= '')
	{
		$data = array();
		$data['section_heading'] = 'Slider Details';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'status' => '1')  , 'slider');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/slider/view' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function add()
	{
		$data = array();
		$data['section_heading'] = 'Add Slider';
		$data['gallery_list'] = $this->common->getAllRecords('gallery' , 'DESC');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/slider/add' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function save()
	{
		
		if (isset($_POST) || isset($_FILES)) {

				$image = ''; 
				if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
					$imageStatus = do_upload('image');
					if (isset($imageStatus['error']) &&  !empty($imageStatus['error'])) {
						$this->session->set_flashdata('image_error', $imageStatus['error']);
					}else
					{
						$image = $imageStatus['upload_data']['file_name'];
							$insert = array(
	                		'image' => $image, 
	                		'status' => '1', 
	                	);
						$insert_id = $this->common->insert('slider' , $insert);
						if ($insert_id) {
							$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record added successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
						}else
	                	{
	                		$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
	                	}
					}
					}else
					{
						$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> Image is required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					}
				


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/slider/add'));
	}


public function edit($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Slider';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'slider');
		$data['gallery_list'] = $this->common->getAllRecords('gallery' , 'DESC');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/slider/edit' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function update($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {



			
			$get_data = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'slider');

			$image = ''; 
				if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
					$imageStatus = do_upload('image');
					if (isset($imageStatus['error']) &&  !empty($imageStatus['error'])) {
						$this->session->set_flashdata('image_error', $imageStatus['error']);
					}else
					{
						$image = $imageStatus['upload_data']['file_name'];
							$update = array(
	                		'image' => $image, 
	                		'updated_date' => date('Y-m-d h:m:s'), 
	                	);

						$update = $this->common->update($id , $update ,  'slider');
						if ($update) {
							$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record updated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
						}else
	                	{
	                		$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
	                	}
					}
					}else
					{
						$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> Please select a image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					}

			


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/slider/edit/'.$id));
	}


	public function delete($id= '')
	{


		
		$data['row'] = $this->common->getAllRecordsByFieldName(array('id'=> $id )  , 'slider');


		$delete = $this->common->deleteRecordByColumnName(array('id'=> $id)  , 'slider');

		if ($delete) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/slider'));
	}


	public function status($id= '')
	{


		
		$checkstatus = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'slider');



		if ($checkstatus['status'] == '1') {
			$st = '0';
		}else
		{
			$st = '1';
		}

		$update = array('status' => $st);


		$update = $this->common->update($id , $update , 'slider' );





		if ($update) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Status changed successfully  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Status not changed successfully    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/slider'));
	}









}
