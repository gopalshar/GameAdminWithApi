<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model{

    

    // ===================== Facility section ==============================

	function getAllFacilities()
	{
		$this->db->select("facility_id,facility_name,facility_image");
		$this->db->from('facilities');
		return $this->db->get()->result();
	}

	function getSingleFacility($facility_id)
	{
      $this->db->select("f.facility_id,f.facility_name,f.facility_image,f.facility_spec,f.facility_adon_item as allowed_addons,f.facility_adon_person as maximum_adon_person,f.facility_hour_price as facility_hourly_price,f.facility_quantity as max_person");
      $this->db->from('facilities f');
      $this->db->where(array('facility_id'=>$facility_id));
      return $this->db->get()->row();
	}

	function getAllowedAddons($string)
	{
		// return $string;
		$addon_ids = explode(',',$string);
        $addons = array();
		for($i=0;$i<count($addon_ids);$i++)
		{
			$this->db->select("id,name,price");
			$this->db->from('addons');
			$this->db->where('id',$addon_ids[$i]);
		    $addons[] = $this->db->get()->row_array();

		}
		return $addons;
		
	}

	function getPerPersonPrice(){
		$this->db->select("per_person_price");
		$this->db->from('person_addon');
		$data = $this->db->get()->row();
		return $data->per_person_price;
	}


	// ===================== Subscription Section =============================

	function getAllActivePlan()
	{
      $this->db->select("s.sub_id,s.sub_name,CONCAT(s.sub_validity,' Months') as sub_validity,s.sub_price_currency as price_currecy,s.sub_price as sub_price,CONCAT(s.sub_hours,' Hours') as sub_hours");
      $this->db->from('subscription s');
      return $this->db->get()->result();
	}

	function checkUserSubscriptionPlainActivateOrNot($user_id)
	{
      $this->db->select("user_subscription_id,subscription_activation_date");
      $this->db->from('users');
      $this->db->where('user_id',$user_id);
      $data = $this->db->get()->row();
      // empty($data)?return false:'';
      if(!empty($data->user_subscription_id))
      {
        if($this->checkPlainExpiredOrNot($data))
        {
         return false;
        }
        else
        {
        	return true;
        }

      }
      else {
      	return false;
      }
	}

	function checkPlainExpiredOrNot($data)
	{
       $plain_id = $data->user_subscription_id;
       $plain_activation_date = $data->subscription_activation_date;
		// print_r($data);
       $this->db->select('sub_validity');
       $this->db->from('subscription');
       $this->db->where('sub_id',$plain_id);
       $plain_validity = $this->db->get()->row()->sub_validity;
       // echo $plain_validity;exit;

       $effectiveDate = strtotime("+".$plain_validity." months", strtotime(date($plain_activation_date)));
       $date1= date("y/m/d", $effectiveDate);
       $current_date = date('y/m/d');

       // echo $date1.' > '.$current_date;exit;

       if($date1 < $current_date)
       {
         return true;
       }
       else
       {
         return false;
       }
       

	}

    function activatePlain($plain_data,$user_id)
    {
       $this->db->where('user_id',$user_id);
       if($this->db->update('users',$plain_data))
       {
         return true;
       }
       else
       {
         return false;
       }
    }

    // ===================== User Section ==============================

    function checkPhoneNumberAvailableOrNot($phone_number)
    {
    	$count = $this->db->where('user_contact',$phone_number)->from("users")->count_all_results();

    	if($count > 0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    function checkPhoneNumberAvailableOrNot2($phone_number,$user_id)
    {
       $count = $this->db->where(array('user_contact'=>$phone_number,'user_id !='=>$user_id))->from("users")->count_all_results();

    	if($count > 0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    function registerUser($data)
    {
		$this->db->insert('users', $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
    }

    function getUserData($user_id){
      $this->db->select('user_name,user_email,user_contact,user_address');
      $this->db->from('users');
      $this->db->where('user_id',$user_id);
      return $this->db->get()->row();
    }

   function updateUserProfile($user_data,$user_id)
   {
     $this->db->where('user_id',$user_id);
     if($this->db->update('users',$user_data))
     {
     	return true;
     }
     else
     {
     	return false;
     }
   }

  // ======================== Booking Section =============================


   function getBookingAvailableOrNot($booking_date,$booking_hour,$facility_id)
   {

		
		$condition = array('booking_facility_id'=>$facility_id,'booking_hour'=>$booking_hour,'booking_date'=>$booking_date);

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where($condition);
		$count = $this->db->get()->result();
		// echo $this->db->last_query();exit;
		$count_booking = !empty($count)?count($count):0;

		if($count_booking == 4)
		{
		return false;
		}
		else
		{
		return true;
		}


   }


   function isBlockDate($date){
    $count = $this->db->where(array('dates'=>$date))->from("block_dates")->count_all_results();
    // echo $this->db->last_query();exit;  
    return ($count>0)?true:false;
   }


    function getPhoneNumberById($user_id)
	{
		return $this->db->get_where('users',array('user_id'=>$user_id))->row()->user_contact;
	}

	function addFinalBooking($booking_data)
	{
		return $this->db->insert('booking',$booking_data);

	}

}