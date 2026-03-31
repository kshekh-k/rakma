<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All Gallery List';
		$data['rows'] = $this->common->getAllRecords('gallery' , 'DESC');
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/gallery/index' , $data);
		$this->load->view('admin/layout/footer');
	}



	public function images($id= '')
	{
		$data = array();
		$data['section_heading'] = 'Gallery Details';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'status' => '1')  , 'gallery');
		$data['rows'] = $this->common->getAllRecordsByFieldName(array('gallery_id'=> $id)  , 'gallery_image');

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/gallery/images' , $data);
		$this->load->view('admin/layout/footer');
	}




public function uploadimage($id='')
	{


		$error = '';
		$uploadimages = array();
		$errorImages = array();

		
		if (isset($_FILES) && !empty($_FILES['images']['name']['0']) && !empty($id)) {


				


			foreach ($_FILES['images']['name'] as $key => $value) {


				 	$_FILES['file']['name']     = $_FILES['images']['name'][$key]; 
                    $_FILES['file']['type']     = $_FILES['images']['type'][$key]; 
                    $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$key]; 
                    $_FILES['file']['error']     = $_FILES['images']['error'][$key]; 
                    $_FILES['file']['size']     = $_FILES['images']['size'][$key]; 


                    	$image = ''; 

					
							$imageStatus = do_upload('file');





							

							if (isset($imageStatus['error']) &&  !empty($imageStatus['error'])) {


								$error .= $imageStatus['error'];

								$errorImages[] = $imageStatus['error'];




							}else
							{
								$image = $imageStatus['upload_data']['file_name'];
							}

							if(!empty($image))
							{
								$insert = array(
			                		'gallery_id' => $id, 
			                		'image' => $image, 
			          
			                	);


                				$insert_id = $this->common->insert('gallery_image' , $insert);
                				$uploadimages[] = $insert_id;
							}


						


                	

						}



				$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> '.count($uploadimages).' Image Uploaded successfully , <p>'.count($errorImages).' Image Not Uploaded</p> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');


				


			


				
			}



			
		else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Please uplaod image  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/gallery/images/'.$id));
	}







	public function add()
	{
		$data = array();
		$data['section_heading'] = 'Add Gallery';
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/gallery/add' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function save()
	{


		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');
			

			 if ($this->form_validation->run() == true)
                {


		
                	$insert = array(
                		'title' => $_POST['title'], 
                		'description' => $_POST['description'],
                		'status' => '1', 
                	);


                	$insert_id = $this->common->insert('gallery' , $insert);

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
		

		redirect(base_url('admin/gallery/add'));
	}


public function edit($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Gallery';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'gallery');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/gallery/edit' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function update($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');



			 if ($this->form_validation->run() == true)
                {


                	$update = array();
                	$update['title'] =  $_POST['title'];
                	$update['description'] =  $_POST['description'];
                	
                
                	$update = $this->common->update($id , $update ,  'gallery');


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
                
                      
                }else
                {

                	$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> '.validation_errors().' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');

                }


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/gallery/edit/'.$id));
	}


	public function delete($id= '')
	{


		
		$data['row'] = $this->common->getAllRecordsByFieldName(array('id'=> $id)  , 'gallery');


		$delete = $this->common->deleteRecordByColumnName(array('id'=> $id)  , 'gallery');

		if ($delete) {

				$this->common->deleteRecordByColumnName(array('gallery_id'=> $id)  , 'gallery_image');

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/gallery'));
	}



	public function removeimage($id= '')
	{


		$gallery_id =  $this->uri->segment(4);
		$gallery_image__id =  $this->uri->segment(5);

		
		$delete = $this->common->deleteRecordByColumnName(array('id'=> $gallery_image__id)  , 'gallery_image');

		if ($delete) {

				

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/gallery/images/'.$gallery_id));
	}


	public function status($id= '')
	{


		
		$checkstatus = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'gallery');



		if ($checkstatus['status'] == '1') {
			$st = '0';
		}else
		{
			$st = '1';
		}

		$update = array('status' => $st);


		$update = $this->common->update($id , $update , 'gallery' );





		if ($update) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Status changed successfully  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Status not changed successfully    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/gallery'));
	}









}
