<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends CI_Controller {
     
     public function __construct()
     {
     	parent::__construct();
     	header('Content-Type: application/json');
     	// $this->load->model('Api_model');
     }

	 public function getFacilities()
	 {
	 	$facilities = $this->Api_model->getAllFacilities();
	 	$response = array();

	 	if(!empty($facilities))
	 	{
         $response['status'] = true;
         $response['facilities'] = $facilities;
	 	}
	 	else
	 	{
	 		$response['status'] = true;
	 		$response['message'] = 'facilities not found';
	 	}
	 	echo json_encode($response);
	 }


	 public function getSingleFacility()
	 {
	 	$facility_id = $this->input->post('facility_id');
	 	$single_facility = $this->Api_model->getSingleFacility($facility_id);
	 	// $single_facility->facility_max_adon_person = $single_facility->facility_adon_person;
	 	// unset($single_facility->facility_adon_person);
        // print_r($single_facility);exit;
	 	$response = array();
        if(!empty($single_facility))
	 	{
         $response['status'] = true;
         $response['facility'] = $single_facility;

         $response['facility']->allowed_addons = $this->Api_model->getAllowedAddons($single_facility->allowed_addons);
         $response['facility']->per_additional_person_price = $this->Api_model->getPerPersonPrice();
         
	 	}
	 	else
	 	{
	 		$response['status'] = true;
	 		$response['facility'] = 'facilities not found';
	 	}
	 	echo json_encode($response);
	 }
	
}
