<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
        $this->load->model('Export_model','export');
       
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All Members List';
		$data['rows'] = $this->common->getUsers();
		$data['districts'] = $this->common->getAllRecordsByFieldName(array('status'=>'1') , 'district' , 'ASC');
		/*echo '<pre>'; print_r($data); die;*/
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/users/index' , $data);
		$this->load->view('admin/layout/footer');
	}

	public function indexone()
	{
		$data = array();
		$data['section_heading'] = 'All Members List';
		


		$pagenumber = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


		   $this->load->library('pagination');
    
		    $config['base_url'] = base_url('admin/user/indexone');
		    $config['total_rows'] = $this->common->count_users();
		    $config['per_page'] = 10; // Change this according to your needs


			$config['use_page_numbers'] = true;
			$config['num_links'] = 10;
			$config["uri_segment"] = 4;
			$config["display_pages"] = true;
			$config['cur_page'] = $pagenumber;


    		   // Bootstrap 4 pagination customization
		    $config['attributes'] = array('class' => 'page-link');
		    $config['full_tag_open'] = '<ul class="pagination">';
		    $config['full_tag_close'] = '</ul>';
		    $config['first_link'] = 'First';
		    $config['first_tag_open'] = '<li class="page-item">';
		    $config['first_tag_close'] = '</li>';
		    $config['last_link'] = 'Last';
		    $config['last_tag_open'] = '<li class="page-item">';
		    $config['last_tag_close'] = '</li>';
		    $config['next_link'] = '&raquo;';
		    $config['next_tag_open'] = '<li class="page-item">';
		    $config['next_tag_close'] = '</li>';
		    $config['prev_link'] = '&laquo;';
		    $config['prev_tag_open'] = '<li class="page-item">';
		    $config['prev_tag_close'] = '</li>';
		    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		    $config['cur_tag_close'] = '</a></li>';
		    $config['num_tag_open'] = '<li class="page-item">';
		    $config['num_tag_close'] = '</li>';
		    
		    $this->pagination->initialize($config);

    		    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		    $data['rows'] = $this->common->get_users($config['per_page'], $page);



		$data['districts'] = $this->common->getAllRecordsByFieldName(array('status'=>'1') , 'district' , 'ASC');
		/*echo '<pre>'; print_r($data); die;*/
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		//$this->load->view('admin/users/index' , $data);
		$this->load->view('admin/users/ajax_member' , $data);
		$this->load->view('admin/layout/footer');
	}
	

	public function lifetimememberships()
	{
		$data = array();
		$data['section_heading'] = 'All Members List';
		$data['rows'] = $this->common->getlifetimeUsers();
		$data['districts'] = $this->common->getAllRecordsByFieldName(array('status'=>'1') , 'district' , 'ASC');
		/*echo '<pre>'; print_r($data); die;*/
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/users/index' , $data);
		$this->load->view('admin/layout/footer');
	}
	

	public function ajax_list()
	{
		$data = array();
		$data['section_heading'] = 'All Members List';
	/* $data['rows'] = $this->common->get_all_members([] , '5', '0');*/
		/*$data['rows'] = $this->common->getUsers();*/
		$data['districts'] = $this->common->getAllRecordsByFieldName(array('status'=>'1') , 'district' , 'ASC');
		/*echo '<pre>'; print_r($data); die;*/
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/userss/index' , $data);
		$this->load->view('admin/layout/footer');
	}

	 public function ajax_member_list()
	  {	 $this->load->library("pagination");
		$output = [];
	        $output['status'] = false;
	        $output['data'] = '';

	        try {
	        	 if(isset($_POST['page']))
        		{
        			 if (!empty($_POST['page']) && is_numeric($_POST['page'])) {
				            $pagenumber = $_POST['page'];
				        }else
				        {
				            $pagenumber = 0;
				        }
        		}else
        		{
        			throw new Exception("Opps somthing wrong!");
        		}

				$per_page = 5;
			          if($pagenumber > 0)
			        {
			            $page = ($pagenumber - 1) * $per_page;
			            $serial_number = $pagenumber * $per_page - $per_page+1;
			            
			        }else
			        {
			            $page = 0;
			            $serial_number = 1;
			        }

				$searchArr = array();
				$searchArr['district'] = $_POST['district'];
				$searchArr['post_type'] = $_POST['post_type'];
				$searchArr['service'] = $_POST['service'];
				$searchArr['verify'] = $_POST['verify'];
				$searchArr['post_district'] = $_POST['post_district'];
				$searchArr['post_name'] = $_POST['post_name'];
				$searchArr['ref_number'] = $_POST['ref_number'];


				$total_rows = $this->common->count_all_members($searchArr);
			        $config = [];
			        $config["base_url"] = base_url('/admin/users/ajax_member_list');
			        $config["total_rows"] = $total_rows;
			        $config["per_page"] = $per_page;
			   
			        $config['use_page_numbers'] = true;
			        $config['num_links'] = 1;
			         $config["uri_segment"] = 4;
			         $config["display_pages"] = true;
			        $config['cur_page'] = $pagenumber;

			        $config['num_tag_open'] = '<li class="relative inline-flex items-center border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200">';
			        $config['num_tag_close'] = '</li>';

			        $config['cur_tag_open'] = '<li class="relative inline-flex items-center border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200 active"><a href="javascript:void(0);">';
			        $config['cur_tag_close'] = '</a></li>';

			        $config['next_link'] = ' <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			             <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>';

			        $config['prev_link'] = '<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			             <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>';


			        $config['next_tag_open'] = '<li class="pg-next relative inline-flex items-center  border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-200">';
			        $config['next_tag_close'] = '</li>';

			        $config['prev_tag_open'] = '<li class="pg-prev relative inline-flex items-center border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-200">';
			        $config['prev_tag_close'] = '</li>';

			        $config['first_tag_open'] = '<li class="relative inline-flex items-center border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200">';
			        $config['first_tag_close'] = '</li>';

			        $config['last_tag_open'] = '<li class="relative inline-flex items-center border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200">';
			         $config['last_tag_close'] = '</li>';



			        $this->pagination->initialize($config);


			        $data['rows'] = $this->common->get_all_members($searchArr , $per_page, $page);

			     /* echo '<pre>';   print_r($data); die;*/

			        $data['count'] = $serial_number;
			        $data['total_rows'] =  $total_rows;
			        $output['data'] = $this->load->view('admin/users/ajax_member', $data , true);
			        $output['status'] = true;


	        } catch (Exception $e) {
	        	 $output['data'] = $e->getMessage();
	        }

	        echo json_encode($output);
	  }





	public function ajax_search()
	{
		$output = array();
		$output['status'] = false;
		$get_data = $this->common->getUsers();
		$output['data'] = $this->load->view('admin/users/search_result' , ['rows'=> $get_data] , true);
		$output['msg'] = '';
		echo json_encode($output);
	}


	public function export()
	{
		$output = array();
		$output['status'] = false;

		$search_data =array();

		if (isset($_POST['district']) && !empty($_POST['district'])) {
			$search_data['users.district'] = $_POST['district'];
		}

		if (isset($_POST['post_district']) && !empty($_POST['post_district'])) {
			$search_data['users.office_district'] = $_POST['post_district'];
		}

		if (isset($_POST['post_type']) && !empty($_POST['post_type'])) {
			$search_data['users.post_type'] = $_POST['post_type'];
		}
		if (isset($_POST['service']) && !empty($_POST['service'])) {
			$search_data['users.service_status'] = $_POST['service'];
		}
		if (isset($_POST['verify']) && $_POST['verify'] == '0' || $_POST['verify'] == '1') {
			$search_data['users.verify'] = $_POST['verify'];
		}
		if (isset($_POST['membership_type']) && !empty($_POST['membership_type'])) {
			$search_data['um.price'] = $_POST['membership_type'];
		}


		
		$getFields = 'users.first_name , users.middle_name , users.last_name , users.father_husband_name  , users.phone , users.email , users.dob , users.married_status , users.gender,   users.gender  ,  users.post_name  , service.name as service_name ,  department.name as department_name,  users.post_type ,  users.service_status ,  users.district , office_district , users.verify , create_at';	
		$get_data = $this->export->getAllUsersByCondtion($search_data , $getFields , 'users.first_name ASC');


		if ($get_data) {
			$delimiter = ","; 
			$filename = "members-data_" . date('Y-m-d') . ".csv"; 
   			$f = fopen('php://memory', 'w'); 

   			$table_columns = array("Name" , "F/H Name" ,"Mobile No", "Email" ,  "Date of Birth" , "Marital Status" ,"Gender" , "Post Name" , "Service Category" , "Name of Department" , "Post Type" ,'Service Status' , 'Home Distt' , "Posting Distt" , 'Membership Name' , 'Membership price' , "Status" , "Register Date");

   			fputcsv($f, $table_columns, $delimiter); 
   			$store_data = array();
   			foreach ($get_data as $key => $value) {
   				   	
   				$tem = array();
				$tem[] = $value['first_name'].' '.$value['middle_name'].' '.$value['last_name'];
				$tem[] = $value['father_husband_name'];
				$tem[] = $value['phone'];
				$tem[] = $value['email'];
				if($value['dob'] == '0000-00-00')
				{
					$tem[] = '';
				}else
				{
					$tem[] = date("d-m-Y", strtotime($value['dob'])); 
				}
				
				$tem[] = $value['married_status'];
				$tem[] = $value['gender'];
				$tem[] = $value['post_name'];
				$tem[] = $value['service_name'];
				$tem[] = $value['department_name'];
				$tem[] = $value['post_type'];
				$tem[] = $value['service_status'];
				$tem[] = $value['district'];
				$tem[] = $value['office_district'];
				$tem[] = $value['membership_name'];
				$tem[] = $value['membership_price'];

				if($value['verify'] == '1')
				{
					$tem[] ='Approved';
				}elseif($value['verify'] == '2')
				{
					$tem[] ='Rejected';
				}else
				{
					$tem[] ='Pending';
				}
				$tem[] = $value['create_at'];

				$store_data[] = $tem;
				
   			}

   			

   			excel_export($table_columns , $store_data , 'rakmamembers');



		}else
		{
			 $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Opps Data Not Found <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			redirect(base_url('admin/user'));
		}


	}



	public function view($id= '')
	{
		$data = array();
		$data['section_heading'] = 'Members Details';
		$data['row'] = $this->common->getUsers($id);
		$data['membership'] = $this->common->getallusermembership($id);

		/*echo '<pre>'; print_r($data); die;*/
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/users/view' , $data);
		$this->load->view('admin/layout/footer');
	}


	public function status($id= '')
	{
		$checkstatus = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'users');

		
		if ($checkstatus['status'] == '1') {
			$st = '0';
		}else
		{
			$st = '1';
		}
		$update = array('status' => $st);
		$get_data =  $this->common->getSingleRecordByFieldName(array('user_id' => $id , 'type'=>'Membership_Join') , 'transaction');
		if($get_data)
		{
			$refund = refund($get_data['payment_id'] , $get_data['price']);
			if($refund){
				$update = $this->common->update($id , $update , 'users' );

					$updatestatus = array();
                                	$updatestatus['payment_status'] = 'Refunded';
                                	$this->common->update($get_data['id'] , $updatestatus , 'transaction');

				if ($update) {
						$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Member Reject successfully  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
						
					}else
					{
						  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>  Member Reject not successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					}
		
			}else
			{
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Somting Worng! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			}	
		}else
		{
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Somting Worng! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		
		
		redirect(base_url('admin/user'));
	}


