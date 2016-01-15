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
		$this->load->view('mail_list');
		$this->load->view('break');
		$this->load->view('footer');
	}

	public function web_hook()
	{
		$this->load->model('main');
		// add to database
		$info = array(
		'first_name' => 'photo ',
		'last_name' => 'last ',
		'email' =>  'e@g.com ',
		'originator_id' => '387 ',
		'type' => 27 // = photo client
			);

		$this->main->add_contact($info);

	}
}
