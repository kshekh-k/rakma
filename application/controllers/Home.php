<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('Common_model','common');
     
        
    }

    	public function ajax_list()
	{
		$data = array();
		$data['section_heading'] = 'All Members List';
		/*$data['rows'] = $this->common->getUsers();*/
		$data['districts'] = $this->common->getAllRecordsByFieldName(array('status'=>'1') , 'district' , 'ASC');
		/*echo '<pre>'; print_r($data); die;*/
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/userss/index' , $data);
		$this->load->view('admin/layout/footer');
	}
	
	
	public function index()
	{
		$data = array();
		$data['title'] = 'Home';
		$data['news_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'news' , 'DESC' , '3');
		$data['event_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'events' , 'DESC' , '3');
		$data['download_list'] = $this->common->getAllRecordsByFieldName(array('status' => '1' ) , 'downloads' , 'DESC' , '5');
		//$data['today_birthdays'] = $this->common->getAllRecordsByFieldName(array('create_at' => '1' ) , 'users' , 'DESC');
		$currentMonth = date('m'); // Current month in MM format
		$currentDay = date('d'); // Current day in DD format

		$data['today_birthdays'] = $this->common->getAllUsersByCondtion(
		    array(
		        'MONTH(users.dob)' => $currentMonth, // Filter by current month
		        'DAY(users.dob)' => $currentDay // Filter by current day
		    )
		);

		$data['memberlist'] =  $this->common->memberlist('7' , '5');
		$find_gallery = $this->common->getSingleRecordByFieldName(array('status' => '1' , 'id'=>get_settings('gallery_id') ) , 'gallery');

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

public function test()
	{
		$test = $this->common->getUsers($id);

		echo '<pre>'; print_r($test); die;
					$update = array();
					$update['payment_date'] = current_date();
					$this->common->update('78' , $update , 'transaction');
		$data = array();
		$data['title'] = 'Home';
		$this->load->view('site/layout/header');
		$this->load->view('site/test' , $data);
		$this->load->view('site/layout/footer');
	}

public function cp()
	{
		echo $_POST['payment_id'];
		$paymentRes = get_order($_POST['payment_id']);

		$paymentDetail = $paymentRes['status'];
		$price = $paymentRes['amount']/100;
		$paymentID = $paymentRes['id'];
		$phone = $paymentRes['contact'];
		echo '<pre>'; print_r($test); die;
		$capture = capture($_POST['payment_id'] , '1');
		if ($capture) {
			$output = $capture;
		}

		echo json_encode($output);
	}


	public function pdf_m($id = '')
	{
		
			$user_data =  $this->common->getUsersforPDF($id);
			//echo '<pre>'; print_r($user_data); die;
			if ($user_data) {
				$array = array(
					'user' => $user_data,
				);
				$html = $this->load->view('pdf_temp/mebership', $array , true);

				pdf($html , 'D' ,  'membership_join_recept');
			}else
			{
				redirect();
			}
	}



	 public function pdf_mahasamiti($id = '')
        {
          
            $row =  $this->common->MahasamitiMembersSingle(['mahasamiti_members.id'=>$id]);
            //echo '<pre>'; print_r($user_data); die;
            if ($row) {
              $array = array(
                'row' => $row,
              );
              $html = $this->load->view('pdf_temp/mahasamitiMembers', $array , true);

              pdf($html , 'D' ,  'membership_join_recept');
            }else
            {
              redirect();
            }
        }


	public function pdf($html)
	{
			

			require(APPPATH.'third_party/vendor/autoload.php');

			

			$mpdf = new \Mpdf\Mpdf([
				'default_font_size' => 9,
				'default_font' => 'dejavusans',
				'mode' => 'utf-8',

			]);
			$mpdf->autoScriptToLang = true;
			$mpdf->autoLangToFont = true;
			$mpdf->WriteHTML($html);
			$file='media/'.time().'.pdf';
			$mpdf->output($file,'D');
			
	}



function refund()
{


		
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/pay_HxJUB0S4cYGjCK/refund');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"amount\": 2000\n}");
curl_setopt($ch, CURLOPT_USERPWD, 'rzp_test_UvroFvSRX3VXr9' . ':' . 'B0UomP6HdFdj9EzTiNyyx1iA');

$headers = array();
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

print_r($result);


}


function capture()
{


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/pay_I006RBwvLVFfAt/capture');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"amount\": 100,\n  \"currency\": \"INR\"\n}");
curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_3pZTbfSptVYbhz' . ':' . 'r2WFbSaEmCTCBLlvvpcr8onH');

$headers = array();
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$res = json_decode($result, true);
echo '<pre>'; print_r($res);


}

}
