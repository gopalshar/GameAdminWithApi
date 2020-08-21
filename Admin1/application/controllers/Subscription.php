<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	// $this->load->model('LoginModel');
  }


  public function addSubscription(){

  	    if(!empty($this->input->post()))
  	    {
          $insert_facility = $this->input->post();
          

          // echo '<pre>'; print_r($insert_facility);exit;
          if(!empty($this->db->insert('subscription',$insert_facility))){
            $this->session->set_flashdata('result','Subscription Plan Added Sucessfully');
          	redirect($_SERVER['HTTP_REFERER']);
            
          }
  	    }
    
    $this->reder_view('main/subscription/addSubView.php');   
  }

  public function manageSubscription(){

  	    $this->db->select("*");
  	    $this->db->from('subscription');
  	    $data['sub'] = $this->db->get()->result();

		
    $this->reder_view('main/subscription/manageSubView',$data);
  }

  public function editSubscription(){
  	if(!empty($this->input->post())){
         $update_data = $this->input->post();
         $sub_id = $this->input->post('sub_id');
         
         unset($update_data['sub_id']);
         // print_r($update_data);exit;

         

          $this->db->where("sub_id",$sub_id);
          if($this->db->update('subscription',$update_data)){
          	redirect('Subscription/manageSubscription');
          }

  	}
  	else
  	{
  		$id = $this->uri->segment(3);
  		$this->db->select("*");
  	    $this->db->from('subscription');
  	    $this->db->where('sub_id',$id);
  	    $data['sub'] = $this->db->get()->row();
  	    
  	    // echo '<pre>';print_r($data);exit;

    	

      $this->reder_view('main/subscription/editSubView',$data);
  		
  	}
  }


  public function deleteSubscription(){
  	$id = $this->uri->segment(3);
  	$this->db->where('sub_id',$id);
  	$this->db->delete('subscription');
  	redirect('Subscription/manageSubscription');
  	// echo $this->db->last_query();exit;
   
  }



}  