<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 	
	
	
	//-- check logged Admin
	if (!function_exists('check_login_admin')) {
	    function check_login_admin() {
	        $ci = get_instance();
	         if ( isset($_SESSION['Admin']['is_login'] )  &&  $_SESSION['Admin']['is_login'] == true) {

					return true;
	           
	        }else
			{
				  unset($_SESSION['Admin']);
				 redirect(base_url('/admin/login'));
			}
	    }
	}



	if (!function_exists('do_upload')) {
	    function do_upload($file , $ex='gif|jpg|png') {
	        $ci = get_instance();

	      
	        
	        $config['upload_path']          = './uploads/';
            $config['allowed_types']        =  $ex;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $ci->load->library('upload', $config);

             if ( ! $ci->upload->do_upload($file))
                {
                    return     $error = array('error' => $ci->upload->display_errors());

                       
                }
                else
                {
                     return   $data = array('upload_data' => $ci->upload->data());

                        
                }
        
	    }
	}



	if (!function_exists('get_settings')) {
	    function get_settings($where = '') {
	        $ci = get_instance();

	            $ci->db->select('*');
                $ci->db->from('settings');

                if (!empty($where)) {

                      $ci->db->where('field_key' , $where);
                       $query = $ci->db->get();
                      $data =  $query->row_array();

                      $result =  $data['field_value'];

                }elseif (!empty($where) && is_array($where)) {
                	 $ci->db->where($where);
                	  $query = $ci->db->get();
                      $result =  $query->result_array();
                }else
                {
                	  $query = $ci->db->get();
                	  $result =  $query->result_array();
                     
                }


              
               
               
                return $result; 

	    }



		if (!function_exists('get_data')) {
				  function get_data($fieldname , $table='' , $order_by = '' , $limit = '')
				        {
				        	 $ci = get_instance();
				                $ci->db->select('*');
				                $ci->db->from($table);

				                $ci->db->where($fieldname);

				                if (!empty($order_by) && is_array($order_by)) {

				                      $ci->db->order_by($order_by);

				                }elseif(!empty($order_by))
				                {
				                    $ci->db->order_by('id',$order_by);  
				                    
				                }else
				                {
				                    $ci->db->order_by('id','DESC');  
				                }


				                if (!empty($limit)) {

				                        $ci->db->limit($limit);
				                }
				               
				                $query = $ci->db->get();
				                return $query->result_array();
				        }
	}




		if (!function_exists('get_All_data')) {
				  function get_All_data($fieldname , $table='' , $order_by = '' , $limit = '')
				        {
				        	    $ci = get_instance();
				                $ci->db->select('*');
				                $ci->db->from($table);

				                $ci->db->where($fieldname);
								if(!empty($order_by))
				                {
				                    $ci->db->order_by($order_by);  
				                    
				                }else
				                {
				                    $ci->db->order_by('id','DESC');  
				                }


				                if (!empty($limit)) {

				                        $ci->db->limit($limit);
				                }
				               
				                $query = $ci->db->get();
				                return $query->result_array();
				        }
	}





if (!function_exists('countdata')) {
				  function countdata($table='' , $where = '')
				        {
				        	 $ci = get_instance();
				                $ci->db->select('*');
				                if (!empty($where)) {
				                	 $ci->db->where($where);
				                }
				               
				                $ci->db->from($table);

				                $query = $ci->db->get();
				                return $query->num_rows();
				        }
	}




	if (!function_exists('database_dateformat')) {
	    function database_dateformat($date='') {
				if(!empty($date))
				{
					$date = str_replace('/', '-', $date);
					$date = new DateTime($date);
					return  $date->format('Y-m-d');

				}else
				{
					return false;
				}
				
	    }
	}


	if (!function_exists('default_member_image')) {
	    function default_member_image($class ='') {
				
				if($class)
				{
					$image = '<img src="https://rakma.org/assets/site//src/dist/img/placeholder-photo.png" alt="" class="'.$class.'">';
				}else
				{
					$image = '<img src="https://rakma.org/assets/site//src/dist/img/placeholder-photo.png" alt="" class="w-full">';
				}
				
				return  $image;
	    }
	}




	if (!function_exists('excel_export')) {
	    function excel_export($table_columns = '' , $data = "" , $filename = '') {

	    	if (is_array($table_columns) && is_array($data) && !empty($table_columns) && !empty($data)  && !empty($filename)) {
	    		

	    		   $delimiter = ","; 
	    		   $filename = $filename.'_'.date('Y-m-d') . ".csv"; 
	    		   $f = fopen('php://memory', 'w'); 

	    		   fputcsv($f, $table_columns, $delimiter); 

	    		   	foreach ($data as $key => $value) {

	    		   		

	    		   		$tem = array();
	    		   		for ($i=0; $i < count($table_columns); $i++) { 
			    		   		
								$tem[] = $value[$i];
								
								
	    		   		}
	    		   		
   				   		fputcsv($f, $tem, $delimiter);
		   				
		   			}


					fseek($f, 0); 
					header('Content-Type: text/csv'); 
					header('Content-Disposition: attachment; filename="' . $filename . '";'); 
					fpassthru($f);
				  return true;

	    }else
	    {
	    	return false;
	    }
	}


	}




	if (!function_exists('pdf')) {
	function pdf($html = '',  $pdftpye = '' , $filename= '')
	{
		if ($html) {
			require(APPPATH.'third_party/vendor/autoload.php');
			$mpdf = new \Mpdf\Mpdf([
				'default_font_size' => 9,
				'default_font' => 'dejavusans',
				'mode' => 'utf-8',
				'tempDir' => FCPATH . 'tmp'

			]);
			$mpdf->autoScriptToLang = true;
			$mpdf->autoLangToFont = true;
			$mpdf->WriteHTML($html);
			$file = $filename.'/'.time().'.pdf';
			if ($pdftpye) {
				$mpdf->output($file,'D');
			}else
			{
				$mpdf->output($file,'I');
			}
			
		}else
		{

			redirect();

			
		}
		}
	}


	if (!function_exists('state_list')) {
	function state_list()
	{
		$url = "https://cdn-api.co-vin.in/api/v2/admin/location/states";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "accept: application/json",
		   "Accept-Language: hi_IN",
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		var_dump($resp);

	}
	}


	if (!function_exists('capture')) {
	function capture($paymentID = '' , $price='')
	{

		$ci = get_instance();
		$ci->db->select('*');
		$ci->db->from('settings');
		$ci->db->where('field_key' , 'key');
		$query = $ci->db->get();
		$data =  $query->row_array();
		$key = $data['field_value'];

		$ci->db->select('*');
		$ci->db->from('settings');
		$ci->db->where('field_key' , 'secret_key');
		$query = $ci->db->get();
		$data1 =  $query->row_array();
		$secret_key = $data1['field_value'];


               
		$newprice = $price*100;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/'.$paymentID.'/capture');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"amount\": ".$newprice.",\n  \"currency\": \"INR\"\n}");
		curl_setopt($ch, CURLOPT_USERPWD, $key. ':' .$secret_key);
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
				
		if (curl_errno($ch)) {
		  $return = false;
		}else
		{
		   $res = json_decode($result, true);
			if(isset($res['status']) && $res['status'] == 'captured')
			{
				$return = $res;
			}else
			{
				 $return =  false;
			}
		}
		curl_close($ch);
		return $return;

	}
}


	if (!function_exists('refund')) {
	function refund($paymentID = '' , $price='')
	{
		$ci = get_instance();
		$ci->db->select('*');
		$ci->db->from('settings');
		$ci->db->where('field_key' , 'key');
		$query = $ci->db->get();
		$data =  $query->row_array();
		$key = $data['field_value'];

		$ci->db->select('*');
		$ci->db->from('settings');
		$ci->db->where('field_key' , 'secret_key');
		$query = $ci->db->get();
		$data1 =  $query->row_array();
		$secret_key = $data1['field_value'];

		$newprice = $price*100;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/'.$paymentID.'/refund');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"amount\": ".$newprice."\n}");
		curl_setopt($ch, CURLOPT_USERPWD, $key.':'.$secret_key);
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		  $return = false;
		}else
		{
			$res = json_decode($result, true);
			
			if(isset($res['status']) && $res['entity'] == 'refund')
			{
				$return = true;
			}else
			{
				 $return =  false;
			}
		  
		}
		curl_close($ch);
		return $return;

	}
}

