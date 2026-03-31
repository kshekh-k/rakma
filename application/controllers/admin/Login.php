<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();

     
        $this->load->model('Auth_model','auth');
      
        
    }
	
	public function index()
	{

		if (isset($_SESSION['Admin']) && $_SESSION['Admin']['is_login'] == true) {
			  redirect(base_url('/admin/dashboard'));
		}
		$data = array();
		$this->load->view('admin/login' , $data);

	}


function auth()
	{

		$output = array();
		$output['status'] = false;
		$output['data'] = '';
		$output['msg'] = '';

		if($_POST['email'] && $_POST['password']) {

			if (!empty($_POST['email']) && !empty($_POST['password'])) {

				$loginUserdata = $this->auth->checkfrontuserlogin($_POST['email'] , $_POST['password']);

				if ($loginUserdata) {


							$userdata = array();


                        	$userdata['Admin'] = array(
                                        'id' => $loginUserdata['id'], 
                                        'role' => $loginUserdata['role'], 
                                        'first_name' => $loginUserdata['first_name'], 
                                        'last_name' => $loginUserdata['last_name'], 
                                        'email' => $loginUserdata['email'], 
                                        'phone' => $loginUserdata['phone'], 
                                        'is_login' => True, 
                          

                        	);
                        		

                        	$this->session->set_userdata($userdata);

					

					$output['status'] = true;
					$output['msg'] = '<div class="alert alert-success" role="alert"> Login Successfull  </div>';
					$output['data'] = base_url('/admin/dashboard');
					

				}else
				{ 
					$output['msg'] = '<div class="alert alert-danger" role="alert">  Please enter valid email or password  </div>';
				}
				

			}else
			{
				$output['msg'] = '<div class="alert alert-danger" role="alert"> Please enter valid email or password  </div>';
			}
			
		}else
		{
			$output['msg'] = '<div class="alert alert-danger" role="alert"> Opps somthing wrong!  </div>';
		}


		echo json_encode($output);

		


		
	}


	function logout()
	{


		 unset($_SESSION['Admin']);
          redirect(base_url('/admin/login'));

	}




}
