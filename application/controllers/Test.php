<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct() {
        parent::__construct();
     
        $this->load->model('Test_model','test');
        $this->load->model('Export_model','export');
       
      
        
    }
	
	public function index()
	{
		
		$data = $this->test->getUsers();

		echo '<pre>'; print_r($data); die;

	}



	public function testmessage()
	{

		// Account details
$apiKey = urlencode('NGU0ODc4Njk1NjczNjI1MzQ3NGI0YjY0NTY2NzU2NDQ=');

// Message details
$numbers = array(919511530589);
$sender = urlencode('TXTLCL');
$message = rawurlencode('This is your message');

$numbers = implode(',', $numbers);

// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Process your response here
echo $response;



		
		// Your Textlocal API credentials
$username = "Ram";  // Your Textlocal username
$hash = "NGU0ODc4Njk1NjczNjI1MzQ3NGI0YjY0NTY2NzU2NDQ=";          // Your Textlocal API hash

// Message details
$sender = urlencode("Rakma");   // Your sender name
$message = rawurlencode("Your subscription is complete, please renew it.");  // Your message content
$numbers = "9511530589";  // Comma-separated list of recipient numbers

// Prepare data to be sent
$data = "username=" . $username . "&hash=" . $hash . "&sender=" . $sender . "&numbers=" . $numbers . "&message=" . $message;

// Send the request
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Process the response
$response_array = json_decode($response, true);
if ($response_array['status'] == "success") {
    echo "Message sent successfully.";
} else {
    echo "Message sending failed. Error: " . $response_array['errors'][0]['message'];
}

	}







public function testtest()
{
    $username = 'rakmaraj';
    $password = 'Rakma@123';
    $messages = array(
        array(
            'to' => '+919511530589',
            'body' => 'Hi Kamaraan Your membership has been completed. Please upgrade. Go to link Visit: https://rakma.org/page/membershipupgrade'
        )
    );

    $result = $this->send_message(json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password);

    if ($result['http_status'] != 201) {
        print "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status " . $result['http_status'] . "; Response was " . $result['server_response']);
    } else {
        print "Response " . $result['server_response'];
        // Use json_decode($result['server_response']) to work with the response further
    }
}

private function send_message($post_body, $url, $username, $password)
{
    $ch = curl_init();
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode("$username:$password")
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    // Allow cUrl functions 20 seconds to execute
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    // Wait 10 seconds while trying to connect
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $output = array();
    $output['server_response'] = curl_exec($ch);
    $curl_info = curl_getinfo($ch);
    $output['http_status'] = $curl_info['http_code'];
    $output['error'] = curl_error($ch);
    curl_close($ch);
    return $output;
}




function send_messagess($username, $password, $recipient, $message) {
       // API endpoint
    $api_url = 'https://api.bulksms.com/v1/messages';

    // Prepare message data
    $data = [
        'to' => $recipient,
        'body' => $message
    ];

    // Initialize cURL
    $ch = curl_init($api_url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode("$username:$password")
    ]);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        return "Error sending message: $error";
    } else {
        // Decode the response
        $decoded_response = json_decode($response, true);

        // Check if the request was successful
        if (isset($decoded_response['error'])) {
            $error_message = $decoded_response['error']['message'];
            curl_close($ch);
            return "Error sending message: $error_message";
        } else {
        	echo '<pre>'; print_r($decoded_response); 
            curl_close($ch);
            return "Message sent successfully!";
        }
    }
}



function testesttest()
{
	// Replace these values with your actual API credentials
 $username = 'rakmaraj';
    $password = 'Rakma@123';

// Replace this with the recipient's phone number
$recipient = '+918239581249';

// Replace this with the message you want to send, including the link
$message = 'Hi Kamaraan, Your subscription has been completed. Please upgrade. Visit: https://rakma.org/page/membershipupgrade';


// Send the message
$result = $this->send_messagess($username, $password, $recipient, $message);

// Print the result
echo $result;








}


 public function your_method() {
        // Define headers
        $headers = array(
            'Authorization: App 861d051f041dc988ca806d07b462d799-649cf44e-58ff-42c8-9e42-99930468377b',
            'Content-Type: application/json',
            'Accept: application/json'
        );

        // Define request body
        $data = array(
            'messages' => array(
                array(
                    'destinations' => array(array('to' => '919511530589')),
                    'from' => 'ServiceSMS',
                    'text' => "Hello,\n\nThis is a test message from Infobip. Have a nice day!"
                )
            )
        );

        // Convert data array to JSON
        $raw = json_encode($data);

        // Define cURL options
        $curl_options = array(
            CURLOPT_URL => 'https://dkx6xl.api.infobip.com/sms/2/text/advanced',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $raw,
            CURLOPT_HTTPHEADER => $headers
        );

        // Initialize cURL session
        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if($response === false) {
            $error = curl_error($ch);
            echo "cURL Error: $error";
        } else {
            // Print response
            echo $response;
        }

        // Close cURL session
        curl_close($ch);
    }



    public function mm()
    {

// $messages = array(
//     // Put parameters here such as sender, force or test
//     'sender' => "TXTLCL",
//     'messages' => array(
//         array(
//             'number' => 919511530589,
//             'text' => rawurlencode('Hello, This is test message from Textlocal.')
//         )
//     )
// );
 
// // Prepare data for POST request
// $data = array(
//     'apikey' => 'MzA3NTM1NTE1ODU2NzM1MDM4NGY3MTczMzk2NTY4Nzk=',
//     'data' => json_encode($messages)
// );
 
// // Send the POST request with cURL
// $ch = curl_init('https://api.textlocal.in/bulk_json/');
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);
 
// echo $response;

        // Account details
    $apiKey = urlencode('MzA3NTM1NTE1ODU2NzM1MDM4NGY3MTczMzk2NTY4Nzk=');
    
    // Message details
    $numbers = array(919511530589);
    $sender = urlencode('TXTLCL');
    $message = rawurlencode('This is your message');
 
    $numbers = implode(',', $numbers);
 
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Process your response here
    echo $response;
    }


	


}
