<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
     
     public function __construct()
     {
     	parent::__construct();
     	header('Content-Type: application/json');
     }

     public function addBooking()
     {
     	$user_id = $this->input->post("user_id");
     	$facility_id = $this->input->post('facility_id');
     	$booking_date = $this->input->post('booking_date');
     	$booking_hour = $this->input->post('booking_hour');
     	$persons = $this->input->post('person_count');
     	$addi_member = $this->input->post('additional_member');
     	$addons = $this->input->post('addons');

     	if(!$this->Api_model->checkUserSubscriptionPlainActivateOrNot($user_id))
     	{
          echo json_encode(array('status'=>false,'message'=>'Please Activate Subscription Plan'));
          exit;
     	}
        
     	$hours = array('09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');
		// echo $booking_hour;exit;

		$hour = array_search($booking_hour, $hours);
		// echo ;exit;
		// echo $hour;exit;
		if(gettype($hour) == 'boolean')
		{
			echo json_encode(array('status'=>false,'message'=>'Please Enter Valid Time'));
			exit;
		}
        // $hour = $h-1;
     	if(!$this->Api_model->getBookingAvailableOrNot($booking_date,$hour,$facility_id))
     	{
     		echo json_encode(array('status'=>false,'message'=>'Booking Is Not Available for this time'));
     		exit;
     	}

        if($this->Api_model->isBlockDate($booking_date)){
          echo json_encode(array('status'=>false,'message'=>'Date Is Blocked For Booking'));
            exit;   
        }

     	$booking_number = $this->Api_model->getPhoneNumberById($user_id);

     	$booking_data = array('booking_user_id'=>$user_id,'booking_user_mobile'=>$booking_number,'booking_facility_id'=>$facility_id,'booking_date'=>$booking_date,'booking_hour'=>$hour,'booking_persons'=>$persons,'booking_addons'=>$addons,'addi_person'=>$addi_member);
     	
     	// echo '<pre>';print_r($booking_data);exit;
         if($this->Api_model->addFinalBooking($booking_data))
         {
         	echo json_encode(array('status'=>true,'message'=>'Booked Successfully'));
         }
         else
         {
         	echo json_encode(array('status'=>true,'message'=>'Unable To Book'));
         }

     }

     public function showBooking()
     {
     	$user_id = $this->input->post('user_id');
        $this->db->select("b.booking_id,f.facility_name,b.booking_date,b.booking_hour");
        $this->db->from('booking b');
        $this->db->join("facilities f","b.booking_facility_id = f.facility_id");
        $this->db->where('b.booking_user_id',$user_id);
        $My_bookings = $this->db->get()->result();
        // echo $this->db->last_query();exit;
        $hours = array('09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');
		// echo $booking_hour;exit;

		


        if(empty($My_bookings))
        {
        
        	echo json_encode(array("status"=>false,"message"=>"You Not Booked any facility yet"));
        }
        else
        {
			for($i=0;$i<count($My_bookings);$i++)
			{
			$My_bookings[$i]->booking_hour = $hours[$My_bookings[$i]->booking_hour];
			}

        	echo json_encode(array('status'=>true,'myBooking'=>$My_bookings));
        }
     }


}