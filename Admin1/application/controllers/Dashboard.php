<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


  public function __construct(){
  	parent::__construct();
  	if(empty($this->session->userdata('user'))){
  		
  		redirect('Login');
  	}
  	
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
		$data['f'] = $this->LoginModel->getDataCount('facilities');
		$data['s'] = $this->LoginModel->getDataCount('subscription');
		$data['m'] = $this->LoginModel->getDataCount('users');
		$data['b'] = $this->LoginModel->getDataCount('booking');
		$this->load->view('common/header.php');
		$this->load->view('common/sidebar.php');
		$this->load->view('main/dashboard.php',$data);
		$this->load->view('common/footer.php');
	}


	public function AdminProfile(){
		$this->load->view('common/header.php');
		$this->load->view('common/sidebar.php');
		$this->load->view('main/adminProfileView');
		$this->load->view('common/footer.php');
	}


}
