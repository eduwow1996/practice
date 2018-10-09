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

		public function auth(){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$auth = $this->MY_Model->auth_credentials($email);
			if($auth){
				if(password_verify($password,$auth->password)){
					$this->setSession($auth);
					redirect(base_url());
				} else {
					$data['msg'] = "Invalid Password.";
					$this->login_page("index",$data);
				}
			} else {
				$data['msg'] = "Invalid Username.";
				$this->login_page("index",$data);
			}
		}

		public function register(){
			$this->login_page("register");
		}

		public function process(){
			$full_name = $this->input->post('full_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->form_validation->set_rules('full_name','Full Name','required|trim');
			$this->form_validation->set_rules('email','Email',"valid_email|required|trim|is_unique[users_tbl.email]",array('is_unique' => 'This %s is already taken'));
			$this->form_validation->set_rules('password','Password','required|trim');
			$this->form_validation->set_rules('retype_password','Confirm Password','matches[password]|required|trim');
			if($this->form_validation->run() == false){
				$this->login_page("register");
			}else{
				$data_insert = array(
					'full_name' => $full_name,
					'email' => $email,
					'password' => password_hash($password,PASSWORD_DEFAULT),
					'user_type' => 1,
					'user_status' => 1,
					'date_registered' => date("Y-m-d")
				);
				if($this->MY_Model->insert('users_tbl',$data_insert)){
					$this->session->set_flashdata('msg','Successfully Registered, you can now login');
					redirect(base_url('login'));
				}
			}
		}

		public function setSession($data){
			$data_session = array(
				'user_id' => $data->user_id,
				'user_type' => $data->user_type,
				'full_name' => $data->full_name,
				'logged_in' => 1
			);
			$this->session->set_userdata($data_session);
		}

		public function logout(){
			$data_session = array('user_id' => NULL,'user_type' => NULL,'full_name' => NULL,'logged_in' => 0);
			$this->session->set_userdata($data_session);
			redirect(base_url('login'));
		}
	}
?>
