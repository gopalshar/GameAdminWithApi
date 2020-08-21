<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
			if(empty($this->session->userdata('user'))){
			$currentURL = current_url();
			empty($currentURL)?'':$this->session->set_userdata('url',$currentURL);
			redirect('Login');
			}
        }


        protected function reder_view($view_name,$data=''){
	    $this->load->view('common/header.php');
		$this->load->view('common/sidebar.php');
        $this->load->view($view_name,$data);
		$this->load->view('common/footer.php');
        }
}

?>