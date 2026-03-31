<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Committee extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');


       
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'Mahasamiti Details';
		$data['row'] = '';
		$data['memberlist'] = '';


		$get_data =  $this->common->getSingleRecordByFieldName(array('type' => 'Maha_committee' , 'id'=> '1') , 'committee');

		if ($get_data) {

			$data['row'] = $get_data;

			$data['memberlist'] =$this->common->memberlist($get_data['id']);
		}


		

		
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/mahasamiti' , $data);
		$this->load->view('admin/layout/footer');
	}



	public function ajax_sort()
	{
		
		foreach ($_POST['position'] as $key => $value) {

			$get_data =  $this->common->getSingleRecordByFieldName(array('id'=>$value) , 'committee_member');
			
			$update = array();
                	$update['sort'] = $key;
                	$update['updated'] =  date('Y-m-d h:m:s');
                	$update = $this->common->updateByColumn(array('user_id'=>$get_data['user_id'] , 'c_id'=>$get_data['c_id']), $update ,  'committee_member');
		}
	}


	public function editmahasamiti($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Mahasamiti';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'Maha_committee')  , 'committee');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/editmahasamiti' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function updatemahasamiti($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');


			
				
		if ($this->form_validation->run() == true)
                {



                	$update = array();
                	$update['title'] =  $_POST['title'];
                	$update['updated'] =  date('Y-m-d h:m:s');
        


                	$update = $this->common->update($id , $update ,  'committee');



                	if ($update) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/editmahasamiti/'.$id));
	}





public function addmember($id='')
	{
		$data = array();
		$data['section_heading'] = 'Add Mahasamiti Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'Maha_committee')  , 'committee');
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/addmember' , $data);
		$this->load->view('admin/layout/footer');
	}



 public function member_check($str)
        {
        	

        	
                if ($_POST['member'] && $_POST['c_id'])
                {
                   
                	$check = $this->common->getSingleRecordByFieldName(array('user_id'=> $_POST['member'] , 'c_id'=> $_POST['c_id'])  , 'committee_member');

                	if ($check) {
                		 $this->form_validation->set_message('member_check', 'This member is already added');
                        return FALSE; 
                		
                	}else
                	{

                	 return TRUE;
                	}

                }
               
        }


public function savemember($id='')
	{

		
		if (isset($_POST) || isset($_FILES)) {

			$this->form_validation->set_rules('member', 'member', 'required');
			$this->form_validation->set_rules('post_id[]', 'post type', 'required|callback_member_check');
			
			

			 if ($this->form_validation->run() == true)
                {


                	

                	foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                		'c_id' => $id,
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	


                	

                	if ($insert_id) {


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member added successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/addmember/'.$id));
	}





	public function deletemahasamitimember($id= '')
	{

		  $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		$delete =  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');

		if ($delete) {



			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/committee'));
	}






public function editmember($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Mahasamiti Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/editmember' , $data);
		$this->load->view('admin/layout/footer');
	}






public function updatemember($id='')
	{


		
	  $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

	  $this->form_validation->set_rules('member', 'member', 'required');
		
		if (isset($_POST) || isset($_FILES)) {

			if (isset($_POST['member']) && $_POST['member']) {
				
				if ($get_data['user_id'] != $_POST['member']) {
					
					$this->form_validation->set_rules('member', 'member', 'callback_member_check');
				}


			}

			
			$this->form_validation->set_rules('post_id[]', 'post type', 'required');
			
			

			 if ($this->form_validation->run() == true)
                {


                	  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');


     

                         foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                		'c_id' => $get_data['c_id'],
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	



                	if ($insert_id) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/editmember/'.$insert_id));
	}






	public function othercommitte()
		{
			$data = array();
			$data['section_heading'] = 'Other committee list';
			
			$data['rows']  =   $this->common->getAllRecordsByFieldName(array('type' => 'Other_committee') , 'committee' , 'ASC');
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/committee/other/index' , $data);
			$this->load->view('admin/layout/footer');
		}

	public function addcommittee()
		{
			$data = array();
			$data['section_heading'] = 'Add Other committee';
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/committee/other/addcommittee' , $data);
			$this->load->view('admin/layout/footer');
		}



	public function savecommittee()
		{
			
			if (isset($_POST) || isset($_FILES)) {


				$this->form_validation->set_rules('title', 'title', 'required');


				
					
		     if ($this->form_validation->run() == true)
	                {


	                	$insert = array();
	                	$insert['title'] =  $_POST['title'];
	                	$insert['description'] =  $_POST['description'];
	                	$insert['type'] =  'Other_committee';
	                	
	        


	                	$insert_id = $this->common->insert('committee' , $insert);



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
			

			redirect(base_url('admin/committee/addcommittee'));
		}






public function editcommittee($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Committee';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'Other_committee')  , 'committee');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/other/editcommittee' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function updatecommittee($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');


			
				
			 if ($this->form_validation->run() == true)
                {


                	$update = array();
                	$update['title'] =  $_POST['title'];
                	$update['description'] =  $_POST['description'];
                	$update['updated'] =  date('Y-m-d h:m:s');
        


                	$update = $this->common->update($id , $update ,  'committee');



                	if ($update) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/editcommittee/'.$id));
	}



	public function deletecommitte($id= '')
	{

		$delete = $this->common->deleteRecordByColumnName(array('id'=> $id , 'type'=>'Other_committee')  , 'committee');

		if ($delete) {


			 $this->common->deleteRecordByColumnName(array('c_id'=> $id)  , 'committee_member');

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/committee/othercommitte'));
	}








	public function othercommitteememberlist($id = '')
	{


		$data = array();
		$data['section_heading'] = 'Committee member list';
		$data['row'] = '';
		$data['memberlist'] = '';


		$get_data =  $this->common->getSingleRecordByFieldName(array('type' => 'Other_committee' , 'id'=> $id) , 'committee');

		if ($get_data) {

			$data['row'] = $get_data;

			$data['memberlist'] =$this->common->memberlist($get_data['id']);
		}


		

		
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/other/cammitteemember' , $data);
		$this->load->view('admin/layout/footer');
	}







public function add($id='')
	{
		$data = array();
		$data['section_heading'] = 'Add Mahasamiti Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'Other_committee')  , 'committee');
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/other/add' , $data);
		$this->load->view('admin/layout/footer');
	}





public function save($id='')
	{
		
		if (isset($_POST) || isset($_FILES)) {

			$this->form_validation->set_rules('member', 'member', 'required');
			$this->form_validation->set_rules('post_id[]', 'post type', 'required|callback_member_check');
			
			

			 if ($this->form_validation->run() == true)
                {


                	

                	foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                		'c_id' => $id,
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	



                	if ($insert_id) {


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member added successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/add/'.$id));
	}





	public function delete($id= '')
	{



		 $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		$delete =  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');

		if ($delete) {



			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/committee/othercommitteememberlist/'.$get_data['c_id']));
	}






public function edit($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Committee Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/other/edit' , $data);
		$this->load->view('admin/layout/footer');
	}






	public function update($id='')
	{


	  $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

	  $this->form_validation->set_rules('member', 'member', 'required');
		
		if (isset($_POST) || isset($_FILES)) {

			if (isset($_POST['member']) && $_POST['member']) {
				
				if ($get_data['user_id'] != $_POST['member']) {
					
					$this->form_validation->set_rules('member', 'member', 'callback_member_check');
				}


			}

			
			$this->form_validation->set_rules('post_id[]', 'post type', 'required');
			
			

			 if ($this->form_validation->run() == true)
                {


                	  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');


     

                         foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                		'c_id' => $get_data['c_id'],
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	



        




                	if ($insert_id) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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



		

		redirect(base_url('admin/committee/edit/'.$insert_id));
	}























/*state committee*/

	public function statecommittee()
	{
		$data = array();
		$data['section_heading'] = 'State committee list';
		$data['rows']  =   $this->common->getAllRecordsByFieldName(array('type' => 'State_committee') , 'committee' , 'ASC');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/state/index' , $data);
		$this->load->view('admin/layout/footer');
	}

	
	public function editstatecommittee($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Committee';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'State_committee')  , 'committee');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/state/editcommittee' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function updatestatecommittee($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');


			
				
			 if ($this->form_validation->run() == true)
                {


                	$update = array();
                	$update['title'] =  $_POST['title'];
                	$update['description'] =  $_POST['description'];
                	$update['updated'] =  date('Y-m-d h:m:s');
        


                	$update = $this->common->update($id , $update ,  'committee');



                	if ($update) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/editstatecommittee/'.$id));
	}








	public function statecommitteememberlist($id = '')
	{


		$data = array();
		$data['section_heading'] = 'Committee member list';
		$data['row'] = '';
		$data['memberlist'] = '';


		$get_data =  $this->common->getSingleRecordByFieldName(array('type' => 'State_committee' , 'id'=> $id) , 'committee');

		if ($get_data) {

			$data['row'] = $get_data;

			$data['memberlist'] =$this->common->memberlist($get_data['id']);
		}


		

		
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/state/cammitteemember' , $data);
		$this->load->view('admin/layout/footer');
	}







public function addstatecommitteemember($id='')
	{
		$data = array();
		$data['section_heading'] = 'Add Committee Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'State_committee')  , 'committee');
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/state/add' , $data);
		$this->load->view('admin/layout/footer');
	}





public function savestatecommitteemember($id='')
	{
		
		if (isset($_POST) || isset($_FILES)) {

			$this->form_validation->set_rules('member', 'member', 'required');
			$this->form_validation->set_rules('post_id[]', 'post type', 'required|callback_member_check');
			
			

			 if ($this->form_validation->run() == true)
                {


                	

                	foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                		'c_id' => $id,
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	


                	


                	if ($insert_id) {


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member added successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/addstatecommitteemember/'.$id));
	}





	public function deletestatecommittememeber($id= '')
	{

	  $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		$delete =  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');

		if ($delete) {



			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/committee/statecommitteememberlist/'.$get_data['c_id']));
	}






public function editstatecommittememeber($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Committee Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/state/edit' , $data);
		$this->load->view('admin/layout/footer');
	}






	public function updatestatecommittememeber($id='')
	{


		
	  $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

	  $this->form_validation->set_rules('member', 'member', 'required');
		
		if (isset($_POST) || isset($_FILES)) {

			if (isset($_POST['member']) && $_POST['member']) {
				
				if ($get_data['user_id'] != $_POST['member']) {
					
					$this->form_validation->set_rules('member', 'member', 'callback_member_check');
				}


			}

			
			$this->form_validation->set_rules('post_id[]', 'post type', 'required');
			
			

			 if ($this->form_validation->run() == true)
                {


                	  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');


     

                         foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                		'c_id' => $get_data['c_id'],
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	


               


                	if ($insert_id) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/editstatecommittememeber/'.$insert_id));
	}














/*distric committee*/



public function districtcommitte()
		{
			$data = array();
			$data['section_heading'] = 'District  committee list';
			
			$data['rows']  =   $this->common->getAllRecordsByFieldName(array('type' => 'District_committee') , 'committee' , 'ASC');
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/committee/district/index' , $data);
			$this->load->view('admin/layout/footer');
		}

	public function adddistrictcommittee()
		{
			$data = array();
			$data['section_heading'] = 'Add Other committee';
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/committee/district/addcommittee' , $data);
			$this->load->view('admin/layout/footer');
		}



	public function savedistrictcommittee()
		{
			
			if (isset($_POST) || isset($_FILES)) {


				$this->form_validation->set_rules('title', 'title', 'required');
				$this->form_validation->set_rules('district', 'district', 'required|is_unique[committee.district_name]');


				
					
		     if ($this->form_validation->run() == true)
	                {


	                	$insert = array();
	                	$insert['title'] =  $_POST['title'];
	                	$insert['description'] =  $_POST['description'];
	                	$insert['district_name'] =  $_POST['district'];
	                	$insert['parient_id'] = '7';
	                	$insert['type'] =  'District_committee';

	                	
	        


	                	$insert_id = $this->common->insert('committee' , $insert);



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
			

			redirect(base_url('admin/committee/adddistrictcommittee'));
		}






public function editdistrictcommittee($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Committee';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'District_committee')  , 'committee');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/district/editcommittee' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function updatedistrictcommittee($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('title', 'title', 'required');
			$get_data = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee');
			if($get_data['district_name'] != $_POST['district'])
			{
				$this->form_validation->set_rules('district', 'district', 'required|is_unique[committee.district_name]');
			}
			

			
				
		if ($this->form_validation->run() == true)
                {


                	$update = array();
                	$update['title'] =  $_POST['title'];
                	$update['description'] =  $_POST['description'];
                	$insert['district_name'] =  $_POST['district'];
                	$update['updated'] =  date('Y-m-d h:m:s');
        


                	$update = $this->common->update($id , $update ,  'committee');



                	if ($update) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/editdistrictcommittee/'.$id));
	}



	public function deletedistriccommitte($id= '')
	{

		$delete = $this->common->deleteRecordByColumnName(array('id'=> $id , 'type'=>'District_committee')  , 'committee');

		if ($delete) {


			 $this->common->deleteRecordByColumnName(array('c_id'=> $id)  , 'committee_member');

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/committee/districtcommitte'));
	}








	public function districtcommitteememberlist($id = '')
	{


		$data = array();
		$data['section_heading'] = 'Committee member list';
		$data['row'] = '';
		$data['memberlist'] = '';


		$get_data =  $this->common->getSingleRecordByFieldName(array('type' => 'District_committee' , 'id'=> $id) , 'committee');

		if ($get_data) {

			$data['row'] = $get_data;

			$data['memberlist'] =$this->common->memberlist($get_data['id']);
		}


		

		
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/district/cammitteemember' , $data);
		$this->load->view('admin/layout/footer');
	}







public function adddistrictcommitteemember($id='')
	{
		$data = array();
		$data['section_heading'] = 'Add Mahasamiti Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id , 'type'=> 'District_committee')  , 'committee');
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/district/add' , $data);
		$this->load->view('admin/layout/footer');
	}





public function savedistrictcommitteemember($id='')
	{
		
		if (isset($_POST) || isset($_FILES)) {

			$this->form_validation->set_rules('member', 'member', 'required');
			$this->form_validation->set_rules('post_id[]', 'post type', 'required|callback_member_check');

			
			

			 if ($this->form_validation->run() == true)
                {


                	

                	foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                	
                		'c_id' => $id,
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	


                	

                	if ($insert_id) {


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member added successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/adddistrictcommitteemember/'.$id));
	}





	public function deletedistrictcommitteemember($id= '')
	{

	      $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		$delete =  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');

		if ($delete) {



			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/committee/districtcommitteememberlist/'.$get_data['c_id']));
	}






public function editdistrictcommitteemember($id='')
	{
		$data = array();
		$data['section_heading'] = 'Edit Committee Member';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

		
		$data['members'] = $this->common->getAllRecordsByFieldName(array('verify'=> '1' , 'role' => 'User')  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/committee/district/edit' , $data);
		$this->load->view('admin/layout/footer');
	}






	public function updatedistrictcommitteemember($id='')
	{


		
	 	
	  $get_data = 	 $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'committee_member');

	  $this->form_validation->set_rules('member', 'member', 'required');
		
		if (isset($_POST) || isset($_FILES)) {

			if (isset($_POST['member']) && $_POST['member']) {
				
				if ($get_data['user_id'] != $_POST['member']) {
					
					$this->form_validation->set_rules('member', 'member', 'callback_member_check');
				}


			}

			
			$this->form_validation->set_rules('post_id[]', 'post type', 'required');
			
			

			 if ($this->form_validation->run() == true)
                {


                	  $this->common->deleteRecordByColumnName(array('c_id' => $get_data['c_id'] , 'user_id' => $get_data['user_id']) , 'committee_member');


     

                         foreach ($_POST['post_id'] as $key => $value) {
                		$insert = array(
                		'post_id' =>  $value, 
                		'user_id' => $_POST['member'], 
                		'c_id' => $get_data['c_id'],
                	);

                	$insert_id = $this->common->insert('committee_member' , $insert); 	
                	}
                	




                	if ($insert_id) {
                		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
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
		

		redirect(base_url('admin/committee/editdistrictcommitteemember/'.$id));
	}






public function export($id='')
	{
		

		$get_data = $this->common->memberlist($id);

		if ($get_data) {
			
   			
   			$table_columns = array("Member Name" , "Post");

   			
   			$store_data = array();
   			foreach ($get_data as $key => $value) {
   				   
   				$tem = array();
				$tem[] = $value['first_name'].' '.$value['last_name'].' '.$value['last_name'];
				$tem[] = $value['post_name'];
				

				$store_data[] = $tem;
				
   			}

   			excel_export($table_columns , $store_data , 'member_list');



		}else
		{
			 $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Opps Data Not Found <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			redirect(base_url('admin/user'));
		}

	

	}


public function print()
	{

		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if((isset($_POST['id']) && !empty($_POST['id']))) {

			$data['committe'] =  $this->common->getSingleRecordByFieldName(array('id'=> $_POST['id']) , 'committee');
			$data['memberlist'] =$this->common->memberlist($_POST['id']);

			$output['status'] = true;
			$output['msg'] = 'Payment Status Update';
			$output['data'] = $this->load->view('admin/committee/print' , $data , true);;
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}


		echo json_encode($output);

		
	}

}
