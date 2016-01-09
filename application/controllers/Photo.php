<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {


	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('services');
		$this->load->view('samples');
		$this->load->view('form');
		$this->load->view('footer');
	}
}
