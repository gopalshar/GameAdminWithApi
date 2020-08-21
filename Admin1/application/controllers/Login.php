<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
          // print_r($this->session->userdata('user'));exit;
		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		 if(!empty($this->session->userdata('user'))){
			redirect('Dashboard');
		}	
		
		$this->load->view('main/login.php');
		
	}


	public function LoginProcess(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->LoginModel->CheckAdmin($username);
		// print_r($data);exit;
		if(empty($data)){
         $this->session->set_flashdata('result','username is not exist');
         redirect('Login');
		}
		else
		{
			if(md5($password) == $data->Password){
			  // $this->session->set_flashdata('result','username is not exist');	
				$this->session->set_userdata('user',$data);
				if(!empty($this->session->userdata('url'))){
					redirect($this->session->userdata('url'));
				}
				redirect('Dashboard');
			}
			else
			{
				$this->session->set_flashdata('result','Incorrect Password');
				
				redirect('Login');
			}
		}
		// print_r($this->input->post());exit;

	}

	public function changePassword(){
		if(!empty($this->input->post())){
          $data = $this->input->post();
          $admin_id = $data['admin_id'];

          $currect_password = $data['current_password'];
          $new_password = $data['new_password'];
          if($this->LoginModel->CheckCurrectPassword(md5($currect_password),$admin_id)){
          	$this->db->where('id',$admin_id);
            if($this->db->update('admin',array('Password'=>md5($new_password)))){
            	echo json_encode(array('validation'=>true,'msg'=>'Password are changed'));exit;
            }
          }
          else
          {
          	echo json_encode(array('validation'=>false,'msg'=>'Current Password are wrong'));exit;
          }
		}
		else
		{
			$this->load->view('common/header.php');
			$this->load->view('common/sidebar.php');
			$this->load->view('main/forgetPasswordView');
			$this->load->view('common/footer.php');

		}
	}

	public function logout(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('url');
		// exit;
        redirect('Login');
	}

	
}
