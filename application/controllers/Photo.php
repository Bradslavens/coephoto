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
}