/*public function verify($id= '')
	{


		
		$checkstatus = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'users');



		if ($checkstatus['verify'] == '1') {
			$st = '0';
		}else
		{
			$st = '1';
		}

		$update = array('verify' => $st);


		$update = $this->common->update($id , $update , 'users' );





		if ($update) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Status changed successfully  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Status not changed successfully    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/user'));
	}*/






	public function edit($id='')
	{

		/*state_list();  die;*/
		$data = array();
		$data['section_heading'] = 'Edit User';
		$data['row'] = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'users');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/users/edit' , $data);
		$this->load->view('admin/layout/footer');
	}




public function update($id = '')
	{
		
		if (isset($_POST) || isset($_FILES)) {

			$error = '';

			$row =  $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'users');

			$get_data =  $this->common->getSingleRecordByFieldName(array('phone'=> $_POST['ref_mobile'])  , 'users');
			if ($get_data) {
				
					$ref_name = $get_data['first_name'].' '.$get_data['middle_name'].' '.$get_data['last_name'];;
					$ref_mobile = $get_data['phone'];

			}else
			{
				$error = 'Your reference number is wrong';
			}

			$this->form_validation->set_rules('first_name', 'first name', 'required');
			$this->form_validation->set_rules('father_husband_name', 'father / husband name', 'required');
			/*$this->form_validation->set_rules('email', 'email', 'required');*/
			if($row['phone'] == $_POST['phone'])
			{
				$this->form_validation->set_rules('phone', 'phone', 'required');
			}else
			{
				$this->form_validation->set_rules('phone', 'phone', 'required|is_unique[users.phone]');
			}
			
			/*$this->form_validation->set_rules('dob', 'date of birth', 'required');*/
			$this->form_validation->set_rules('district', 'district', 'required');
			$this->form_validation->set_rules('state', 'state', 'required');
			$this->form_validation->set_rules('post_name', 'post name', 'required');
			$this->form_validation->set_rules('name_of_diparment', 'name of diparment', 'required');
			$this->form_validation->set_rules('office_district', 'office district', 'required');



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
		
			 if ($this->form_validation->run() == true && empty($error))
                {

                	
                	$updatedata = array(
                                        'first_name' => $_POST['first_name'], 
                                        'middle_name' => $_POST['middle_name'], 
                                        'last_name' => $_POST['last_name'], 
                                        'father_husband_name' => $_POST['father_husband_name'], 
                                        'email' => $_POST['email'], 
                                        'phone' => $_POST['phone'], 
                                        'dob' => database_dateformat($_POST['dob']), 
                                        'gender' => $_POST['gender'], 
                                        'married_status' => $_POST['married_status'], 
                                        'address' => $_POST['address'], 
                                        'city' => $_POST['city'], 
                                        'district' => $_POST['district'], 
                                        'state' =>'1', 
                                        'post_name' => $_POST['post_name'], 
                                        'name_of_diparment' => $_POST['name_of_diparment'], 
                                        'service_category' => $_POST['service_category'], 
                                        'post_type' => $_POST['post_type'], 
                                        'service_status' => $_POST['service_status'], 
                                        'office_address' => $_POST['office_address'], 
                                        'office_city' => $_POST['office_city'], 
                                        'office_district' => $_POST['office_district'], 
                                        'office_state' =>'1', 
                                        'ref_name' => $ref_name, 
                                        'ref_mobile' => $ref_mobile, 
                                  
                        	);


                	if(!empty($image))
                	{
                		$updatedata['image'] = $image;
                	}


                	$update = $this->common->update($id , $updatedata ,  'users');


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Record edit successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                		
                
                      
                }else
                {

                	$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong> '.validation_errors().$error.'</strong>  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');

                }


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/user/edit/'.$id));
	}







	public function delete($id= '')
	{


		
		$data['row'] = $this->common->getAllRecordsByFieldName(array('id'=> $id)  , 'users');


		$delete = $this->common->deleteRecordByColumnName(array('id'=> $id)  , 'users');

		if ($delete) {

			$this->common->deleteRecordByColumnName(array('user_id'=> $id)  , 'user_membership');
			$this->common->deleteRecordByColumnName(array('user_id'=> $id)  , 'committee_member');

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Row has been deleted      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/user'));
	}



public function memberstatus()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if((isset($_POST['st'])) && (isset($_POST['id']) && !empty($_POST['id']))) {
		    $id = $_POST['id'];
		    $st = $_POST['st'];
		    $get_data =  $this->common->getSingleRecordByFieldName(array('user_id' => $id , 'type'=>'Membership_Join' , 'payment_status'=>'Complete') , 'transaction');
		    if($get_data)
		    {

		    if($st == '1')
		    {
		    	$updatememberstatus = array();
			$updatememberstatus['verify'] = $st;
			 $update = $this->common->update($id , $updatememberstatus , 'users');
			 $output['status'] = true;
		         $output['msg'] = 'Member status change successfully';
		    }elseif($st == '2')
		    {
		    		 $member =  $this->common->getSingleRecordByFieldName(array('id' => $id ) , 'users');
			    	  $get_data =  $this->common->getSingleRecordByFieldName(array('user_id' => $id , 'payment_id'=>$member['payment_id']) , 'transaction');
				    if ($get_data) {
				    	$refund = refund($get_data['payment_id'] , $get_data['price']);
				    	if ($refund) {
				    			$updatememberstatus = array();
				    			$updatememberstatus['verify'] = $st;
				    			$update = $this->common->update($id , $updatememberstatus , 'users' );

				    			$updatestatus = array();
		                                	$updatestatus['payment_status'] = 'Refunded';
		                                	$this->common->update($get_data['id'] , $updatestatus , 'transaction');

		                                	$this->common->deleteRecordByColumnName(array('user_id'=> $id)  , 'committee_member');
		                                	$output['status'] = true;
		                                	$output['msg'] = 'Member status change successfully';
				    	}else
				    	{
				    	   $output['msg'] = 'Opps somthing wrong!';	
				    	}
				    }else{
				    	$output['msg'] = 'Opps somthing wrong!';
				    }

		    }




		    else
		    {
		    	
		    	 $updatememberstatus = array();
			 $updatememberstatus['verify'] = $st;
			 $update = $this->common->update($id , $updatememberstatus , 'users' );
			 $output['status'] = true;
		         $output['msg'] = 'Member status change successfully';
		    }

		}else
		{
			$output['msg'] = 'This member payment is not complete';
		}


			  

			
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}

		 $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">'.$output['msg'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');


		echo json_encode($output);

	}


	public function uploadrecipt()
	{
	    $response = array(); // Initialize an array to store the response data

	    // Check if user_id is set in the POST data
	    if(isset($_POST['user_id'])) {
	        $id = $_POST['user_id']; 

	        // Perform file upload
	        $imageStatus = do_upload('file', $ex='gif|jpg|png|jpeg');
	        $image = '';

	        if (isset($imageStatus['error']) && !empty($imageStatus['error'])) {
	            $response['status'] = 'error';
	            $response['message'] = $imageStatus['error'];
	        } else {
	            $image = $imageStatus['upload_data']['file_name'];
	            $updateData = array();
	            $updateData['upload_recipt'] = $image;

	            //Update the user record
	            $update = $this->common->update($id, $updateData, 'users');

	            if ($update) {
	                $response['status'] = 'success';
	                $response['message'] = 'Recipt uploaded  successfully.';
	            } else {
	                $response['status'] = 'error';
	                $response['message'] = 'Failed to update user record.';
	            }
	        }
	    } else {
	        $response['status'] = 'error';
	        $response['message'] = 'User ID is missing in the request.';
	    }

	    // Convert the response array to JSON and echo it
	    header('Content-Type: application/json');
	    echo json_encode($response);
	}


	public function lifetimememberstatus()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if((isset($_POST['st'])) && (isset($_POST['id']) && !empty($_POST['id']))) {
		    $id = $_POST['id'];
		    $st = $_POST['st'];

		    $member =  $this->common->getSingleRecordByFieldName(array('id' => $id ) , 'users');
		    if($member['upload_recipt'] == '' && $st == '1')
		    {
		    	$output['msg'] = 'You have not uploaded the receipt yet, please upload the receipt first.';
		    }else
		    {
				$updatememberstatus = array();
				$updatememberstatus['verify'] = $st;
				$update = $this->common->update($id , $updatememberstatus , 'users');
				$updatememberstatus = array();
				$updatememberstatus['verify'] = $st;
				$update = $this->common->update($id , $updatememberstatus , 'users');
				$output['status'] = false;
				$output['msg'] = 'Status Update successfully';

		    }

	
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}

		 $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">'.$output['msg'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');


		echo json_encode($output);

	}




	public function mahasamitiMembers()
	{
		$data = array();
		$data['section_heading'] = 'All Mahasamiti Members List';
		$data['rows'] = $this->common->MahasamitiMembers();
		//echo '<pre>'; print_r($data['rows']); die;
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/users/mahasamiti-member' , $data);
		$this->load->view('admin/layout/footer');
	}




	public function mahasamitiMembersstatus($id= '')
	{


		
		$checkstatus = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'mahasamiti_members');



		if ($checkstatus['status'] == '1') {
			$st = '0';
		}else
		{
			$st = '1';
		}

		$update = array('status' => $st);


		$update = $this->common->update($id , $update , 'mahasamiti_members' );





		if ($update) {

			  $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> Status changed successfully  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			
		}else
		{
			  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Status not changed successfully    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		
		redirect(base_url('admin/user/mahasamitiMembers'));
	}

	

}



