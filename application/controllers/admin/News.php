<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All News List';
		$data['rows'] = $this->common->getAllRecords('news' , 'DESC');
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/news/index' , $data);
		$this->load->view('admin/layout/footer');
	}



	public function view($id= '')
	{
		$data = array();
		$data['section_heading'] = 'News Details';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'status' => '1')  , 'news');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/news/view' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function add()
	{
		$data = array();
		$data['section_heading'] = 'Add News';
		$data['gallery_list'] = $this->common->getAllRecords('gallery' , 'DESC');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/news/add' , $data);
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
				
				$imageStatus = do_upload('image');



				

				if (isset($imageStatus['error']) &&  !empty($imageStatus['error'])) {


					$this->session->set_flashdata('image_error', $imageStatus['error']);
				}else
				{
					$image = $imageStatus['upload_data']['file_name'];
				}




			}

                	$insert = array(
                		'title' => $_POST['title'], 
                		'description' => $_POST['description'], 
                		'location' => $_POST['location'],
                		'gallery_id' => $_POST['gallery'],
                		'image' => $image, 
                		'status' => '1', 
                	);


                	$insert_id = $this->common->insert('news' , $insert);

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
		

		redirect(base_url('admin/news/add'));
	}


public function edit($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit News';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'news');
		$data['gallery_list'] = $this->common->getAllRecords('gallery' , 'DESC');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/news/edit' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function update($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');


			$image = ''; 

			if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
				
				$imageStatus = do_upload('image');


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
                	$update['description'] =  $_POST['description'];
                	$update['location'] =  $_POST['location'];
                	$update['gallery_id'] =  $_POST['gallery'];


                	if(!empty($image))
                	{
                		$update['image'] = $image;
                	}


                	$update = $this->common->update($id , $update ,  'news');


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
                
                      
                }else
                {

                	$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> '.validation_errors().' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');

                }


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/news/edit/'.$id));
	}


	public function delete($id= '')
	{


		
		$data['row'] = $this->common->getAllRecordsByFieldName(array('id'=> $id )  , 'news');


		$delete = $this->common->deleteRecordByColumnName(array('id'=> $id)  , 'news');

		if ($delete) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/news'));
	}


	public function status($id= '')
	{


		
		$checkstatus = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'news');



		if ($checkstatus['status'] == '1') {
			$st = '0';
		}else
		{
			$st = '1';
		}

		$update = array('status' => $st);


		$update = $this->common->update($id , $update , 'news' );





		if ($update) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Status changed successfully  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Status not changed successfully    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/news'));
	}









}
