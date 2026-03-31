<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
        parent::__construct();
       $this->load->model('Common_model','common');
        check_login_admin();
    }
	
	public function index()
	{
		$data = array();
		$data['user_data'] =  $this->common->getAllRecords('users' , 'DESC' , '10');
		$data['donations'] =  $this->common->getAllRecords('donation' , 'DESC' , '10');
		$data['donation_info'] =  $this->common->doantion_info();
		$data['txn_info'] =  $this->common->txn_info();
		

		$this->load->view('admin/layout/header' , $data);
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/dashboard/index' , $data);
		$this->load->view('admin/layout/footer');
	}



}
