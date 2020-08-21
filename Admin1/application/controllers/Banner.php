<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  	
  }




  
  

  public function deleteBanner(){
  	$id = $this->uri->segment(3);
  	$this->db->where('id',$id);
  	$this->db->delete('banner');
 
    $this->db->select('bnimg');
    $this->db->from('banner');
    $this->db->where('id',$id);
    $image_name = $this->db->get()->row();
    // print_r($image_name);exit;
    @unlink("uploads/banner_images/".$image_name->bnimg);
    // exit;
  	redirect('Banner/showBanners');
  	// echo $this->db->last_query();exit;
   
  }
   
 public function showBanners(){
   $data['banner'] = $this->LoginModel->getAllData('banner');
    
    $this->reder_view('main/banner/bannerView',$data);  
 }  

  public function addBanner(){
    
       $insert_date = array();

    if(!empty($_FILES['banner_image']['name'])){
      $config = array(
      'upload_path' => "uploads/banner_images",
      'allowed_types' => "gif|jpg|png|jpeg|pdf",
      'max_size' => "20480000",
      'encrypt_name'=>TRUE
      );
      $this->load->library('upload', $config);
      if($this->upload->do_upload('banner_image')){
      $insert_date['bnimg']=$this->upload->data()['file_name'];
      }
      else{ 
        print_r($this->upload->display_errors());exit;
        $insert_date['bnimg']='';
      }

       if(!empty($this->db->insert('banner',$insert_date))){
            $this->session->set_flashdata('result','Image Added Sucessfully');
            redirect($_SERVER['HTTP_REFERER']);
          }
    }


   
  

}

}  