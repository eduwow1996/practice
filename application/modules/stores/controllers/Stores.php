<?php
	/**
	 *
	 */
	class Stores extends MY_Controller{

		function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->load_page("index");
		}

	}
?>