if (!function_exists('get_order')) {
	function get_order($paymentID = '')
	{
		$ci = get_instance();
		$ci->db->select('*');
		$ci->db->from('settings');
		$ci->db->where('field_key' , 'key');
		$query = $ci->db->get();
		$data =  $query->row_array();
		$key = $data['field_value'];

		$ci->db->select('*');
		$ci->db->from('settings');
		$ci->db->where('field_key' , 'secret_key');
		$query = $ci->db->get();
		$data1 =  $query->row_array();
		$secret_key = $data1['field_value'];


			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/'.$paymentID);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

			curl_setopt($ch, CURLOPT_USERPWD, $key. ':' . $secret_key);

			$result = curl_exec($ch);
				if (curl_errno($ch)) {
					  $return = false;
					}else
					{
						$res = json_decode($result, true);
						if(isset($res['status']) && $res['status'] == 'authorized')
						{
							$return =$res;
						}else
						{
							 $return =  false;
						}
					  
					}
					curl_close($ch);
					return $return;

	}
}


	if (!function_exists('approved_user_list')) {
	    function approved_user_list() {
	    		$this->db->select('*');
                $this->db->where('role' ,'Admin');
                $this->db->where('verify' ,'1');
                $this->db->from('users');
                $query = $this->db->get();
                return $query->result_array();

	    }
	}


	if (!function_exists('current_date')) {
	    function current_date() {
				date_default_timezone_set('Asia/Kolkata');
				$currentTime = date( 'Y-m-d H:i:s', time () );
				return $currentTime; 

	    }
	}

}


