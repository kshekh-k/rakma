<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactquery extends CI_Controller {

	function __construct() {
        parent::__construct();

        check_login_admin();

        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$data['section_heading'] = 'All Contact query List';
		$data['rows'] = $this->common->getAllRecords('contactquery' , 'DESC');
	
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/contactquery/index' , $data);
		$this->load->view('admin/layout/footer');
	}




}
