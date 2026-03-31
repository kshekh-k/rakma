<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_login_admin();
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index()
	{
		$data = array();
		$rows =  $this->common->getAllRecords('settings' , 'DESC');
		$storedata  = array();
		if (!empty($rows)) {
			foreach ($rows as $key => $value) {
				$storedata[$value['field_key']] = $value['field_value'];
			}
		}

		$data['rows'] = $storedata;
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/setting/index' , $data);
		$this->load->view('admin/layout/footer');
	}





	public function update()
	{
		
		if (isset($_POST) || isset($_FILES)) {
			$logo = ''; 

			if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) {
				$logoStatus = do_upload('logo');


				if (isset($logoStatus['error']) &&  !empty($logoStatus['error'])) {


					$this->session->set_flashdata('logo_error', $logoStatus['error']);
				}else
				{
					$logo = $logoStatus['upload_data']['file_name'];
				}




			}


			if (!empty($logo)) {
				$this->common->updateByColumn(array('field_key' => 'logo'), array('field_value'=>$logo),  'settings');
			}


			$favicon = ''; 

			if (isset($_FILES['favicon']['name']) && !empty($_FILES['favicon']['name'])) {
				
				$faviconStatus = do_upload('favicon');


				if (isset($faviconStatus['error']) &&  !empty($faviconStatus['error'])) {


					$this->session->set_flashdata('favicon_error', $faviconStatus['error']);
				}else
				{
					$favicon = $faviconStatus['upload_data']['file_name'];
				}




			}

				if (!empty($favicon)) {
				$this->common->updateByColumn(array('field_key' => 'favicon'), array('field_value'=>$favicon),  'settings');
			}
		


			




			if (isset($_POST) && !empty($_POST)) {
				
				foreach ($_POST as $key => $value) {


					$where = array('field_key' => $key);
					$update = array('field_value' => $value);

					$this->common->updateByColumn($where, $update ,  'settings');

						

				}
			}
			


			  			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success </strong>Settings updated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                	
			
		}else
		{

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opps </strong>Opps somtihng wrong!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
		}
		

		redirect(base_url('admin/setting'));
	}






}
