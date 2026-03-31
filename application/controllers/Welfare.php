<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welfare extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('Common_model','common');
      
        
    }
	
	public function index($id="")
	{

		
		$data = array();
		$data['title'] = 'Post Details';


		$result  = $this->common->getSingleRecordByFieldName(array('status' => '1' , 'id'=>$id ) , 'post');
		$data['latest_post'] = $this->common->getAllRecordsByFieldName(array('status' => '1' , 'id !='=>$id ) , 'post' , 'DESC' , '5');

		if ($result) {
			$data['post'] = $result;


		$find_gallery = $this->common->getSingleRecordByFieldName(array('status' => '1' , 'id'=>$result['gallery_id']) , 'gallery');

		if (!empty($find_gallery)) {

			$data['gallery'] = $find_gallery;
			$data['gallery_images'] = $this->common->getAllRecordsByFieldName(array('gallery_id' => $find_gallery['id']) , 'gallery_image' ,  'ASC' , '3');
			 
		}else
		{
			$data['gallery']  = '';
		}




		}else
		{
			$data['post'] = '';
			$data['not_found'] = $this->load->view('site/section/not-found' , $data , true);
		}




		$this->load->view('site/layout/header');
		$this->load->view('site/single-post' , $data);
		$this->load->view('site/layout/footer');

	}

public function welfarelist()
	{
		$data = array();
		$data['title'] = 'Welfare';

		$this->load->library("pagination");

				$per_page = 10;

				$total_rows = $this->common->countrecords(array('status' => '1' ) , 'post');

				$config = array();
				$config["base_url"] = base_url('/Welfare/welfarelist');
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

				if ($this->uri->segment(3)  && is_numeric($this->uri->segment(3))) {
					$page  = ($this->uri->segment(3) - 1) * $per_page; 

					

					$data['rowstart'] =$this->uri->segment(3)*$per_page-$per_page;
					$data['rowend'] = $this->uri->segment(3)*$per_page;

				}else
				{
					$page =  0;
					$data['rowstart'] = 1;
					if($total_rows < $per_page)
					{
						$data['rowend'] =$total_rows;	
					}else
					{
						$data['rowend'] = $per_page;	
					}
					
				}


				$data['post_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'post' , 'DESC' , $per_page , $page);

				

				$data['total_rows'] = $total_rows;



	
		
		$this->load->view('site/layout/header');
		$this->load->view('site/post' , $data);
		$this->load->view('site/layout/footer');
	}


public function category($id='')
	{
		$data = array();
		$data['title'] = 'Welfare';


		$this->load->library("pagination");

				$per_page = 1;

				$total_rows = $this->common->countrecords(array('status' => '1' , 'cat_id' => $id) , 'post');

				$config = array();
				$config["base_url"] = base_url('/Welfare/category/'.$id);
				$config["total_rows"] = $total_rows;
				$config["per_page"] = $per_page;
				$config["uri_segment"] = 4;
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

				if ($this->uri->segment(4)  && is_numeric($this->uri->segment(4))) {
						$page  = ($this->uri->segment(3) - 1) * $per_page; 

					

					$data['rowstart'] =$this->uri->segment(4)*$per_page-$per_page;
					$data['rowend'] = $this->uri->segment(4)*$per_page;

				}else
				{
					$page =  0;
					$data['rowstart'] = 1;
					if($total_rows < $per_page)
					{
						$data['rowend'] =$total_rows;	
					}else
					{
						$data['rowend'] = $per_page;	
					}
					
				}

				$data['total_rows'] = $total_rows;

				$find_data =  $this->common->getAllRecordsByFieldName(array('status' => '1' , 'cat_id' => $id ) , 'post' , 'DESC' , $per_page , $page);

				if ($find_data) {
					$data['cat_data'] = $this->common->getSingleRecordByFieldName(array('id' => $id) , 'category');
					$data['post_list'] = $find_data;
				}else
				{
					$data['not_found']  = $this->load->view('site/section/not-found' , $data , true);
				}
				
				



	
		
		$this->load->view('site/layout/header');
		$this->load->view('site/post-category' , $data);
		$this->load->view('site/layout/footer');
	}


}
