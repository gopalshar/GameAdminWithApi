<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	
  }




  public function manageSchedule(){

  	$this->db->select("*");
  	$this->db->from('schedule');
  	$data['schedule'] = $this->db->get()->result();


    $this->reder_view('main/schedule/scheduleManageView',$data);
  }

  public function editSchedule(){
  	if(!empty($this->input->post())){
         $update_data = $this->input->post();
         $schedule_id = $this->input->post('schedule_id');  
         
         unset($update_data['schedule_id']);
         $update_data['schedule_booking_hours'] = implode(',',$update_data['schedule_booking_hours']);
         // print_r($update_data);exit;

         

          $this->db->where("schedule_id",$schedule_id);
          if($this->db->update('schedule',$update_data)){
          	redirect('Schedule/manageSchedule');
          }

  	}
  	else
  	{
  		$id = $this->uri->segment(3);
  		$this->db->select("*");
	    $this->db->from('schedule');
	    $this->db->where('schedule_id',$id);
	    $data['schedule'] = $this->db->get()->row();

      $this->reder_view('main/schedule/scheduleEditView',$data);
  		
  	}
  }


  public function deleteBlockdate(){
  	$id = $this->uri->segment(3);
  	$this->db->where('id',$id);
  	$this->db->delete('block_dates');
  	redirect('Schedule/blockDates');
  	// echo $this->db->last_query();exit;
   
  }


  public function blockDates(){
    if(!empty($this->input->post())){
      $insert_date = $this->input->post();
       $insert_date['dates'] = date_format(date_create($insert_date['booking_date']),'yy-m-d');
       unset($insert_date['booking_date']);
       if(!empty($this->db->insert('block_dates',$insert_date))){
            $this->session->set_flashdata('result','Date Blocked Sucessfully');
            redirect($_SERVER['HTTP_REFERER']);
            
          }


    }
    else
    {
    $data['block_dates'] = $this->LoginModel->getAllData('block_dates');
    
    $this->reder_view('main/schedule/blockDateView',$data);   
    }
  }






}  