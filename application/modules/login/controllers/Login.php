<?php
	/**
	 *
	 */
	class Login extends MY_Controller{

		function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->login_page("index");
		}
	}
?>
