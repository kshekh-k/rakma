<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donation extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All Donation List';
		$data['rows'] = $this->common->getAllRecords('donation' , 'DESC');
		$data['donation_info'] =  $this->common->doantion_info();

		//echo '<pre>'; print_r($data); die;
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/donation/index' , $data);
		$this->load->view('admin/layout/footer');
	}


		public function paymentst($id= '')
		{
			$get_data = $this->common->getSingleRecordByFieldName(array('id'=> $id)  , 'donation');


			if ($get_data) {

				$capture = capture($get_data['payment_id'] , $get_data['price']);
				if ($capture) {
				$update = array();
				$update['payment_status'] = 'Complete';
				$this->common->update($id , $update , 'donation');
				 $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong> payment is complete <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
				}else
				{
					$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Somthing Wrong <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
				}


				 
				
			}else
			{
				  $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong> Somthing Wrong <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			}
			
			redirect(base_url('admin/donation'));
		}






}
