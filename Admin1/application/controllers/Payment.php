<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	
  }


  public function index(){

  	    if(!empty($this->input->post())){
          $user_id  = $this->input->post('customer_id');
          $this->db->select("*");
          $this->db->from('users u');
          $this->db->join('subscription s','u.user_subscription_id = s.sub_id','left');
          $this->db->where('u.user_id',$user_id);
          $data['user'] = $this->db->get()->row();
          $this->load->view('main/payment/GenerateInvoice',$data);
  	    }
        else{
          $data['users'] = $this->LoginModel->getAllData('users');
          
          $this->reder_view('main/payment/invoiceView',$data);

    }
  }



  
}  