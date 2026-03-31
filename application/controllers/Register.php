<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
        parent::__construct();
     
        $this->load->model('Common_model','common');
   /*  date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
echo $currentTime; die;
      	die('This page is currently in progress');*/
        
    }
	
	public function index()
	{
		$data = array();
		$data['title'] = 'Membership';
		$this->load->view('site/layout/header');
		$this->load->view('site/register' , $data);
		$this->load->view('site/layout/footer');
	}


	public function save()
	{
		
			
		 	$date_now = date("Y-m-d"); // this format is string comparable

			if ($date_now > '2054-5-20') {
			   echo '<script>

			   			  alert("Membership is closed on 23-9-2024 after 12 PM");
			   			    location.reload();


				</script>';

			}

		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if(
			(isset($_POST['first_name']) && !empty($_POST['first_name'])) &&
			(isset($_POST['middle_name'])) &&
			(isset($_POST['last_name'])) &&
			(isset($_POST['email'])) &&
			(isset($_POST['address'])) &&
			(isset($_POST['city'])) &&
			(isset($_POST['mobile']) && !empty($_POST['mobile'])) &&
			(isset($_POST['district']) && !empty($_POST['district'])) &&
			(isset($_POST['father_husband_name']) && !empty($_POST['father_husband_name'])) &&
			/*(isset($_POST['dob']) && !empty($_POST['dob'])) &&*/
			(isset($_POST['married_status']) && !empty($_POST['married_status'])) &&
			(isset($_POST['gender']) && !empty($_POST['gender'])) &&
			(isset($_POST['post_name']) && !empty($_POST['post_name'])) &&
			(isset($_POST['name_of_diparment']) && !empty($_POST['name_of_diparment'])) &&
			(isset($_POST['service_category'])) &&
			(isset($_POST['post_type']) && !empty($_POST['post_type'])) &&
			(isset($_POST['service_status']) && !empty($_POST['service_status'])) &&
			(isset($_POST['office_district']) && !empty($_POST['office_district'])) &&
			(isset($_POST['office_state']) && !empty($_POST['office_state'])) &&
			(isset($_POST['office_address'])) &&
			(isset($_POST['office_city'])) &&
			(isset($_POST['membership_plan']) && !empty($_POST['membership_plan'])) &&
			(isset($_POST['oath_promise']) && !empty($_POST['oath_promise']))
			) {

			$checkAlredyRegistermobile = 	$this->common->getSingleRecordByFieldName(array('phone' =>$_POST['mobile'] , 'verify !='=>'2'), 'users');
			if (empty($checkAlredyRegistermobile)) {
				$image = ''; 

				if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
					$imageStatus = do_upload('image');
					if (isset($imageStatus['error']) &&  !empty($imageStatus['error'])) {
						$this->session->set_flashdata('image_error', $imageStatus['error']);
					}else
					{
						$image = $imageStatus['upload_data']['file_name'];
						$source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$image;
					      $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
					      $config_manip = array(
					          'image_library' => 'gd2',
					          'source_image' => $source_path,
					          'new_image' => $target_path,
					          'maintain_ratio' => false,
					          'width' => 400,
					          'height' => 400
					      );

					      $this->load->library('image_lib', $config_manip);
					     	$this->image_lib->resize();
					     	$this->image_lib->clear();


					}
				}
					$dob = '';
					if(!empty($_POST['dob']))
					{
						$dob = database_dateformat($_POST['dob']);
					}

					$insertdata = array(
                         'first_name' => $_POST['first_name'], 
                         'middle_name' => $_POST['middle_name'], 
                         'last_name' => $_POST['last_name'], 
                         'father_husband_name' => $_POST['father_husband_name'], 
                         'email' => $_POST['email'], 
                         'phone' => $_POST['mobile'], 
                         'dob' => database_dateformat($dob), 
                         'gender' => $_POST['gender'], 
                         'married_status' => $_POST['married_status'], 
                         'address' => $_POST['address'], 
                         'city' => $_POST['city'], 
                         'district' => $_POST['district'], 
                         'state' => '1', 
                         'post_name' => $_POST['post_name'], 
                         'name_of_diparment' => $_POST['name_of_diparment'], 
                         'service_category' => $_POST['service_category'], 
                         'post_type' => $_POST['post_type'], 
                         'service_status' => $_POST['service_status'], 
                         'office_address' => $_POST['office_address'], 
                         'office_city' => $_POST['office_city'], 
                         'office_district' => $_POST['office_district'], 
                         'office_state' =>'1', 
                         'oath_promise' => $_POST['oath_promise'], 
                      );

            	if ($image) {
            		$insertdata['image'] = $image;
            	}
            	$getprice = 	$this->common->getSingleRecordByFieldName(array('id' =>$_POST['membership_plan'], 'status'=>'1'), 'membership');

            			
            		if($getprice)
            		{
            			$price = $getprice['price'];
            		}else
            		{
            			$price = '0';
            		}


            		//echo '<pre>'; print_r($_POST); die;
      //       		if($getprice['type'] == 'Lifetime')
      //       		{

      //       			$insertdata['membership_join_date'] =  date('Y-m-d h:m:s');
      //       			$insertdata['membership_id'] =  $_POST['membership_id'];
            			
      //       			$this->lifetimeMembership($insertdata);
      //       			$output['price'] = $price;
	     //        		$output['islifetime'] = true;
						// $output['status'] = true;
						// $output['msg'] = 'Your registration has been successful, the administrator will verify your account and inform you.';
						// $output['data'] =  $insertdata;
      //       		}else
      //       		{

	     //        		$output['price'] = $price;
	     //        		$output['islifetime'] = false;
						// $output['status'] = true;
						// $output['msg'] = 'Your query has been submitted';
						// $output['data'] =  $insertdata;

      //       		}


            		$output['price'] = $price;
	            		$output['islifetime'] = false;
						$output['status'] = true;
						$output['msg'] = 'Your query has been submitted';
						$output['data'] =  $insertdata;

            		

					
             }else
             {
             	$output['msg'] = 'This number has been already registered';
             }

		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}


		echo json_encode($output);

		
	}


	private function lifetimeMembership($insertdata='')
	{
		
		
		$insert_id = $this->common->insert('users' ,  $insertdata);
		$getprice = 	$this->common->getSingleRecordByFieldName(array('id' =>$insertdata['membership_id']), 'membership');
					$membership = array(
					'price' => $getprice['price'], 
					'membership_id' => $insertdata['membership_id'], 
					'user_id' => $insert_id, 
					'membership_status' =>'Active',
					'type' =>'Lifetime',
					'membership_date' =>current_date(),
					);
					$membership_id =  $this->common->insert('user_membership' , $membership);

					$updatemembership_id = array();
					$updatemembership_id['membership_id'] = $membership_id;
					$this->common->update($insert_id , $updatemembership_id , 'users');

					return true;

	}
	

	public function updatesucesspaymentstatus()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if(
			(isset($_POST['userdata']) && !empty($_POST['userdata'])) &&
			(isset($_POST['payment_id']) && !empty($_POST['payment_id']))
		) {
			$_POST['userdata']['membership_id'] =  $_POST['membership_id'];
			$_POST['userdata']['membership_price'] =  $_POST['membership_price'];
			$_POST['userdata']['ref_name'] =  $_POST['ref_name'];
			$_POST['userdata']['ref_mobile'] =  $_POST['ref_mobile'];
			$_POST['userdata']['payment_id'] =  $_POST['payment_id'];
			$_POST['userdata']['status'] =   '1';
			$_POST['userdata']['verify'] =  ($_POST['membership_id'] == 3) ? '0' : '1';
			$_POST['userdata']['membership_join_date'] =  date('Y-m-d h:m:s');
		
			$insert_id = $this->common->insert('users' ,  $_POST['userdata']);

			if($insert_id)
			{
				$paymentRes = get_order($_POST['payment_id']);
				
				if($paymentRes)
				{
					$paymentstatus = $paymentRes['status'];
					$price = $paymentRes['amount']/100;
					$paymentID = $paymentRes['id'];
					$phone = $paymentRes['contact'];

					$insert = array(
					'payment_id' => $_POST['payment_id'], 
					'price' => $price, 
					'membership_id' => $_POST['membership_id'], 
					'user_id' => $insert_id, 
					'payment_status' =>$paymentstatus, 
					'type' =>'Membership_Join',
					'name' =>$_POST['userdata']['first_name'].' '.$_POST['userdata']['middle_name'].' '.$_POST['userdata']['last_name'],
					'mobile' =>$phone,
					'payment_date' =>current_date(),
					);
					$txn_data_id =  $this->common->insert('transaction' , $insert);
					$getprice = 	$this->common->getSingleRecordByFieldName(array('id' =>$_POST['membership_id']), 'membership');
					$membership = array(
					'price' => $getprice['price'], 
					'membership_id' => $_POST['membership_id'], 
					'user_id' => $insert_id, 
					'membership_status' =>'Active',
					'type' => ($_POST['membership_id'] == 3) ? 'Lifetime' : 'Join',
					'membership_date' =>current_date(),
					);
					$membership_id =  $this->common->insert('user_membership' , $membership);

					$updatemembership_id = array();
					$updatemembership_id['membership_id'] = $membership_id;
					$this->common->update($insert_id , $updatemembership_id , 'users');

					$capture = capture($_POST['payment_id'] , $price);
					if ($capture) {
					$update = array();
					$update['payment_status'] = 'Complete';
					$this->common->update($txn_data_id , $update , 'transaction');
				}
				}
				
				$output['status'] = true;
				$output['msg'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">Congratulations! Your form has been submmited and sent to approval. Download your receipt <a href="'.base_url("home/pdf_m/".$insert_id).'"  class="text-blue-600 underline">here</a> </div>';

			}else
			{
				$output['msg'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">
   Sorry! Your form has not been submitted due to  Server Down/Incorrect Information". Please try again.</div>';
			}

			

			


			
		}else
		{
			$output['msg'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">
   Sorry! Your form has not been submitted due to "Put reason here e.g. Server Down/Incorrect Information". Please try again.</div>';
		}
		echo json_encode($output);

		
	}


public function updatefaildpaymentstatus()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if(
			(isset($_POST['userid']) && !empty($_POST['userid'])) &&
			(isset($_POST['payment_id']) && !empty($_POST['payment_id']))
		) {
			$updatedaa = array(
			'payment_id' => $_POST['payment_id'], 
			'payment_status' =>'Not Complete', 

			);
			$this->common->update($_POST['userid'] , $updatedaa , 'users');
			$output['status'] = true;
			$output['msg'] = 'Payment Status Update';
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}
		echo json_encode($output);
	}


public function checkref()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if((isset($_POST['ref_mobile']) && !empty($_POST['ref_mobile']))) {
			$checkmobile = $this->common->getSingleRecordByFieldName(array('phone' =>$_POST['ref_mobile']), 'users');
			if ($checkmobile) {
				$allmembership = $this->common->getAllRecordsByFieldName(array('status'=>'1') , $table='membership' , 'price ASC');
				$output['status'] = true;
				$output['data'] = $this->load->view('site/section/membership-form' , array('membership_list'=> $allmembership) , true);
				$output['msg'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">Your reference is available. Please fill the following form. </div>';
			}else
			{
				$output['msg'] = ' <div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">
                        This Mobile number is not available. Please ask to your reference to get registered number and try again.</div>';
			}	
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}
		echo json_encode($output);
	}



}

