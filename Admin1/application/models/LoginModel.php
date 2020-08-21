<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
  
  public function CheckAdmin($username){
  	$this->db->select("*");
  	$this->db->from('admin');
  	$this->db->where('UserName',$username);
  	return $this->db->get()->row();

  }


  public function getDataCount($table){
  	return $this->db->count_all_results($table);
  }

  public function getAllData($table){
  	$this->db->select("*");
  	$this->db->from($table);
  	return $this->db->get()->result();
  }


  public function getTodayHours($day_name){
    
  	 $hours = array('09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');

  	 $days = array('Monday','Tuesday','WednesDay','Thirsday','Friday','Saturday','Sunday');

  	 $today_id = array_search($day_name, $days)+1; 
  	 
  	 $this->db->select("schedule_booking_hours");
  	 $this->db->from("schedule");
  	 $this->db->where('schedule_days',$today_id);
  	 $AllowTime = $this->db->get()->row()->schedule_booking_hours;

  	 $AllowTime_array = explode(',',$AllowTime);
  	 $FinalTime = array();

  	 foreach($AllowTime_array as $d){
  	 	$FinalTime[] = $hours[$d-1];
  	 }

  	 return $FinalTime;


  }


  public function searchHour($time){
  	$hours = array('09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');

   	$hour_id = array_search($time, $hours)+1; 
  	return $hour_id; 
  }


 public function searchHourName($id){
    $hours = array('09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');

     
    return $hours[$id-1]; 
  }


  public function checkDateIsBlocked($date){
    $new_date = date_format(date_create($date),'yy-m-d');
    $data = $this->db->get_where('block_dates',array('dates'=>$new_date))->row();
    if(!empty($data)){
      return true;
    }
    else{
      return false;
    }

  }

  public function countBookingsBydate($date){   
    $new_date = date_format(date_create($date),'yy-m-d');
    $this->db->select("b.*,f.facility_name as facility_name,u.user_name as Uname");
    $this->db->from('booking b');
    $this->db->where('booking_date',$new_date);
    $this->db->join("facilities f","b.booking_facility_id = f.facility_id");
    $this->db->join("users u","b.booking_user_id = u.user_id");
    $data['bookings'] = $this->db->get()->result();
    $data['count'] = count($data['bookings']);
    return $data;
  }


  public function getWholedayBooking(){
    $this->db->select("w.booking_date,w.w_booking_id,CONCAT(w.start_time,'-',w.end_time) as time,u.user_name");
    $this->db->from('whole_day_booking w');
    $this->db->join('users u','w.customer_id = u.user_id');
    return $this->db->get()->result();
  }


  public function getUserBookingHours($user_id){
     
    $this->db->select('SUM(booking_persons) as P,COUNT(booking_id) as I');
    $this->db->from('booking');
    $this->db->where('booking_user_id',$user_id);
    return $this->db->get()->row();
  }

  public function CheckCurrectPassword($password,$admin_id){
   $this->db->select('id');
   $this->db->from('admin');
   $this->db->where(array('id'=>$admin_id,'Password'=>$password));
   if(!empty($this->db->get()->result())){
    return true;
   }
   else
   {
    return false;
   }
  }


  public function showBookingsCountByAllDates(){
    $this->db->select("booking_date as date");
    $this->db->from('booking');
    $this->db->distinct();
    $booking_count = $this->db->get()->result();
    for($i=0;$i<count($booking_count);$i++){
      $booking_count[$i]->title = $this->db->where('booking_date', $booking_count[$i]->date)->count_all_results('booking').' Bookings';
      $booking_count[$i]->display = 'background';
      $booking_count[$i]->backgroundColor = 'green';
      $booking_count[$i]->description = 'Block Mean You can"t add booking';
    }

    return $booking_count;
  }

}

?>
