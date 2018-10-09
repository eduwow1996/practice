<?php
	class MY_Controller extends MX_Controller{
		
		function __construct(){
			parent::__construct();
		}

		public function load_page($page,$data = array()){
			$this->load->view('head',$data);
			$this->load->view('nav',$data);
			$this->load->view($page,$data);
			$this->load->view('footer',$data);
		}

	}
?>