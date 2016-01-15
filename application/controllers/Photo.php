<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {


	public function index()
	{
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
}
