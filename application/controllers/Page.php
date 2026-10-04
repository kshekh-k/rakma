<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('Common_model','common');
        $this->load->model('Our_model', 'ourmember');

        
    }
	
	public function index()
	{
		$data = array();
		$data['title'] = 'Home';
		$data['news_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'news' , 'DESC' , '3');
		$data['event_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'events' , 'DESC' , '3');
		$data['download_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'downloads' , 'DESC' , '5');
		$find_gallery = $this->common->getSingleRecordByFieldName(array('status' => '1' , 'id'=>'8' ) , 'gallery');
		if (!empty($find_gallery)) {
			$data['gallery'] = $find_gallery;
			$data['gallery_images'] = $this->common->getAllRecordsByFieldName(array('gallery_id' => $find_gallery['id']) , 'gallery_image' ,  'DESC' , '6');
			$data['gallery_total'] = $this->common->countrecords(array('gallery_id' => $find_gallery['id']) , 'gallery_image');
		}else
		{
			$data['gallery']  = '';
			$data['gallery_total'] = 0;
		}
		$this->load->view('site/layout/header');
		$this->load->view('site/home' , $data);
		$this->load->view('site/layout/footer');
	}


	public function about()
	{
		$data = array();
		$data['title'] = 'About us';
		$data['news_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'news' , 'DESC' , '3');
		$data['event_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'events' , 'DESC' , '3');
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/about-us' , $data);
		$this->load->view('site/layout/footer');
	}

	public function contact()
	{
		$data = array();
		$data['title'] = 'Contact us';
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/contact-us' , $data);
		$this->load->view('site/layout/footer');
	}

	public function downloads()
	{
		$data = array();
		$data['title'] = 'Downloads';
		$data['download_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'downloads' , 'DESC');
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/downloads' , $data);
		$this->load->view('site/layout/footer');
	}

	
     public function privacypolicy()
    {
        $data = [];
        $data['title'] = 'Privacy policy';
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/general-page/privacy-policy', $data);
        $this->load->view('site/layout/footer');
    }

   public function termsConditions()
    {
        $data = [];
        $data['title'] = 'Terms & Conditions';
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/general-page/termsconditions', $data);
        $this->load->view('site/layout/footer');
    }   


   public function refundPolicy()
    {
        $data = [];
        $data['title'] = 'Refund Policy / Cancellation';
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/general-page/refundpolicy', $data);
        $this->load->view('site/layout/footer');
    }   

   public function pricing ()
    {
        $data = [];
        $data['title'] = 'Pricing';
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/general-page/pricing', $data);
        $this->load->view('site/layout/footer');
    } 


	public function savecontactquestion()
	{
		
		if (isset($_POST) || isset($_FILES)) {


			$this->form_validation->set_rules('first_name', 'first name', 'required');
			$this->form_validation->set_rules('mobile', 'mobile', 'required');
			$this->form_validation->set_rules('subject', 'subject', 'required');
			$this->form_validation->set_rules('message', 'message', 'required');
			

			 if ($this->form_validation->run() == true)
                {


                	$insert = array(
                		'first_name	' => $_POST['first_name'], 
                		'last_name	' => $_POST['last_name'], 
                		'phone' => $_POST['mobile'], 
                		'email' => $_POST['email'], 
                		'subject' => $_POST['subject'], 
                		'message' => $_POST['message'], 
                
                	);


                	$insert_id = $this->common->insert('contactquery' , $insert);

                	if ($insert_id) {


			  			$this->session->set_flashdata('alert', '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert"> Your message has been sent. Thnak you for filling out our form.</div>');
                		
                	}else
                	{
                		$this->session->set_flashdata('alert', '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> Opps somtihng wrong!  </div>');
                	}
                     
                      
                }else
                {

                	$this->session->set_flashdata('alert', '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">'.validation_errors().'</div>');

                }


			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> Opps somtihng wrong!  </div>');
		}
		

		redirect(base_url('/page/contact'));
	}



	public function welfarefund()
	{
		$data = array();
		$data['title'] = 'Welfarefund';
		
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/welfarefund' , $data);
		$this->load->view('site/layout/footer');
	}




public function insertdonation()
	{


		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if(
			(isset($_POST['name']) && !empty($_POST['name'])) &&
			(isset($_POST['payment_id']) && !empty($_POST['payment_id'])) &&
			(isset($_POST['mobile']) && !empty($_POST['mobile']))
			 ) {

			$paymentRes = get_order($_POST['payment_id']);
			if($paymentRes)
			{
				$price = $paymentRes['amount']/100;
			}else
			{
				$price = $_POST['price'];
			}

			$insert = array(
			'name' => $_POST['name'], 
			'mobile' => $_POST['mobile'], 
			'payment_id' => $_POST['payment_id'], 
			'payment_status' =>'Authorized', 
			'price' =>$price, 
			'payment_date' => current_date(), 
			);
                     

			$insert_id = $this->common->insert('donation' , $insert);
			$capture = capture($_POST['payment_id'] , $price);
			if ($capture ) {
			$update = array();
			$update['payment_status'] = 'Complete';
			$this->common->update($insert_id , $update , 'donation');
			}
			$output['status'] = true;
			$output['msg'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">Congratulations your donation is successful  Download your receipt <a href="'.base_url("page/pdf_d/".$insert_id).'"  class="text-blue-600 underline">here</a> <div>';
		
			
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}


		echo json_encode($output);

		
	}


	public function pdf_d($id = '')
	{
			$get_data =  $this->common->getSingleRecordByFieldName(array('id' => $id) , 'donation');
			if ($get_data) {
				$array = array(
					'donation' => $get_data,
				);
				$html = $this->load->view('pdf_temp/donation', $array , true);
				pdf($html , 'D' , 'donation');
			}else
			{
				redirect();
			}
	}



	public function membershipupgrade()
	{
		$data = array();
		$data['title'] = 'membership-upgrade';
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/membership-upgrade' , $data);
		$this->load->view('site/layout/footer');
	}

	public function membershiprenew()
	{
		$data = array();
		$data['title'] = 'membership-renew';
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/membership-renew', $data);
		$this->load->view('site/layout/footer');
	}


public function checkmembershipalredy()
	{
	
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if (isset($_POST['mobile'])) {
			if (empty($_POST['mobile'])) {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> Please insert registered mobile</div>';
			}else
			{
				$userDetails = $this->common->getsingleUsersByCondtion(array('users.phone'=> $_POST['mobile'] , 'users.verify !=' => '2'));
				
				if ($userDetails) {
					$name = $userDetails['first_name'].' '.$userDetails['middle_name'].' '.$userDetails['last_name'];
					$father_husband_name = $userDetails['father_husband_name'];
					$post = $userDetails['post_type'];
					$district = $userDetails['district_name'];
					$mobile = $userDetails['phone'];
					$id = $userDetails['id'];
					$html = '

						<div class="sm:grid sm:grid-cols-2 gap-5 p-3 xs:p-7 max-w-xl mx-auto bg-gray-100 mt-5 space-y-4 sm:space-y-0">
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Name:</label>'.$name.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Father/Husband Name:</label>'.$father_husband_name.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Post:</label>'.$post.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">District:</label> '.$district.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Mobile No.:</label> '.$mobile.'</div>
						    <div class="col-span-2">
						        <label   class="flex items-center text-left space-x-2 font-medium text-sm sm:text-base text-gray-600 ">
						            <input type="checkbox" name="confirm_check"  id="confirm_check"  class="form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues">
						            <input type="hidden" value="'.$id.'" id="user__id"?>
						            <span>Confirm: if the above information is correct</span>
						        </label>
						    </div>
						</div>

						<input type="hidden" id="username" value="'.$name.'">
						<input type="hidden" id="mobile" value="'.$mobile.'">

				';

				$output['status'] = true;
				$output['data'] = $html;
				}else
				{
					$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">This Mobile number is not registered.</div>';
				}
				
			}
		}
		echo json_encode($output);

		
	}







public function upgrademembership()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if (isset($_POST['userid'])) {
			if (empty($_POST['userid'])) {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> Opps somthing wrong</div>';
			}else
			{
				$user = $this->common->getSingleRecordByFieldName(array('id' => $_POST['userid']), 'users');
				$Activemenbership = null;
				if ($user && !empty($user['membership_id'])) {
					$Activemenbership = $this->common->getSingleRecordByFieldName(array('id' => $user['membership_id']), 'user_membership');
				}
				if (!$Activemenbership) {
					$Activemenbership = $this->common->getSingleRecordByFieldName(array('user_id' => $_POST['userid'], 'membership_status' => 'Active'), 'user_membership');
				}

				if ($Activemenbership) {

					if ($Activemenbership['type'] === 'Lifetime') {
						$output['status'] = true;
						$output['data'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">You have a Life Time membership and currently, you dont need to upgrade.</div>';
					} else {
						$getmembershipforuser = $this->common->getAllRecordsByFieldName(array('type' => 'Lifetime', 'status' => '1'), 'membership', 'price ASC');
						if ($getmembershipforuser) {
							$output['status'] = true;
							$output['data'] = $this->load->view('site/section/upgrade', array('membership_list' => $getmembershipforuser), true);
						} else {
							$output['status'] = true;
							$output['data'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">No upgrade options are currently available.</div>';
						}
					}

				}else
				{
					$output['status'] = true;
					$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> Opps somthing wrong</div>';
				}
				
			}
		}



		echo json_encode($output);

		
	}





public function updatemembership()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';

		log_message('error', 'UPGRADE POST: ' . json_encode($_POST));

		

		if (
			(isset($_POST['userid']) && !empty($_POST['userid'])) &&
			(isset($_POST['id']) && !empty($_POST['id'])) &&
			(isset($_POST['payment_id']) && !empty($_POST['payment_id']))
		) {

		$_POST['payment_id'] = trim($_POST['payment_id']);
		log_message('error', 'PAYMENT ID: ' . $_POST['payment_id']);

		$existing = $this->common->getSingleRecordByFieldName(
			array('payment_id' => $_POST['payment_id']),
			'transaction'
		);

		if ($existing) {
			$output['status'] = true;
			$output['data'] = '<div class="alert alert-info">This payment was already processed.</div>';
			echo json_encode($output);
			return;
		}
		log_message('error', 'STEP 1: Duplicate check passed');
		try {
			$paymentRes = get_order($_POST['payment_id']);
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
				$output['data'] = 'Payment API error';
				echo json_encode($output);
				return;
		}
			
			log_message('error', 'PAYMENT RESPONSE: ' . json_encode($paymentRes));
			
		if (!$paymentRes) {
				$output['status'] = false;
				$output['data'] = '<div class="alert alert-danger">Payment verification failed.</div>';
				echo json_encode($output);
				return;
			}
		log_message('error', 'STEP 2: Payment verification passed');
			

			$paymentstatus = $paymentRes['status'];

			if (!in_array($paymentstatus, ['authorized', 'captured'])) {
				log_message('error', 'Invalid payment status: ' . $paymentstatus);

				$output['status'] = false;
				$output['data'] = '<div class="alert alert-danger">Invalid payment status.</div>';
				echo json_encode($output);
				return;
			}

			$price = $paymentRes['amount'] / 100;
			//$paymentID = $paymentRes['id'];
			$phone = $paymentRes['contact'];

			$member_data = $this->common->getSingleRecordByFieldName(array('id' => $_POST['userid']), $table = 'users');
			if (!$member_data) {
				log_message('error', 'User not found: ' . $_POST['userid']);
				$output['status'] = false;
				$output['data'] = '<div class="alert alert-danger">User not found.</div>';
				echo json_encode($output);
				return;
			}
			$getprice = $this->common->getSingleRecordByFieldName(array('id' => $_POST['id']), 'membership');
			if (!$getprice) {
				log_message('error', 'Membership not found: ' . $_POST['id']);
				$output['status'] = false;
				$output['data'] = '<div class="alert alert-danger">Membership not found.</div>';
				echo json_encode($output);
				return;
			}

			if ((float)$price !== (float)$getprice['price']) {
				log_message('error', 'Amount mismatch. Razorpay: ' . $price . ', Membership: ' . $getprice['price']);

				$output['status'] = false;
				$output['data'] = '<div class="alert alert-danger">Payment amount mismatch.</div>';
				echo json_encode($output);
				return;
			}

			$insert = array(
				'payment_id'     => $_POST['payment_id'],
				'price'          => $price,
				'membership_id'  => $_POST['id'],
				'user_id'        => $_POST['userid'],
				'payment_status' => ($paymentstatus == 'captured') ? 'Complete' : 'Authorized',
				'type'           => 'Membership_Upgrade',
				'name'           => $member_data['first_name'] . ' ' . $member_data['middle_name'] . ' ' . $member_data['last_name'],
				'mobile'         => $phone,
				'payment_date'   => current_date(),
			);

			
			$this->db->trans_start();
			$txn_data_id = $this->common->insert('transaction', $insert);
			if (!$txn_data_id) {
				log_message('error', 'Transaction insert failed');
			}
			log_message('error', 'STEP 3: Transaction inserted ID = ' . $txn_data_id);

			$updatedataold = array(
				'membership_status' => 'Inactive',
			);
			$this->common->updateByColumn(array('user_id' => $_POST['userid']), $updatedataold, 'user_membership');

			
			$type = ($_POST['id'] == 3) ? 'Lifetime' : 'Upgrade';
			$membership_date = current_date();
			$membership = array(
				'price'                  => $getprice['price'],
				'membership_id'          => $_POST['id'],
				'user_id'                => $_POST['userid'],
				'membership_status'      => 'Active',
				'type'                   => $type,
				'membership_date'        => $membership_date,
				'membership_expiry_date' => ($type == 'Lifetime') ? NULL : date('Y-m-d H:i:s', strtotime('+2 years', strtotime($membership_date))),
			);
			$membership_id = $this->common->insert('user_membership', $membership);
			if (!$membership_id) {
				log_message('error', 'Membership insert failed');
			}
			log_message('error', 'STEP 4: Membership inserted ID = ' . $membership_id);
			$updatemembership_id = array();
			$updatemembership_id['membership_id'] = $membership_id;
			$updatemembership_id['payment_id']     = $_POST['payment_id'];
			$this->common->update($_POST['userid'], $updatemembership_id, 'users');
			log_message('error', 'STEP 5: User updated');

			$this->db->trans_complete();
			log_message('error', 'DB Transaction completed');

			if ($this->db->trans_status() === FALSE) {
				log_message('error', 'Membership upgrade DB transaction failed');

				$output['status'] = false;
				$output['data'] = '<div class="alert alert-danger">Database transaction failed.</div>';
				echo json_encode($output);
				return;
			}


			if ($paymentstatus == 'captured') {

				$update = array();
				$update['payment_status'] = 'Complete';
				$this->common->update($txn_data_id, $update, 'transaction');
				log_message('error', 'Transaction marked as Complete for payment: ' . $_POST['payment_id']);

			} else {

				try {
					$capture = capture($_POST['payment_id'], $price);
					log_message('error', 'CAPTURE RESULT: ' . json_encode($capture));
				} catch (Exception $e) {
					log_message('error', 'Capture failed: ' . $e->getMessage());
					$capture = false;
				}

				if (!$capture) {
					log_message('error', 'Payment capture failed for payment_id: ' . $_POST['payment_id']);

					$output['status'] = false;
					$output['data'] = '<div class="alert alert-warning">Payment was authorized but capture failed. Please contact admin with Payment ID: ' . $_POST['payment_id'] . '</div>';
					echo json_encode($output);
					return;
				}

				$update = array();
				$update['payment_status'] = 'Complete';
				$this->common->update($txn_data_id, $update, 'transaction');
				log_message('error', 'Transaction marked as Complete for payment: ' . $_POST['payment_id']);
			}


			


			log_message('error', 'STEP 6: Upgrade completed successfully for payment: ' . $_POST['payment_id']);
			$output['status'] = true;
			$output['data'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">
			Congratulations! Your membership is upgraded.
			Download your receipt <a href="' . base_url("home/pdf_m/" . $_POST['userid']) . '" target="_blank" class="text-blue-600 underline">here</a>
			</div>';
			echo json_encode($output);
			return;

		} else {
			log_message('error', 'Final validation failed in updatemembership()');

			$output['status'] = false;
			$output['data'] = '<div class="alert alert-danger">Something went wrong. Please try again.</div>';
			echo json_encode($output);
			return;
		}
	}


	public function checkmembershiprenew()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';

		if (isset($_POST['mobile'])) {
			$input = trim($_POST['mobile']);
			if (empty($input)) {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">Please insert registered mobile number</div>';
			} else {
				$userDetails = $this->common->getsingleUsersByCondtion(array('users.phone' => $input, 'users.verify !=' => '2'));
				if (!$userDetails && is_numeric($input)) {
					$userDetails = $this->common->getsingleUsersByCondtion(array('users.id' => $input, 'users.verify !=' => '2'));
				}

				if ($userDetails) {
					// Get user_membership record
					$user_membership = null;
					if (!empty($userDetails['membership_id'])) {
						$user_membership = $this->common->getSingleRecordByFieldName(array('id' => $userDetails['membership_id']), 'user_membership');
					}
					if (!$user_membership) {
						$this->db->where('user_id', $userDetails['id']);
						$this->db->order_by('id', 'DESC');
						$user_membership = $this->db->get('user_membership')->row_array();
					}

					// Get membership plan details
					$membership_plan = null;
					if ($user_membership && !empty($user_membership['membership_id'])) {
						$membership_plan = $this->common->getSingleRecordByFieldName(array('id' => $user_membership['membership_id']), 'membership');
					}
					if (!$membership_plan && !empty($userDetails['membership_name'])) {
						$plan_name = $userDetails['membership_name'];
					} elseif ($membership_plan) {
						$plan_name = $membership_plan['name'];
					} else {
						$plan_name = '2 years membership';
					}

					$name = trim($userDetails['first_name'] . ' ' . $userDetails['middle_name'] . ' ' . $userDetails['last_name']);
					$father_husband_name = $userDetails['father_husband_name'];
					$post = !empty($userDetails['post_name']) ? $userDetails['post_name'] : $userDetails['post_type'];
					$district = $userDetails['district_name'];
					$mobile = $userDetails['phone'];
					$id = $userDetails['id'];

					// Check active vs expired
					$now = date('Y-m-d H:i:s');
					$is_lifetime = ($user_membership && $user_membership['type'] === 'Lifetime');
					$is_expired = false;
					$status_badge = '';
					$action_html = '';
					$expiry_text = '';

					if ($is_lifetime) {
						$status_badge = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-semibold bg-green-100 text-green-800 border border-green-300">Active (Lifetime)</span>';
						$action_html = '
							<div class="col-span-2 pt-2">
								<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-sm my-2 text-left" role="alert">
									You have a Life Time membership and currently, your membership never expires. Renewal is not required.
								</div>
							</div>';
					} else {
						$expiry_date = null;
						if ($user_membership && !empty($user_membership['membership_expiry_date'])) {
							$expiry_date = $user_membership['membership_expiry_date'];
						} elseif ($user_membership && !empty($user_membership['membership_date'])) {
							$expiry_date = date('Y-m-d H:i:s', strtotime('+2 years', strtotime($user_membership['membership_date'])));
						} elseif (!empty($userDetails['membership_join_date'])) {
							$expiry_date = date('Y-m-d H:i:s', strtotime('+2 years', strtotime($userDetails['membership_join_date'])));
						}

						if ($expiry_date) {
							$expiry_text = date('d-m-Y', strtotime($expiry_date));
							if ($expiry_date < $now || ($user_membership && $user_membership['membership_status'] === 'Inactive')) {
								$is_expired = true;
								$status_badge = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-semibold bg-red-100 text-red-800 border border-red-300">Expired (' . $expiry_text . ')</span>';
							} else {
								$is_expired = false;
								$status_badge = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-semibold bg-green-100 text-green-800 border border-green-300">Active (Valid till: ' . $expiry_text . ')</span>';
							}
						} else {
							$is_expired = true;
							$status_badge = '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-semibold bg-red-100 text-red-800 border border-red-300">Expired</span>';
						}

						if ($is_expired) {
							$action_html = '
								<div class="col-span-2 pt-2">
									<div class="relative p-3 sm:p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-sm my-2 text-left" role="alert">
										Your membership has <strong>Expired</strong>' . (!empty($expiry_text) ? ' on ' . $expiry_text : '') . '. Please confirm your details below to renew with your current membership option.
									</div>
									<label class="flex items-center text-left space-x-2 font-medium text-sm sm:text-base text-gray-700 cursor-pointer pt-3">
										<input type="checkbox" name="confirm_renew_check" id="confirm_renew_check" class="form-radio h-6 w-6 shadow-inner border border-gray-300 text-blues focus:ring-blues">
										<input type="hidden" value="' . $id . '" id="user__id">
										<span>Confirm: if the above information is correct and you want to renew</span>
									</label>
								</div>';
						} else {
							$action_html = '
								<div class="col-span-2 pt-2">
									<div class="relative p-3 sm:p-4 border border-blue-500 rounded text-blue-700 bg-blue-50 font-semibold shadow-sm my-2 text-left" role="alert">
										Your membership is currently <strong>Active</strong> and valid until <strong>' . $expiry_text . '</strong>. Renewal is only required once your membership has expired.
									</div>
								</div>';
						}
					}

					$html = '
						<div class="sm:grid sm:grid-cols-2 gap-4 p-4 xs:p-7 max-w-xl mx-auto bg-gray-100 rounded-lg mt-5 space-y-3 sm:space-y-0 text-left border border-gray-200 shadow-sm">
							<div class="text-gray-700 font-semibold"><label class="font-medium text-xs text-gray-500 uppercase pb-1 block">Name:</label>' . htmlspecialchars($name) . '</div>
							<div class="text-gray-700 font-semibold"><label class="font-medium text-xs text-gray-500 uppercase pb-1 block">Father/Husband Name:</label>' . htmlspecialchars($father_husband_name) . '</div>
							<div class="text-gray-700 font-semibold"><label class="font-medium text-xs text-gray-500 uppercase pb-1 block">Post:</label>' . htmlspecialchars($post) . '</div>
							<div class="text-gray-700 font-semibold"><label class="font-medium text-xs text-gray-500 uppercase pb-1 block">District:</label>' . htmlspecialchars($district) . '</div>
							<div class="text-gray-700 font-semibold"><label class="font-medium text-xs text-gray-500 uppercase pb-1 block">Mobile No.:</label>' . htmlspecialchars($mobile) . '</div>
							<div class="text-gray-700 font-semibold"><label class="font-medium text-xs text-gray-500 uppercase pb-1 block">Current Plan:</label>' . htmlspecialchars($plan_name) . '</div>
							<div class="sm:col-span-2 text-gray-700 font-semibold"><label class="font-medium text-xs text-gray-500 uppercase pb-1 block">Membership Status:</label>' . $status_badge . '</div>
							' . $action_html . '
						</div>
						<input type="hidden" id="username" value="' . htmlspecialchars($name, ENT_QUOTES) . '">
						<input type="hidden" id="mobile" value="' . htmlspecialchars($mobile, ENT_QUOTES) . '">
					';

					$output['status'] = true;
					$output['data'] = $html;
				} else {
					$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">This Mobile number / Member ID is not registered.</div>';
				}
			}
		}
		echo json_encode($output);
	}

	public function renewmembership()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';

		if (isset($_POST['userid']) && !empty($_POST['userid'])) {
			$user = $this->common->getSingleRecordByFieldName(array('id' => $_POST['userid']), 'users');
			if (!$user) {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">User not found.</div>';
				echo json_encode($output);
				return;
			}

			$user_membership = null;
			if (!empty($user['membership_id'])) {
				$user_membership = $this->common->getSingleRecordByFieldName(array('id' => $user['membership_id']), 'user_membership');
			}
			if (!$user_membership) {
				$this->db->where('user_id', $_POST['userid']);
				$this->db->order_by('id', 'DESC');
				$user_membership = $this->db->get('user_membership')->row_array();
			}

			if ($user_membership && $user_membership['type'] === 'Lifetime') {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">You have a Life Time membership and currently, you do not need to renew.</div>';
				echo json_encode($output);
				return;
			}

			// Check if active and not expired
			$now = date('Y-m-d H:i:s');
			$expiry_date = null;
			if ($user_membership && !empty($user_membership['membership_expiry_date'])) {
				$expiry_date = $user_membership['membership_expiry_date'];
			} elseif ($user_membership && !empty($user_membership['membership_date'])) {
				$expiry_date = date('Y-m-d H:i:s', strtotime('+2 years', strtotime($user_membership['membership_date'])));
			}

			if ($expiry_date && $expiry_date >= $now && $user_membership['membership_status'] === 'Active') {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-blue-500 rounded text-blue-700 bg-blue-50 font-semibold shadow-md my-2" role="alert">Your membership is currently active until ' . date('d-m-Y', strtotime($expiry_date)) . ' and does not need renewal yet.</div>';
				echo json_encode($output);
				return;
			}

			// Fetch their current membership plan
			$current_membership = null;
			if ($user_membership && !empty($user_membership['membership_id'])) {
				$current_membership = $this->common->getSingleRecordByFieldName(array('id' => $user_membership['membership_id']), 'membership');
			}

			// If current membership is inactive or not found, fallback to active 2-year membership plan
			if (!$current_membership || $current_membership['status'] != '1') {
				$current_membership = $this->common->getSingleRecordByFieldName(array('type' => 'Upgrade', 'status' => '1'), 'membership', 'id ASC');
			}

			if ($current_membership) {
				$output['status'] = true;
				$output['data'] = $this->load->view('site/section/renew', array('membership' => $current_membership), true);
			} else {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">No renewal options are currently available. Please contact admin.</div>';
			}
		} else {
			$output['status'] = true;
			$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">Oops, something went wrong.</div>';
		}

		echo json_encode($output);
	}

	public function updaterenewmembership()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';

		log_message('error', 'RENEW POST: ' . json_encode($_POST));

		if (
			(isset($_POST['userid']) && !empty($_POST['userid'])) &&
			(isset($_POST['id']) && !empty($_POST['id'])) &&
			(isset($_POST['payment_id']) && !empty($_POST['payment_id']))
		) {
			$_POST['payment_id'] = trim($_POST['payment_id']);

			$existing = $this->common->getSingleRecordByFieldName(
				array('payment_id' => $_POST['payment_id']),
				'transaction'
			);

			if ($existing) {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-blue-500 rounded text-blue-700 bg-blue-50 font-semibold shadow-md my-2">This payment was already processed.</div>';
				echo json_encode($output);
				return;
			}

			try {
				$paymentRes = get_order($_POST['payment_id']);
			} catch (Exception $e) {
				log_message('error', 'Renewal payment API error: ' . $e->getMessage());
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">Payment API error</div>';
				echo json_encode($output);
				return;
			}

			if (!$paymentRes) {
				$output['status'] = false;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">Payment verification failed.</div>';
				echo json_encode($output);
				return;
			}

			$paymentstatus = $paymentRes['status'];
			if (!in_array($paymentstatus, ['authorized', 'captured'])) {
				$output['status'] = false;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">Invalid payment status: ' . htmlspecialchars($paymentstatus) . '</div>';
				echo json_encode($output);
				return;
			}

			$price = $paymentRes['amount'] / 100;
			$phone = $paymentRes['contact'];

			$member_data = $this->common->getSingleRecordByFieldName(array('id' => $_POST['userid']), 'users');
			if (!$member_data) {
				$output['status'] = false;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">User not found.</div>';
				echo json_encode($output);
				return;
			}

			$getprice = $this->common->getSingleRecordByFieldName(array('id' => $_POST['id']), 'membership');
			if (!$getprice) {
				$output['status'] = false;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">Membership plan not found.</div>';
				echo json_encode($output);
				return;
			}

			if ((float)$price !== (float)$getprice['price']) {
				$output['status'] = false;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">Payment amount mismatch.</div>';
				echo json_encode($output);
				return;
			}

			$insert = array(
				'payment_id'     => $_POST['payment_id'],
				'price'          => $price,
				'membership_id'  => $_POST['id'],
				'user_id'        => $_POST['userid'],
				'payment_status' => ($paymentstatus == 'captured') ? 'Complete' : 'Authorized',
				'type'           => 'Membership_Renew',
				'name'           => trim($member_data['first_name'] . ' ' . $member_data['middle_name'] . ' ' . $member_data['last_name']),
				'mobile'         => $phone,
				'payment_date'   => current_date(),
			);

			$this->db->trans_start();

			$txn_data_id = $this->common->insert('transaction', $insert);

			// Mark previous memberships as Inactive
			$this->common->updateByColumn(array('user_id' => $_POST['userid']), array('membership_status' => 'Inactive'), 'user_membership');

			// Insert new renewed membership
			$membership_date = current_date();
			$membership = array(
				'price'                  => $getprice['price'],
				'membership_id'          => $_POST['id'],
				'user_id'                => $_POST['userid'],
				'membership_status'      => 'Active',
				'type'                   => 'Renew',
				'membership_date'        => $membership_date,
				'membership_expiry_date' => date('Y-m-d H:i:s', strtotime('+2 years', strtotime($membership_date))),
			);
			$membership_id = $this->common->insert('user_membership', $membership);

			$updatemembership_id = array(
				'membership_id' => $membership_id,
				'payment_id'    => $_POST['payment_id']
			);
			$this->common->update($_POST['userid'], $updatemembership_id, 'users');

			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				log_message('error', 'Membership renew DB transaction failed');
				$output['status'] = false;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">Database transaction failed.</div>';
				echo json_encode($output);
				return;
			}

			if ($paymentstatus == 'captured') {
				$this->common->update($txn_data_id, array('payment_status' => 'Complete'), 'transaction');
			} else {
				try {
					$capture = capture($_POST['payment_id'], $price);
				} catch (Exception $e) {
					log_message('error', 'Capture failed: ' . $e->getMessage());
					$capture = false;
				}

				if (!$capture) {
					$output['status'] = false;
					$output['data'] = '<div class="relative p-4 border border-yellow-500 rounded text-yellow-800 bg-yellow-50 font-semibold shadow-md my-2">Payment was authorized but capture failed. Please contact admin with Payment ID: ' . htmlspecialchars($_POST['payment_id']) . '</div>';
					echo json_encode($output);
					return;
				}

				$this->common->update($txn_data_id, array('payment_status' => 'Complete'), 'transaction');
			}

			log_message('error', 'STEP: Renewal completed successfully for payment: ' . $_POST['payment_id']);
			$output['status'] = true;
			$output['data'] = '<div class="relative p-6 border border-green-500 rounded-lg text-green-800 bg-green-50 font-semibold shadow-md my-4 text-center">
				<h4 class="text-xl font-bold mb-2">🎉 Congratulations! Your membership has been renewed successfully.</h4>
				<p class="text-gray-700 mb-4">Your membership validity has been extended by 2 years.</p>
				<a href="' . base_url("home/pdf_m/" . $_POST['userid']) . '" target="_blank" class="inline-block bg-primary hover:bg-secondary text-white font-bold py-2 px-6 rounded shadow transition duration-200">Download Receipt (PDF)</a>
			</div>';
			echo json_encode($output);
			return;
		} else {
			$output['status'] = false;
			$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2">Something went wrong. Please try again.</div>';
			echo json_encode($output);
			return;
		}
	}


	public function lifeTimeMembership()
	{
		$response = array('success' => false, 'msg' => '');

		$userid        = $this->input->post('userid');
		$membership_id = $this->input->post('membership_id');

		log_message('error', 'lifeTimeMembership POST: userid=' . $userid . ', membership_id=' . $membership_id);

		if (empty($userid) || empty($membership_id)) {
			log_message('error', 'lifeTimeMembership: missing userid or membership_id');
			$response['msg'] = 'Invalid request.';
			echo json_encode($response);
			return;
		}

		$user = $this->common->getSingleRecordByFieldName(array('id' => $userid), 'users');
		if (!$user) {
			log_message('error', 'lifeTimeMembership: user not found: ' . $userid);
			$response['msg'] = 'User not found.';
			echo json_encode($response);
			return;
		}

		$membership = $this->common->getSingleRecordByFieldName(array('id' => $membership_id), 'membership');
		if (!$membership) {
			log_message('error', 'lifeTimeMembership: membership not found: ' . $membership_id);
			$response['msg'] = 'Membership not found.';
			echo json_encode($response);
			return;
		}

		if (!isset($membership['type']) || $membership['type'] !== 'Lifetime') {
			log_message('error', 'lifeTimeMembership: not a lifetime membership: ' . $membership_id);
			$response['msg'] = 'Go to online payment';
			echo json_encode($response);
			return;
		}

		$user = $this->common->getSingleRecordByFieldName(array('id' => $userid), 'users');
		if ($user && !empty($user['membership_id'])) {
			$activeUm = $this->common->getSingleRecordByFieldName(array('id' => $user['membership_id']), 'user_membership');
			if ($activeUm && $activeUm['type'] === 'Lifetime') {
				log_message('error', 'lifeTimeMembership: user already lifetime: ' . $userid);
				$response['success'] = true;
				$response['msg'] = 'You have a Life Time membership and currently, you dont need to upgrade.';
				echo json_encode($response);
				return;
			}
		}

		$existing = $this->common->getSingleRecordByFieldName(
			array('user_id' => $userid, 'membership_id' => $membership_id, 'membership_status' => 'Active'),
			'user_membership'
		);
		if ($existing) {
			log_message('error', 'lifeTimeMembership: duplicate active membership for user: ' . $userid);
			$response['success'] = true;
			$response['msg'] = 'You have a Life Time membership and currently, you dont need to upgrade.';
			echo json_encode($response);
			return;
		}

		$this->db->trans_start();

		$updatedataold = array(
			'membership_status' => 'Inactive',
		);
		$this->common->updateByColumn(array('user_id' => $userid), $updatedataold, 'user_membership');

		$membershipdata = array(
			'price'                  => $membership['price'],
			'membership_id'          => $membership_id,
			'user_id'                => $userid,
			'membership_status'      => 'Active',
			'type'                   => 'Lifetime',
			'membership_date'        => current_date(),
			'membership_expiry_date' => NULL,
		);
		$nsetmembership_id = $this->common->insert('user_membership', $membershipdata);

		$updatemembership_id = array();
		$updatemembership_id['membership_id'] = $nsetmembership_id;
		$this->common->update($userid, $updatemembership_id, 'users');

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			log_message('error', 'lifeTimeMembership: DB transaction failed for user: ' . $userid);
			$response['msg'] = 'Database error. Please try again.';
			echo json_encode($response);
			return;
		}

		log_message('error', 'lifeTimeMembership: completed successfully for user: ' . $userid);
		$response['success'] = true;
		$response['msg'] = 'Your membership update successful, the administrator will verify your account and inform you.';
		echo json_encode($response);
	}


	public function loadmore()
	{


		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['btn'] = '';
		$output['msg'] = '';
		if(
			(isset($_POST['gallery_id']) && !empty($_POST['gallery_id'])) &&
			(isset($_POST['per_page']) && !empty($_POST['per_page'])) &&
			(isset($_POST['row']) && !empty($_POST['row']))
			
			

			   ) {

						/*getAllRecordsByFieldName($fieldname = '' , $table='' , $order_by = '' , $limit = '' , $offset='')*/

$get_data =	$this->common->getAllRecordsByFieldName(array('gallery_id' => $_POST['gallery_id']) , 'gallery_image' , 'DESC'  , $_POST['per_page'] , $_POST['row']);




							if ($get_data) {

								$html = '';
								
								foreach ($get_data as $key => $image) {
									
									$html .= ' <a class="gl-thumb rounded-md overflow-hidden relative h-48 lg:h-60 xl:h-80 block group" href="'.base_url("uploads/".$image["image"]).'">
																	      <img src="'.base_url("uploads/".$image["image"]).'" alt="" class="w-full h-full object-cover object-center transition duration-300 group-hover:scale-105">
																	      <span class="absolute inset-0 bg-primary/70 opacity-0 scale-95 flex items-center justify-center transition duration-300 group-hover:opacity-100 group-hover:scale-100">
																	         <span class="text-white"><svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																	            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
																	          </svg></span>
																	      </span>
													   </a>';
																				
													}

								$row = $_POST['row'] + $_POST['per_page'];

								  $output['status'] = true;
								  $output['data'] = $html;


								 if (count($get_data) == $_POST['per_page'] ) {
								 	$output['btn'] = '<a href="javascript:void(0)" onclick="loadmore('.$_POST["gallery_id"].' , '.$_POST['per_page'].', '.$row.')" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 px-10 ">Load More</a>';

								 }

								
							}else
							{
								$output['status'] = true;
							}

								
                   

			                   
								
								
				
			
			
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}


		echo json_encode($output);

		
	}











	public function gallery()
	{
		$data = array();
		$data['title'] = 'Gallery';


		$this->load->library("pagination");

				$per_page = 2;

				$total_rows = $this->common->countrecords(array('status' => '1' ) , 'gallery');

				$config = array();
				$config["base_url"] = base_url('/page/gallery');
				$config["total_rows"] = $total_rows;
				$config["per_page"] = $per_page;
				$config["uri_segment"] = 3;
				$config['use_page_numbers'] = true;
				$config['reuse_query_string'] = true;
				$config['num_links'] = 10;

				$config['num_tag_open'] = '<li class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200">'; 
				$config['num_tag_close'] = '</li>'; 
				$config['cur_tag_open'] = '<li class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200 active"><a href="javascript:void(0);">'; 
				$config['cur_tag_close'] = '</a></li>'; 
				$config['next_link'] = ' <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
             <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
           </svg>'; 
				$config['prev_link'] = '<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
             <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
           </svg>'; 
				$config['next_tag_open'] = '<li class="pg-next relative inline-flex items-center px-2 py-2 rounded-r border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-200">'; 
				$config['next_tag_close'] = '</li>'; 
				$config['prev_tag_open'] = '<li class="pg-prev relative inline-flex items-center px-2 py-2 rounded-l border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-200">'; 
				$config['prev_tag_close'] = '</li>'; 
				$config['first_tag_open'] = '<li class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200">'; 
				$config['first_tag_close'] = '</li>'; 
				$config['last_tag_open'] = '<li class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-200">'; 
				$config['last_tag_close'] = '</li>';

				$this->pagination->initialize($config);



				if ($this->uri->segment(3) && is_numeric($this->uri->segment(3))) {
					$page  = ($this->uri->segment(3) - 1) * $per_page; 

					

					$data['rowstart'] = ($this->uri->segment(3)*$per_page) - $per_page;


					$data['rowend'] = $this->uri->segment(3)*$per_page;
				
					

				}else
				{
					$page =  0;
					$data['rowstart'] = 1;
					if($total_rows < $per_page)
					{
						$data['rowend'] = $total_rows;	
					}else
					{
						$data['rowend'] = $per_page;	
					}
					
				}


				$data['gallery_list'] = $this->common->gallery($per_page , $page);


			

				$data['total_rows'] = $total_rows;





		
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/gallery' , $data);
		$this->load->view('site/layout/footer');
	}








	public function executives()
	{
		$data = array();
		$data['title'] = 'Executives';
		

		$committee =  $this->common->getSingleRecordById('1' ,  'committee');
		$memberlist =  $this->common->memberlist('1');

		$send_data = array(
			'memberlist' => $memberlist,
			'committee' => $committee,
		);

		

		$data['other_committee_list'] =  $this->common->getAllRecordsByFieldName(array('type'=>'Other_committee'), $table='committee' , $order_by = 'DESC');
		$data['distric_committee_list'] =  $this->common->getAllRecordsByFieldName(array('type'=>'District_committee' , 'parient_id'=>'7'), $table='committee' , $order_by = 'sort ASC');
		$data['members'] = $this->load->view('site/section/executive-members' , $send_data , true);
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/exceutive' , $data);
		$this->load->view('site/layout/footer');
	}



	public function memberlist($id="")
	{

		$committee =  $this->common->getSingleRecordById($id ,  'committee');
		$memberlist =  $this->common->memberlist($id);

		$data = array(
			'memberlist' => $memberlist,
			'committee' => $committee,
		);

		$output = $this->load->view('site/section/executive-members' , $data  , true);

		return $output;
		
	}



	public function ajax_members()
	{
		
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
	
		if((isset($_POST['id']) && !empty($_POST['id']))) {

				
				$output['status'] = true;
				$output['data']  = $this->memberlist($_POST['id']);
				
		}else
		{
			$output['data'] = 'Opps somthing wrong!';
		}


		echo json_encode($output);

		
	}

	public function permanentmember()
    {
        $data = [];
        $data['title'] = 'MemberList';
         $data['rows'] = $this->ourmember->get_all_pwemanentmembers();
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/permanentmemberlist', $data);
        $this->load->view('site/layout/footer');
    }

	public function ourmember()
    {
        $data = [];
        $data['title'] = 'MemberList';
        $data['rows'] = $this->ourmember->get_all_pwemanentmembers();
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/memberlist', $data);
        $this->load->view('site/layout/footer');
    }

    public function ajax_member_list()
    {
/*      echo $this->uri->segment(3); die;*/
        $output = [];
        $output['status'] = false;
        $output['data'] = '';
        $i=2;

        if(isset($_POST['page']))
        {
        if (!empty($_POST['page']) && is_numeric($_POST['page'])) {
            $pagenumber = $_POST['page'];
        }else
        {
            $pagenumber = 0;
        }

        $searchArr = array();
        $searchArr['name'] = $_POST['name'];
        $searchArr['post_name'] = $_POST['post_name'];
        $searchArr['post_distric'] = $_POST['post_distric'];

         
        $this->load->library("pagination");
        $per_page = 50;
          if($pagenumber > 0)
        {
            $page = ($pagenumber - 1) * $per_page;
            $serial_number = $pagenumber * $per_page - $per_page+1;
            
        }else
        {
            $page = 0;
            $serial_number = 1;
        }
       
  


	// 	padding-left: 1rem;
    // padding-right: 1rem;
	// padding-top: 0.5rem;
    // padding-bottom: 0.5rem;

        
        $total_rows = $this->ourmember->count_all_members($searchArr);
        $config = [];
        $config["base_url"] = base_url('/page/ajax_member_list');
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $per_page;
   
        $config['use_page_numbers'] = true;
        $config['num_links'] = 1;
         $config["uri_segment"] = 3;
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


        $data['rows'] = $this->ourmember->get_all_members($searchArr , $per_page, $page);
        $data['count'] = $serial_number;
        $data['total_rows'] =  $total_rows;
        $output['data'] = $this->load->view('site/section/ajax_member', $data , true);
        $output['status'] = true;
       
        /* echo '<pre>'; print_r($this->pagination); */

         // echo '<br>';

         // echo '<pre>'; print_r(count($this->ourmember->get_all_members($searchArr , $per_page, $page))); 
       /*  die;*/

        }
        
         echo json_encode($output);
    }


	public function ajax_permanent_member_list()
	{
		$output = [];
		$output['status'] = false;
		$output['data'] = '';

		if(isset($_POST['page']))
		{
		if (!empty($_POST['page']) && is_numeric($_POST['page'])) {
			$pagenumber = $_POST['page'];
		}else
		{
			$pagenumber = 0;
		}

		$searchArr = array();
		$searchArr['name'] = $_POST['name'];
		$searchArr['post_name'] = $_POST['post_name'];
		$searchArr['post_distric'] = $_POST['post_distric'];


		$this->load->library("pagination");
		$per_page = 50;
		  if($pagenumber > 0)
		{
			$page = ($pagenumber - 1) * $per_page;
			$serial_number = $pagenumber * $per_page - $per_page+1;

		}else
		{
			$page = 0;
			$serial_number = 1;
		}


		$total_rows = $this->ourmember->count_all_permanent_members($searchArr);
		$config = [];
		$config["base_url"] = base_url('/page/ajax_permanent_member_list');
		$config["total_rows"] = $total_rows;
		$config["per_page"] = $per_page;

		$config['use_page_numbers'] = true;
		$config['num_links'] = 1;
		$config["uri_segment"] = 3;
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


		$data['rows'] = $this->ourmember->get_all_permanent_members($searchArr , $per_page, $page);
		$data['count'] = $serial_number;
		$data['total_rows'] =  $total_rows;
		$output['data'] = $this->load->view('site/section/ajax_member', $data , true);
		$output['status'] = true;

		}

		 echo json_encode($output);
	}






   public function pdflist ()
    {
        $data = [];
        $data['title'] = '';
        $data['rows'] =  $this->common->get_list_by_cat();
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/pdflist', $data);
        $this->load->view('site/layout/footer');
    } 


    public function mahasamitimember()
    {
        $data = [];
        $data['title'] = 'MemberList';
         $data['rows'] = $this->common->MahasamitiMembers(['mahasamiti_members.status'=> '1']);
        $this->load->view('site/layout/header');
        $this->load->view('site/pages/mahasamitimemberlist', $data);
        $this->load->view('site/layout/footer');
    }


    public function mahasamitijoin()
	{
		$data = array();
		$data['title'] = 'membership-upgrade';
		$this->load->view('site/layout/header');
		$this->load->view('site/pages/mahasamiti-join' , $data);
		$this->load->view('site/layout/footer');
	}

	public function checkbyphoneNumber()
	{
	
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if (isset($_POST['mobile'])) {
			if (empty($_POST['mobile'])) {
				$output['status'] = true;
				$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert"> Please insert registered mobile</div>';
			}else
			{
				$userDetails = $this->common->getsingleUsersByCondtion(array('users.phone'=> $_POST['mobile'] , 'users.verify !=' => '2'));


				if ($userDetails) {

					$row = $this->common->getSingleRecordByFieldName(['user_id'=>$userDetails['id']] , 'mahasamiti_members');
					if($row)
					{
							$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">आप महासमिति के सदस्य पहले से हैं, दुबारा शामिल नहीं हो सकते।</div>';
					}else
					{
					$name = $userDetails['first_name'].' '.$userDetails['middle_name'].' '.$userDetails['last_name'];
					$father_husband_name = $userDetails['father_husband_name'];
					$post = $userDetails['post_type'];
					$district = $userDetails['district_name'];
					$mobile = $userDetails['phone'];
					$id = $userDetails['id'];
					$html = '

						<div class="sm:grid sm:grid-cols-2 gap-5 p-3 xs:p-7 max-w-xl mx-auto bg-gray-100 mt-5 space-y-4 sm:space-y-0">
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Name:</label>'.$name.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Father/Husband Name:</label>'.$father_husband_name.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Post:</label>'.$post.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">District:</label> '.$district.'</div>
						    <div class="relative text-left text-gray-600 font-semibold"><label class="font-medium pb-1 block">Mobile No.:</label> '.$mobile.'</div>
						    <div class="col-span-2">
						        <label   class="flex items-center text-left space-x-2 font-medium text-sm sm:text-base text-gray-600 ">

						            <span>महासमिति सदस्य निर्वाचन हेतु आवेदन करने के लिए महासमिति सदस्य हेतु निर्धारित शुल्क का भुगतान करें.</span>
						        </label> 
						    </div>
						    <div class="col-span-6">
			                  <button type="button" class="rounded flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-md py-4 px-4 w-100" id="payment_btn">Mahasamiti Join ₹2000</button>
			                  </div>
						</div>

						<input type="hidden" id="username" value="'.$name.'">
						<input type="hidden" id="mobile" value="'.$mobile.'">
						 <input type="hidden" value="'.$id.'" id="user__id"?>

				';

				$output['status'] = true;
				$output['data'] = $html;
					}

				}else
				{
					$output['data'] = '<div class="relative p-4 border border-red-500 rounded text-red-700 bg-red-50 font-semibold shadow-md my-2" role="alert">This Mobile number is not registered.</div>';
				}
				
			}
		}
		echo json_encode($output);

		
	}

	public function insertmahasamitiMember()
	{
		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';
		if(
			(isset($_POST['userid']) && !empty($_POST['userid'])) &&
			(isset($_POST['price']) && !empty($_POST['price'])) && 
			(isset($_POST['payment_id']) && !empty($_POST['payment_id'])) 
		) {

			$paymentRes = get_order($_POST['payment_id']);
			if($paymentRes)
			{
				$price = $paymentRes['amount']/100;
			}else
			{
				$price = $_POST['price'];
			}
			$insert = array(
			'user_id' => $_POST['userid'], 
			'payment_id' => $_POST['payment_id'], 
			'payment_status' =>'Authorized', 
			'amount' =>$price, 
			'status' =>'0', 
			'payment_date' => current_date(), 
			);
                     

			$insert_id = $this->common->insert('mahasamiti_members' , $insert);
			$capture = capture($_POST['payment_id'] , $price);
			if ($capture ) {
			$update = array();
			$update['payment_status'] = 'Complete';
			$this->common->update($insert_id , $update , 'mahasamiti_members');
			}
			$output['status'] = true;
			$output['msg'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">
				    बधाई हो! आप महासमिति के सदस्य बन चुके हैं। आप अपना नाम महासमिति सदस्य सूची में देख सकते हैं। 
				    <a href="'.base_url('home/pdf_mahasamiti/'.$insert_id).'" class="text-blue-600 underline downloadrecept">Download</a>
				</div>';

			
		
			
		}else
		{
			$output['msg'] = 'Opps somthing wrong!';
		}


		echo json_encode($output);

		
	}




}
