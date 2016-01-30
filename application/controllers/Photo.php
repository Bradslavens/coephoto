<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         // Your own constructor code
         $this->load->helper('form');
         $this->load->model('main');
		 $this->load->helper('url'); // for photo caro
		 $this->load->library('session');
    }

	public function index($ad = "none")
	{
		$ra = array(
			'source' => $ad
			);
		$this->session->set_userdata($ra);

		// if($page == 'reg_form'){
		// 	echo 'reg';
		// 	exit();
		// }

		$this->load->view('header');
		$this->load->view('top');
		$this->load->view('nav');
		$this->load->view('home');
		$this->load->view('break');
		$this->load->view('mail_list');
		$this->load->view('break');
		$this->load->view('about');
		$this->load->view('break');
		$this->load->view('works');
		$this->load->view('break');
		$this->load->view('staff');
		$this->load->view('break');
		$this->load->view('caro');
		$this->load->view('break');
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
		$this->load->helper('file');


		/***********************************************
		    Helper Functions
		***********************************************/

		// web hook login MailChimp
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
		 $this->form_validation->set_rules('mi', 'MI', 'trim|max_length[2]');
		 $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		 $this->form_validation->set_rules('email', 'Email', 'callback_username_check|required');
    	 $this->form_validation->set_rules('phone', 'Phone', 'trim|max_length[15]');
    	 $this->form_validation->set_rules('billing', 'Billing', 'trim|max_length[1]|numeric');
		 $this->form_validation->set_rules('password', 'Password', 'required');
		 $this->form_validation->set_rules('mail_list', 'Mail List', 'trim|max_length[1]|numeric');
		 $this->form_validation->set_rules('source', 'Source', 'trim|max_length[8]|alpha_numeric');

		 // recaptcha
		 $captcha=$this->input->post('g-recaptcha-response');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header');
			$this->load->view('sign_reg');
			$this->load->view('footer');
		}
		elseif(!$captcha){
			// check recaptcha
			$this->load->view('header');
			$this->load->view('sign_reg');
			$this->load->view('footer');
			// add message 
		}else{

			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf4sxUTAAAAAJPb13pw0hwUqD4xhMD5nlmo3boU&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	         	$d_r = json_decode($response);
	        if($d_r->success==FALSE)
	        {
				$this->load->view('header');
				$this->load->view('register');
				$this->load->view('footer');
				// add message 

	        }else{

				if($id = $this->main->add_contact()){
					// send verification email
					// get contact info
					$contact = $this->main->get('contacts', array( 'id' => $id));
			        // codeigniter email template

					$ra1 = array(
						'user_id' => $contact[0]['user_id']
						);
					$this->session->set_userdata($ra1);

					$data['contact'] = $contact[0];

					$this->load->library('email');
					$this->email->set_mailtype("html");

					$this->email->from('service@coefoto.com');
					$this->email->to($contact[0]['email']); 
					$this->email->bcc('bradslavens@gmail.com'); 
					$msg  = $this->load->view('mail/reg_verification', $data, TRUE);
					// $msg .= $this->load->view(signature);

					$this->email->subject('COE Foto -Registration Confirmation');
					$this->email->message($msg); 
					$this->email->set_alt_message('error the email requires html, please contact Service at 619-253-0529');
					// echo $msg;
					$this->email->send();
					
				}
					$this->load->view('header');

					$this->load->view('reg_thanks');
					$this->load->view('order_form', $data);
					$this->load->view('footer');
			}

		}
	}

	public function sign_reg(){
		$this->load->view('header');

		$data['source'] = $this->session->userdata('source');
 
		$this->load->view('sign_reg', $data);

		$this->load->view('footer');
	}

	public function username_check($str )
	{
		$result = $this->main->get_column('contacts',array('email'=> $str), 'email');

		if(!empty($result)){

			$this->form_validation->set_message('username_check', 'The %s alrady exists, Thanks!');
			
			return FALSE;
		}
		else{
			return TRUE;
		}
		
	}


	public function verify($user_id = 9999){

		if($user_id != 9999){

			$ver = $this->main->verify_contact($user_id);


			if(!empty($ver))
			{
				$data['contact'] = $ver[0]['first_name'];
				$this->load->view('header');
				$this->load->view('ver_thanks',$data);
				$this->load->view('footer');
			}
			else{
				echo "id does not exist";
			}
		}
	}

	public function sign_in(){

		// validate form
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->load->view('header');
		if ($this->form_validation->run() === FALSE){

			$this->load->view('sign_reg');

		}
		else{
			$contact = $this->main->check_login();
		
			if($contact === FALSE ){
				$data['response'] = "login Failed, please try again ";
				$this->load->view('sign_reg', $data);
			}
			else{

				$ra2 = array(
					'user_id' => $contact[0]['user_id']
					);
				$this->session->set_userdata($ra2);

				$data['contact'] = $contact[0];
				$this->load->view('order_form', $data);
			}
		}


		$this->load->view('footer');
	}

	public function order(){

		if(!$this->session->userdata('user_id')){

			echo "not signed in";

		}else{
			$this->main->place_order();

			// get contact info
			$contact = $this->main->get('contacts', array( 'id' => $this->input->post('id')));
	        // codeigniter email template

			$ra1 = array(
				'user_id' => $contact[0]['user_id']
				);
			$this->session->set_userdata($ra1);

			$data['contact'] = $contact[0];

			$this->load->library('email');
			$this->email->set_mailtype("html");

			$this->email->from('service@coefoto.com');
			$this->email->to($contact[0]['email']); 
			$this->email->bcc('bradslavens@gmail.com'); 
			$msg  = $this->load->view('mail/ord_verification', $data, TRUE);
			// $msg .= $this->load->view(signature);

			$this->email->subject('COE Foto -Order Confirmation');
			$this->email->message($msg); 
			$this->email->set_alt_message('error the email requires html, please contact Service at 619-253-0529');
			// echo $msg;
			$this->email->send();

			$this->load->view('header');

			$this->load->view('ord_thanks',$data);
			$this->load->view('footer');
		}
	}

}
