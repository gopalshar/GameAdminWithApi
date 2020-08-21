<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	
  }


  public function manualBooking(){

  	    if(!empty($this->input->post()))
  	    {
          $insert_booking = $this->input->post();
          $insert_booking['booking_hour'] = $this->LoginModel->searchHour($insert_booking['booking_hour']);
          $insert_booking['booking_addons'] = implode(',',$insert_booking['booking_addons']);
          $insert_booking['booking_date'] = date_format(date_create($insert_booking['booking_date']),'yy-m-d');
           
          if(!empty($this->db->insert('booking',$insert_booking))){
            $this->session->set_flashdata('result','Booked Added Sucessfully');
          	redirect($_SERVER['HTTP_REFERER']);
          }
  	    }

    $data['users'] = $this->LoginModel->getAllData("users");
    $data['addons'] = $this->LoginModel->getAllData("addons");
    $data['facilities'] = $this->LoginModel->getAllData("facilities");

    $this->reder_view('main/booking/manualBookingView',$data);
  }

  public function manageBooking(){

  	    $this->db->select("b.booking_id,b.booking_date,b.booking_hour,b.booking_persons,b.booking_addons,b.addi_person,b.booking_user_mobile,f.facility_name,u.user_name");
  	    $this->db->from('booking b');
        $this->db->join("users u",'b.booking_user_id = u.user_id','left');
        $this->db->join("facilities f",'b.booking_facility_id = f.facility_id','left');
        // $this->db->order_by('b.booking_id','DESC');
  	    $data['booking'] = $this->db->get()->result();
        $this->reder_view('main/booking/manageBookingView',$data);
  }

  public function editBooking(){
  	if(!empty($this->input->post())){
         $update_data = $this->input->post();
         $booking_id = $this->input->post('booking_id');
         
         unset($update_data['booking_id']);
         $update_data['booking_date'] = date_format(date_create($update_data['booking_date']),'yy-m-d');
          $hours = array('','09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');

         $update_data['booking_hour'] = array_search($update_data['booking_hour'], $hours);
         
         if(!empty($update_data['booking_addons'])){
          count($update_data['booking_addons']);
          $update_data['booking_addons'] = implode(',',$update_data['booking_addons']);
         }
         // print_r($update_data);exit;
         

         

          $this->db->where("booking_id",$booking_id);
          if($this->db->update('booking',$update_data)){
          	redirect('Booking/manageBooking');
          }

  	}
  	else
  	{
  		$id = $this->uri->segment(3);
  		$this->db->select("*");
  	  $this->db->from('booking');
  	  $this->db->where('booking_id',$id);
  	  $data['booking_detail'] = $this->db->get()->row();
  	    // print_r($data);exit;
  	    // echo '<pre>';print_r($data);exit;
      $data['users'] = $this->LoginModel->getAllData("users");
      $data['addons'] = $this->LoginModel->getAllData("addons");
      $data['facilities'] = $this->LoginModel->getAllData("facilities");
      

      $this->reder_view('main/booking/editBookingView',$data);

  		
  	}
  }


  public function deleteBooking(){
  	$id = $this->uri->segment(3);
  	$this->db->where('booking_id',$id);
  	$this->db->delete('booking');
  	redirect('Booking/manageBooking');
  	// echo $this->db->last_query();exit;
   
  }

  public function getHoursBydate(){
    $day_name = $this->input->post('day_name');
    $final_time = $this->LoginModel->getTodayHours($day_name);
    echo json_encode(array('hours'=>$final_time));
  }


  public function checkBooking(){
    $date = $this->input->post('date');
    $hour = $this->input->post('hour');
    $game = $this->input->post('game');
      

     
     $new_data = date_format(date_create($date),"Y-m-d");
     $new_hour = $this->LoginModel->searchHour($hour);
     $this->db->where(array('booking_facility_id'=>$game,'booking_date'=>$new_data,'booking_hour'=>$new_hour));
    $num_rows = $this->db->count_all_results('booking');

     if($num_rows >= 4)
       {
         echo json_encode(array('validation'=>true));
       }
       else
       {
        echo json_encode(array('validation'=>false));
       }
  
  }


  public function checkDateBlocked(){
    $date = $this->input->post('date');
    if($this->LoginModel->checkDateIsBlocked($date)){
      echo json_encode(array('blocked'=>false));
    }
    else{
      echo json_encode(array('blocked'=>true)); 
    }
  }


  



}  