        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-12 mb-20">
                    <div class="page-heading">
                        <h3 class="title">Booking <span>/ Manage Booking</span></h3>
                    </div>
                </div>


                <!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">

                <!--Default Data Table Start-->
                <div class="col-12  mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h3 class="title">Booking Details</h3>
                            <a href="<?= base_url('Booking/manualBooking') ?>" class="custom_design_btn"><i class="fa fa-plus"></i> Add Booking</a>
                        </div>
                        <div class="box-body">
                          
                            <table class="table table-bordered data-table data-table-default">
                                <thead>
                                    <tr>
                                        <th>Person Name</th>
                                        <th>Mobile No</th>
                                        <th>Facility</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Persons</th>
                                        <th>Addon Count</th>
                                        <th>Ad Member</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($booking as $b):?>
                                    <tr>
                                        <td><?= $b->user_name ?></td>
                                        <td><?= $b->booking_user_mobile ?></td>
                                        <td><?= $b->facility_name ?></td>
                                        <td><?= date_format(date_create($b->booking_date),'d  M  yy')  ?></td>
                                        <?php 
                                          $hours = array('','09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');
                                         ?>
                                        <td><?= $hours[$b->booking_hour]?></td>
                                        <td><?= $b->booking_persons ?></td>
                                        <td><?= count(explode(',',$b->booking_addons)) ?></td>
                                        <td><?= $b->addi_person ?></td>

                                        <td><a href="<?= base_url() ?>Booking/editBooking/<?= $b->booking_id ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="delete-confirm" href="<?= base_url() ?>Booking/deleteBooking/<?= $b->booking_id ?>" ><i class="fa fa-trash" style="color:red;margin-left:10px;"></i></a></td>
                                        
                                    </tr>
                                <?php endforeach;?>
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Person Name</th>
                                        <th>Mobile No</th>
                                        <th>Facility</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Persons</th>
                                        <th>Addon Count</th>
                                        <th>Ad Member</th>
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