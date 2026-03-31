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

                if (!empty($where) && !is_array($where)) {

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





	if (!function_exists('database_dateformat')) {
	    function database_dateformat($date='') {
				
				$date = str_replace('/', '-', $date);
				$date = new DateTime($date);
				return  $date->format('Y-m-d');
	    }
	}



	}