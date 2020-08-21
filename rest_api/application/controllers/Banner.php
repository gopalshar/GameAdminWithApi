<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
     
     public function __construct()
     {
     	parent::__construct();
     	header('Content-Type: application/json');
     }


     public function getBannerimages()
     {
     	$this->db->select("*");
     	$this->db->from('Banner');
     	$banner_data = $this->db->get()->result();
       
     	echo json_encode(array('status'=>true,'BannerData'=>$banner_data));
     	
     }
}    