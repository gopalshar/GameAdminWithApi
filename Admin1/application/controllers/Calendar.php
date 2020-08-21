<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends MY_Controller {


  public function __construct(){
  	parent::__construct();
  	
  }


  public function index(){
    $this->reder_view('main/fullCalenderView');

  }

  public function getBookingCountByDate(){
    $date = $this->input->post('date');
    $response = array();
    $response['bookings'] = $this->LoginModel->countBookingsBydate($date);
    $data = $response['bookings']['bookings'];
    // echo json_encode($data);exit;

    for($i=0;$i<count($data);$i++){
      $data[$i]->booking_hour = $this->LoginModel->searchHourName($data[$i]->booking_hour);
    }
    $response['isBlocked'] = $this->LoginModel->checkDateIsBlocked($date);

    echo json_encode($response);
  }


  public function fetchBlockDates(){
    $this->db->select("dates as date");
    $this->db->from('block_dates');
    $events = $this->db->get()->result();

    $booking_count = $this->LoginModel->showBookingsCountByAllDates();
    // echo json_encode($booking_count);exit;

    for($i=0;$i<count($events);$i++){
      $events[$i]->title = "Date Blocked";
      $events[$i]->display = "background";
      $events[$i]->backgroundColor = "red";
    }

    $udpated_events = array_merge($booking_count,$events);
    // echo '<pre>';
    // print_r($udpated_events);exit;
    echo json_encode($udpated_events);
  }

}
