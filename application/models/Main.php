<?php
class Main extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function add_contact(){

		if($this->input->post()){

			// crypt the password
			$hash_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			// $id = "UNHEX(REPLACE(UUID(),'-',''))";
			$id = uniqid('coe');
			// $id = 10;

			$info = array(

				'user_id' => $id,
				'first_name' => $this->input->post('first_name'),
				'mi' => $this->input->post('mi'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
				'mail_list' => $this->input->post('mail_list'),
				'email' => $this->input->post('email'),
				'password' => $hash_password

				);

			$q = $this->db->insert("contacts", $info);

			return $this->db->insert_id();

		}
		else{
			exit('error');
		}
		
	}

	public function place_order($contact_id){

		if($this->input->post()){

			$info = array(

				'address_1' => $this->input->post('address_1'),
				'address_2' => $this->input->post('address_2'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'zip' => $this->input->post('zip'),
				'package' => $this->input->post('package1'),
				'fee' => $this->input->post('fee'),
				'cont_id' => $contact_id,
				'source' => $this->input->post('source'),
				'active' => 1
				);

			$this->db->insert('orders', $info);

			return $this->db->insert_id();

		}

	}

	public function get($table, $where = FALSE)
	{	
		if($where != FALSE){

			 $this->db->where($where);
		}
		$q = $this->db->get($table);

		return $q->result_array();
	}

	public function get_column($table, $where, $col){

		$this->db->select($col);
		$this->db->where($where);
		$q = $this->db->get($table);

		return $q->result_array();
	}

	public function verify_contact($user_id){
		
		$data = array('ver'=> 1);
		$this->db->where('user_id', $user_id);
		$this->db->update('contacts', $data);

		$this->db->select('first_name, last_name');
		$this->db->where('user_id', $user_id);
		$q = $this->db->get('contacts');

		return $q->result_array();
	}

	public function check_login(){

		// crypt the password

		$this->db->where('email',$this->input->post('email'));
		$q = $this->db->get('contacts');
		$ra = $q->result_array();

		if(!empty($ra)){

			if(password_verify($this->input->post('password'),$ra[0]['password'])){

				return $q->result_array();
			}
			else{
				
				return FALSE;
			}
		}else{
			return FALSE;
		}

	}
}