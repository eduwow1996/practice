<?php
	class MY_Model extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		public function auth_credentials($email){
			$this->db->where('email',$email);
			$query = $this->db->get("users_tbl");
			return $query->row();
		}

		public function insert($table,$set){
			$this->db->insert($table,$set);
			return $this->db->insert_id();
		}

	}
?>
