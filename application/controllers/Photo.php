<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {

        public function __construct()
        {
             parent::__construct();
             // Your own constructor code
             $this->load->helper('form');
             $this->load->model('main');
        }

    // public function test(){
    // 	var_dump($this->main->verify_contact('coe569c9d03c8328')) ;
    // 	exit();
    // }

	public function home($page = "home")
	{

		$this->load->helper('url'); // for photo caro

		// if($page == 'reg_form'){
		// 	echo 'reg';
		// 	exit();
		// }

		$this->load->view('header');
		$this->load->view('top');
		$this->load->view('nav');
		$this->load->view('home');
		$this->load->view('break');
		$this->load->view('about');
		$this->load->view('break');
		$this->load->view('works');
		$this->load->view('break');
		$this->load->view('register');
		$this->load->view('break');
		$this->load->view('staff');
		$this->load->view('break');
		$this->load->view('caro');
		$this->load->view('break');
		// $this->load->view('mail_list');
		// $this->load->view('break');
		$this->load->view('footer');
	}

	public function web_hook()
	{
		// $this->load->model('main');
		// // add to database
		// $info = array(
		// 'first_name' => 'photo ',
		// 'last_name' => 'last ',
		// 'email' =>  'e@g.com ',
		// 'originator_id' => '387 ',
		// 'type' => 27 // = photo client
		// 	);

		/***********************************************
		Sample code for handling MailChimp Webhooks - to write the logfile, your webserver must be able to write 
		to the file in the wh_log() function below.

		This also assumes you use a key to secure the script and configure a URL like this in MailChimp:

		http://www.mydomain.com/webhook.php?key=EnterAKey!

		***********************************************/
		$this->load->helper('url');
		$this->load->helper('file');


		/***********************************************
		    Helper Functions
		***********************************************/

		function wh_log($msg){
		    $file_data = date("Y-m-d H:i:s")." | ".$msg."\n";

			if (write_file(FCPATH . '/assets/web_hook.log', $file_data, 'a') == FALSE)
			{
				echo $logfile;
			     echo 'Unable to write the file';

			}
			else
			{
			     echo 'File written!';
			}
		}

		

		function subscribe($data){
		    wh_log($data['email'] . ' just subscribed!');
		}
		function unsubscribe($data){
		    wh_log($data['email'] . ' just unsubscribed!');
		}
		function cleaned($data){
		    wh_log($data['email'] . ' was cleaned from your list!');
		}
		function upemail($data){
		    wh_log($data['old_email'] . ' changed their email address to '. $data['new_email']. '!');
		}
		function profile($data){
		    wh_log($data['email'] . ' updated their profile!');
		}


		$my_key  = '19776';

		wh_log('==================[ Incoming Request ]==================');

		wh_log("Full _REQUEST dump:\n".print_r($_REQUEST,true)); 

		if ( !isset($_GET['key']) ){
		    wh_log('No security key specified, ignoring request'); 
		} elseif ($_GET['key'] != $my_key) {
		    wh_log('Security key specified, but not correct:');
		    wh_log("\t".'Wanted: "'.$my_key.'", but received "'.$_GET['key'].'"');
		} else {
		    //process the request
		    wh_log('Processing a "'.$_POST['type'].'" request...');
		    switch($_POST['type']){
		        case 'subscribe'  : subscribe($_POST['data']);   break;
		        case 'unsubscribe': unsubscribe($_POST['data']); break;
		        case 'cleaned'    : cleaned($_POST['data']);     break;
		        case 'upemail'    : upemail($_POST['data']);     break;
		        case 'profile'    : profile($_POST['data']);     break;
		        default:
		            wh_log('Request type "'.$_POST['type'].'" unknown, ignoring.');
		    }
		}
		wh_log('Finished processing request.');
	}

	public function reg_form(){ 

		 // validate form
		 $this->load->library('form_validation');

		 $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		 $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); // add |callback_email_check
		 $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[15]');
		 $this->form_validation->set_rules('password', 'Password', 'required');
		 $this->form_validation->set_rules('mail_list', 'Mail List', 'trim|max_length[2]|alpha');
		 $this->form_validation->set_rules('address_1', 'Address 1', 'trim|alpha_numeric');
		 $this->form_validation->set_rules('address_2', 'Address 2', 'trim|alpha_numeric');
		 $this->form_validation->set_rules('city', 'City', 'trim|alpha');
		 $this->form_validation->set_rules('state', 'State', 'trim|max_length[20]|alpha');
		 $this->form_validation->set_rules('zip', 'Zip', 'trim|max_length[10]|numeric');
		 $this->form_validation->set_rules('package', 'Package', 'trim|max_length[5]|numeric');
		 $this->form_validation->set_rules('fee', 'Fee', 'trim|max_length[8]|numeric');


		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('register');
			$this->load->view('footer');
		}
		else
		{

			if($id = $this->main->add_contact()){

				// send verification email
				// get contact info
				$contact = $this->main->get('contacts', array( 'id' => $id));
		        // codeigniter email template
				$data['contact'] = $contact[0];

				$this->load->library('email');
				$this->email->set_mailtype("html");

				$this->email->from('welcome@coefoto.com');
				$this->email->to($contact[0]['email']); 
				$this->email->bcc('bradslavens@gmail.com'); 
				$msg  = $this->load->view('mail/reg_verification', $data, TRUE);
				// $msg .= $this->load->view(signature);

				$this->email->subject('Registration Confirmation');
				$this->email->message($msg); 
				$this->email->set_alt_message('error');
				echo $msg;
				// $this->email->send();

				// place order
				if($this->input->post('address_1')){
					
					echo "got here";
					if($order_number = $this->main->place_order($id)){
						// get contact info
				        // codeigniter email template
						$this->email->set_mailtype("html");

						$this->email->from('welcome@coefoto.com');
						$this->email->to($contact[0]['email']); 
						$this->email->bcc('bradslavens@gmail.com'); 
						$msg  = $this->load->view('mail/ord_verification', $data, TRUE);
						// $msg .= $this->load->view(signature);

						$this->email->subject('Order Confirmation');
						$this->email->message($msg); 
						$this->email->set_alt_message('error');
						echo $msg;
						// $this->email->send();

					}

				}
				
				$this->load->view('reg_thanks');
			}

		}

	}


	// public function email_check($str)
	// {

	// 	$this->load->library('form_validation');
	// 	// see if email exists
	// 	if(!empty($this->main->get_column('contacts', array('email'=>$str), 'email')))
	// 	{
	// 		$this->form_validation->set_message('Email', ' %s already exists');
	// 		return FALSE;
	// 	}
	// 	else
	// 	{
	// 		return TRUE;
	// 	}
	// }

	public function verify($user_id = 9999){

		if($user_id != 9999){

			$ver = $this->main->verify_contact($user_id);

			// mail verification confirmation
				$data['contact'] = $ver[0];

				$this->load->library('email');
				$this->email->set_mailtype("html");

				$this->email->from('confirmation@coefoto.com');
				$this->email->to($ver[0]['email']); 
				$this->email->bcc('bradslavens@gmail.com'); 
				$msg  = $this->load->view('mail/confirmation', $data, TRUE);
				// $msg .= $this->load->view(signature);

				$this->email->subject('Thank You for Confirming your email');
				$this->email->message($msg); 
				$this->email->set_alt_message('error');
				echo $msg;
				// $this->email->send();


		}
	}
}
