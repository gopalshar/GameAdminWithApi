<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   public function __construct()
     {
     	parent::__construct();
     	header('Content-Type: application/json');
     	// $this->load->model('Api_model');
     }


	public function UserLogin()
	{
		$phone_number = $this->input->post("phone_number");
		// $response = array();
		if($this->Api_model->checkPhoneNumberAvailableOrNot($phone_number))
		{
			echo json_encode(array('status'=>true,'message'=>'phone number is already exist'));
			exit;
		}
		else
		{
			$otp = rand(1000, 9999);
			$timeout = time();
			$array_data = array('phone_number'=>$phone_number,'otp'=>$otp,'timeout'=>$timeout);
			//echo "<pre>";print_r($array_data);die;
			$p = (string)$phone_number;
			$this->session->set_userdata('session_'.$p,$array_data);
			echo json_encode(array('status'=>true,'otp'=>$otp,'message'=>'Otp Is Valid For 60 Second'));
		}
	}


   public function otpVarification()
    {
        
        $otp1 = $this->input->post('otp');
        $phone_number = $this->input->post('phone_number');
         $session = $this->session->userdata('session_'.$phone_number);
        if(!empty($session))
        {
            if(time()-$session['timeout'] >= 60)
            {
                

                echo json_encode(array('status' => FALSE,
                'message' => 'otp expire'));
                $this->session->unset_userdata('session_'.$phone_number);
            }

            else 
            {
                if(!empty($session['otp']))
                {
                    $otp =  $session['otp'];
                    $phone_number1 =  $session['phone_number'];
                    if($otp1 == $otp && $phone_number1 == $phone_number) 
                    {

                        $register_user = array('user_contact'=>$phone_number,'number_varified'=>1);
                        $user_id = $this->Api_model->registerUser($register_user);
                        $user_data = $this->Api_model->getUserData($user_id);
                        echo json_encode(array('status' => TRUE,
                        'message' => 'Correct Matched You are logged in','UserDetail'=>$user_data));
                        
                        $this->session->unset_userdata('session_'.$phone_number);
                    }

                    else 
                    {
                       echo json_encode( 
                        array('status' => FALSE,
                        'message' => 'invalid Otp')
                      );
                       
                    }
                }
            }
             
        }
        else 
        {
           
           echo json_encode(array('status' => FALSE,
            'message' => 'Otp Not Found'));
           
        }
    }



    public function updateUserProfile()
    {
		$user_name = $this->input->post('user_name');
		$user_phone = $this->input->post('user_phone');
		$user_address = $this->input->post('user_address');
		$user_email = $this->input->post('user_email');
		$user_password = $this->input->post('user_password');
		$user_id = $this->input->post("user_id");

		$update_data = array('user_name'=>$user_name,'user_contact'=>$user_phone,'user_address'=>$user_address,'user_email'=>$user_email,'user_password'=>$user_password);

		if($this->Api_model->checkPhoneNumberAvailableOrNot2($update_data['user_contact'],$user_id))
		{
			echo json_encode(array('status'=>false,'message'=>'Phone Number is already exist'));
			exit;
		}

        if (!empty($_FILES['profile_image']['name'])) 
        {
			$config['upload_path'] = './user_image';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('profile_image')) {
			$error = array('error' => $this->upload->display_errors());

			// echo json_encode($error);exit;
			} else {
			$update_data['user_image'] = 'rest_api/user_image/'.$this->upload->data()['file_name'];
			}
	   }

	   if($this->Api_model->updateUserProfile($update_data,$user_id))
	   {
	   	  $user_data = $this->Api_model->getUserData($user_id);
          echo json_encode(array('status'=>true,'message'=>'user profile updated','user_data'=>$user_data));
	   }
	   else
	   {
          echo json_encode(array('status'=>false,'message'=>'unable to update profile'));
	   }
    
     }
   





}