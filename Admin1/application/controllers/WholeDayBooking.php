<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WholeDayBooking extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	
  }


  public function Bookings(){
   if(!empty($this->input->post())){
     $booking_data = $this->input->post();

     $booking_data['booking_date'] = date_format(date_create($booking_data['booking_date']),'yy-m-d');

   	if($this->db->insert('whole_day_booking',$booking_data)){
      $this->session->set_flashdata('result','Booked Sucessfully');
          	redirect($_SERVER['HTTP_REFERER']);
   	}

   }
   else
   {
   	$data['users'] = $this->LoginModel->getAllData("users");
   	$data['booking'] = $this->LoginModel->getWholedayBooking();
	
  $this->reder_view('main/booking/wholeDayBookingView',$data);
   }
  }




  public function editBooking(){
  	if(!empty($this->input->post())){
         $update_data = $this->input->post();
         // print_r($update_data);exit;
         $booking_id = $this->input->post('w_booking_id');
         // $update_data['booking_date'] = date_format(date_create($update_data['booking_date']),'yy-m-d');
         unset($update_data['w_booking_id']);
          $this->db->where("w_booking_id",$booking_id);
          
          if($this->db->update('whole_day_booking',$update_data)){
          	// echo $this->db->last_query();exit;
          	redirect('WholeDayBooking/Bookings');
          }

  	}
  	else
  	{
  		$id = $this->uri->segment(3);
  		$this->db->select("*");
  	  $this->db->from('whole_day_booking');
  	  $this->db->where('w_booking_id',$id);
  	  $data['booking_detail'] = $this->db->get()->row();
  	    // print_r($data);exit;
  	    // echo '<pre>';print_r($data);exit;
      $data['users'] = $this->LoginModel->getAllData("users");
      
      $this->reder_view('main/booking/wholeDayBookingEditView',$data);
  		
  	}
  }




  public function deleteBooking(){
  	$id = $this->uri->segment(3);
  	$this->db->where('w_booking_id',$id);
  	$this->db->delete('whole_day_booking');
  	redirect($_SERVER['HTTP_REFERER']);
  	// echo $this->db->last_query();exit;
   
  }
 } 


