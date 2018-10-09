<?php
	class MY_Controller extends MX_Controller{

		function __construct(){
			parent::__construct();
		}

		public function login_page($page,$data = array()){
			$this->load->view('login-head',$data);
			$this->load->view($page,$data);
			$this->load->view('login-footer',$data);
		}

		public function load_page($page,$data = array()){
			$this->load->view('head',$data);
			$this->load->view('nav',$data);
			$this->load->view($page,$data);
			$this->load->view('footer',$data);
		}

	}
?>
