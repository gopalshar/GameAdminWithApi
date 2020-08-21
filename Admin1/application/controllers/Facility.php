<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	
  }


  public function addFacility(){

  	    if(!empty($this->input->post()))
  	    {
          $insert_facility = $this->input->post();
          print_r($insert_facility);
          if(!empty($insert_facility['facility_tables'])){
          $insert_facility['facility_tables'] = implode(',',$insert_facility['facility_tables']);
          // unset($insert_facility['facility_table']);
          }
          if(!empty($_FILES['facility_image']['name'])){
			$config = array(
			'upload_path' => "uploads/facility_image",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			// 'overwrite' => TRUE,
			'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'encrypt_name'=>TRUE
			// 'max_height' => "1768",
			// 'max_width' => "1024"
			);
			$this->load->library('upload', $config);

			if($this->upload->do_upload('facility_image'))
			{
			$insert_facility['facility_image']=$this->upload->data()['file_name'];
			}
			else
			{ 
				print_r($this->upload->display_errors());exit;
             $insert_facility['facility_image']='';
			}

          }

          // echo '<pre>'; print_r($insert_facility);exit;
          if(!empty($this->db->insert('facilities',$insert_facility))){
          	 $this->session->set_flashdata('result','Facility Added Sucessfully');
            redirect($_SERVER['HTTP_REFERER']);
          }
  	    }
        

    $this->reder_view('main/facility/addFacilityView.php');  
  }

  public function manageFacility(){

  	    $this->db->select("*");
  	    $this->db->from('facilities');
  	    $data['facilities'] = $this->db->get()->result();

		
    $this->reder_view('main/facility/manageFacilityView',$data);  
  }

  public function editFacility(){
  	if(!empty($this->input->post())){
         $update_data = $this->input->post();
         $facility_id = $this->input->post('facility_id');
         $update_data['facility_tables'] = implode(',',$update_data['facility_tables']);
         $update_data['facility_adon_item'] = implode(',',$update_data['facility_adon_item']);
         unset($update_data['facility_id']);
         

         if(!empty($_FILES['facility_image']['name'])){
			$config = array(
			'upload_path' => "uploads/facility_image",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			// 'overwrite' => TRUE,
			'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'encrypt_name'=>TRUE
			// 'max_height' => "1768",
			// 'max_width' => "1024"
			);
			$this->load->library('upload', $config);

			if($this->upload->do_upload('facility_image'))
			{
			$update_data['facility_image']=$this->upload->data()['file_name'];
			}
			else
			{ 
				print_r($this->upload->display_errors());exit;
             $update_data['facility_image']='';
			}

          }

          $this->db->where("facility_id",$facility_id);
          if($this->db->update('facilities',$update_data)){
          	redirect('Facility/manageFacility');
          }

  	}
  	else
  	{
  		$id = $this->uri->segment(3);
  		$this->db->select("*");
  	    $this->db->from('facilities');
  	    $this->db->where('facility_id',$id);
  	    $data['facilities'] = $this->db->get()->row();

  	    $this->db->select("*");
  	    $this->db->from('addons');
  	    $data['addons'] = $this->db->get()->result();
  	    $data['f_id'] = $id;
  	    // echo '<pre>';print_r($data);exit;

  	    
    $this->reder_view('main/facility/editFacilityView',$data);  
  		
  	}
  }


  public function deleteFacility(){
  	$id = $this->uri->segment(3);
  	$this->db->where('facility_id',$id);
  	$this->db->delete('facilities');
  	redirect('Facility/manageFacility');
  	// echo $this->db->last_query();exit;
   
  }


  public function addAddons(){

  	$addon_data = $this->input->post();
	$config = array(
	'upload_path' => "uploads/addon_images",
	'allowed_types' => "gif|jpg|png|jpeg|pdf",
	// 'overwrite' => TRUE,
	'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
	'encrypt_name'=>TRUE
	// 'max_height' => "1768",
	// 'max_width' => "1024"
	);
	$this->load->library('upload', $config);

	if($this->upload->do_upload('addon_image'))
	{
		$addon_data['image']=$this->upload->data()['file_name'];
	}
    
    $this->db->insert('addons',$addon_data);
    $id = $this->db->insert_id();

	if($id){
	    $msg="Addon added successfully";
        echo json_encode(array('status'=>true,'msg'=>$msg,'addon_id'=>$id));exit;
	}
	else
	{
		$error="Something went wrong. Please try again";
		echo json_encode(array('status'=>false,'msg'=>$error));exit;
	}


  }

}  