<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {
     
     public function __construct()
     {
     	parent::__construct();
     	header('Content-Type: application/json');
     	// $this->load->model('Api_model');
     }

     public function getSubscriptionPlans()
     {
     	$subscription_plans = $this->Api_model->getAllActivePlan();
        $response = array();
     	if(!empty($subscription_plans))
     	{
          $response['status'] = true;
          $response['subscription_plans'] = $subscription_plans;
     	}
     	else
     	{
     		$response['status'] = true;
     		$response['message'] = 'No Subscription Plans Available';
     	}

     	echo json_encode($response);
     }



     public function ActivateSpecificPlan()
     {
     	$user_id = $this->input->post('user_id');
     	$sub_id = $this->input->post('subscription_plan_id');
     	$response = array();
     	if($this->Api_model->checkUserSubscriptionPlainActivateOrNot($user_id)){
     		$response['status'] = true;
     		$response['message'] = "Your Plan is already activated";
     	}
     	else
     	{
            $plain_activation_data = array('user_subscription_id'=>$sub_id,'subscription_activation_date'=>date('y-m-d'));
            if($this->Api_model->activatePlain($plain_activation_data,$user_id))
            {
             $response['status'] = true;
     		 $response['message'] = "Your Plan Activated Successfully";	
            }
            else
            {
              $response['status'] = true;
     		$response['message'] = "Unable to activate plan";		
            }
            
     	}

     	echo json_encode($response);
     }
}     