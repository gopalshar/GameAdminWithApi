<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	
  }


  public function addMember(){

  	    if(!empty($this->input->post()))
  	    {
          $insert_member = $this->input->post();
          

          
          
          $insert_member['user_reg_date'] = date_format(date_create($insert_member['user_reg_date']),'yy-m-d');
          if(!empty($insert_member['user_subscription_id'])){
            $insert_member['subscription_activation_date'] = date('yy-m-d');
          }
          // echo '<pre>'; print_r($insert_member);exit;
          if(!empty($this->db->insert('users',$insert_member))){
            $this->session->set_flashdata('result','Member Added Sucessfully');
          	redirect($_SERVER['HTTP_REFERER']);
            
          }
  	    }

    $data['sub'] = $this->LoginModel->getAllData("subscription");
    
    // print_r($data['sub']);exit;
    
    $this->reder_view('main/member/addMemberView.php',$data);  
  }

  public function manageMembers(){

  	$this->db->select("u.*,s.sub_name,s.sub_hours,s.sub_validity");
  	$this->db->from('users u');
    $this->db->join('subscription s','u.user_subscription_id = s.sub_id','left');
  	$data['user'] = $this->db->get()->result();
    
    for($i=0;$i<count($data['user']);$i++){
      $data['user'][$i]->hours = $this->LoginModel->getUserBookingHours($data['user'][$i]->user_id);
    }

    $this->reder_view('main/member/manageMemberView',$data);
  }



  public function deleteMembers(){
  	$id = $this->uri->segment(3);
  	$this->db->where('sub_id',$id);
  	$this->db->delete('subscription');
  	redirect('Subscription/manageSubscription');
  	// echo $this->db->last_query();exit;
   
  }



}  