        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-12 mb-20">
                    <div class="page-heading">
                        <h3 class="title">Schedule <span>/ Manage Schedule</span></h3>
                    </div>
                </div>


                <!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">

                <!--Default Data Table Start-->
                <div class="col-12  mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h3 class="title">Schedule</h3>
                            <a href="<?= base_url('Subscription/addSubscription') ?>" class="custom_design_btn"><i class="fa fa-plus"></i> Add Plans</a>
                        </div>
                        <div class="box-body">
                          
                            <table class="table table-bordered data-table data-table-default">
                                <thead>
                                    <tr>
                                        <th>Booking Days</th>
                                        <th>Booking Time</th>
                                        <th>Booking Hours</th>
                                        <th>Action</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($schedule as $result):?>
                                    <tr>
                                       <td>
                          <?php $days = array('Monday','Tuesday','Wednesday','Thirsday','Friday','Saturday','Sunday');  
                            $booking_days = explode(',',$result->schedule_days);
                             $booking_days_data = array();
                             for($i=0;$i<count($booking_days);$i++)
                             {
                              $booking_days_data[] = $days[$booking_days[$i]-1];
                             }
                          ?>
                          <?php echo htmlentities(implode(',',$booking_days_data));?>
                        </td>
                        <td>
                          <?php echo htmlentities($result->schedule_start_time.' - '.$result->schedule_end_time);?> 
                          
                        </td>
                        <td>
                          <?php 

                         $results = array('09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');
                             $booking_hours = explode(',',$result->schedule_booking_hours);
                             $booking_hours_data = array();
                             for($i=0;$i<count($booking_hours);$i++)
                             {
                              $booking_hours_data[] = $results[$booking_hours[$i]-1];
                             }
                           ?>

                          <?php echo implode('<br>',$booking_hours_data);?>
                        </td>
                                        <td><a href="<?= base_url() ?>Schedule/editSchedule/<?= $result->schedule_id ?>"><i class="fa fa-pencil"></i></a>
                                            <!-- <a class="delete-confirm" href="<?= base_url() ?>Subscription/deleteSubscription/<?= $result->schedule_id ?>" ><i class="fa fa-trash" style="color:red;margin-left:10px;"></i></a></td> -->
                                        
                                    </tr>
                                <?php endforeach;?>
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Booking Days</th>
                                        <th>Booking Time</th>
                                        <th>Booking Hours</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
                <!--Default Data Table End-->

                <!--Export Data Table Start-->
                
                <!--Export Data Table End-->

                <!--How To Use Start-->
                
                <!--How To Use End-->

            </div>

        </div>