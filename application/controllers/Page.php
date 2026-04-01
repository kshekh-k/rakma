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
					$district = $userDetails['district'];
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
				$Activemenbership = $this->common->getSingleRecordByFieldName(array('user_id'=> $_POST['userid'] , 'membership_status' =>'Active'), $table='user_membership');
				if ($Activemenbership) {
					$getmembershipforuser = $this->common->getAllRecordsByFieldName(array('price >'=> $Activemenbership['price'] , 'status'=>'1'), $table='membership', 'price ASC');
					if ($getmembershipforuser) {
						$output['status'] = true;
						$output['data']	= $this->load->view('site/section/upgrade' , array('membership_list' =>$getmembershipforuser ) , true);
					}else
					{

					$membership = $this->common->getSingleRecordByFieldName(array('id' =>$Activemenbership['membership_id']), 'membership');

						$output['status'] = true;
						$output['data'] = '<div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">You have an '.$membership["name"].' membership and currently, you dont need to upgrade. </div>';
						
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
		if(
			(isset($_POST['userid']) && !empty($_POST['userid'])) &&
			(isset($_POST['id']) && !empty($_POST['id'])) && 
			(isset($_POST['price']) && !empty($_POST['price'])) && 
			(isset($_POST['payment_id']) && !empty($_POST['payment_id'])) 
		) {
			
			
			$paymentRes = get_order($_POST['payment_id']);
				if($paymentRes)
				{
					$paymentstatus = $paymentRes['status'];
					$price = $paymentRes['amount']/100;
					$paymentID = $paymentRes['id'];
					$phone = $paymentRes['contact'];
					$member_data = $this->common->getSingleRecordByFieldName(array('id'=> $_POST['userid'] ), $table='users');
					$insert = array(
					'payment_id' => $_POST['payment_id'], 
					'price' => $price, 
					'membership_id' => $_POST['id'], 
					'user_id' => $_POST['userid'], 
					'payment_status' =>$paymentstatus, 
					'type' =>'Membership_Upgrade',
					'name' =>$member_data['first_name'].' '.$member_data['middle_name'].' '.$member_data['last_name'],
					'mobile' =>$phone,
					'payment_date' =>current_date(),
					);
					$txn_data_id =  $this->common->insert('transaction' , $insert);


					$updatedataold = array(
					'membership_status' =>'Inactive', 
					);
					$this->common->updateByColumn(array('user_id'=>$_POST['userid']), $updatedataold , 'user_membership');

					$getprice = 	$this->common->getSingleRecordByFieldName(array('id' =>$_POST['id']), 'membership');
					$membership = array(
					'price' => $getprice['price'], 
					'membership_id' => $_POST['id'], 
					'user_id' =>  $_POST['userid'], 
					'membership_status' =>'Active',
					'type' => ($_POST['id'] == 3) ? 'Lifetime' : 'Upgrade',
					'membership_date' =>current_date(),
					);
					$membership_id =  $this->common->insert('user_membership' , $membership);

					$updatemembership_id = array();
					$updatemembership_id['membership_id'] = $membership_id;
					$updatemembership_id['payment_id'] =  $_POST['payment_id'];
					$this->common->update($_POST['userid'] , $updatemembership_id , 'users');

					$capture = capture($_POST['payment_id'] , $price);
					if ($capture) {
					$update = array();
					$update['payment_status'] = 'Complete';
					$this->common->update($txn_data_id , $update , 'transaction');
				}
				}




			$output['status'] = true;
			$output['data'] = ' <div class="relative p-4 border border-green-500 rounded text-green-700 bg-green-50 font-semibold shadow-md my-2" role="alert">
			Congratulations! Your your membership is upgraded. Download your receipt <a href="'.base_url("home/pdf_m/".$_POST['userid']).'" target="_blank" class="text-blue-600 underline">here</a>
			</div>';
		}else
		{
			$output['data'] = 'Opps somthing wrong!';
		}
		echo json_encode($output);
	}


	public function lifeTimeMembership()
	{
	    $userid = $this->input->post('userid'); // Assuming you're using CodeIgniter
	    $membership_id = $this->input->post('membership_id'); // Assuming you're using CodeIgniter
	   
	    // Get price of the membership
	    $membership = $this->common->getSingleRecordByFieldName(array('id' => $membership_id), 'membership');

	  

	   if(isset($membership['type']) && $membership['type'] == 'Lifetime')
	   {
	   		$membershipdata = array(
			'price' => $membership['price'], 
			'membership_id' =>$membership_id, 
			'user_id' => $userid, 
			'membership_status' =>'Active',
			'type' =>'Lifetime',
			'membership_date' =>current_date(),
			);
			$nsetmembership_id =  $this->common->insert('user_membership' , $membershipdata);

			$updatemembership_id = array();
			$updatemembership_id['membership_id'] = $nsetmembership_id;
			$this->common->update($userid , $updatemembership_id , 'users');

	   
	    	$response = array('success' => true  , 'msg' => 'Your membershp update  successful, the administrator will verify your account and inform you.'); // You can add more data if needed
	   }else
	   {
	   		$response = array('success' => false  , 'Go to online payment'); // You can add more data if needed
	   }



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
					$district = $userDetails['district'];
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
