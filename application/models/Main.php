<?php
class Main extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function add_contact($info)
	{
		$q = $this->db->insert('contacts', $info);

		echo $this->db->insert_id();
		
	}

}