        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-12 mb-20">
                    <div class="page-heading">
                        <h3 class="title">Member <span>/ Manage Member</span></h3>
                    </div>
                </div>


                <!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">

                <!--Default Data Table Start-->
                <div class="col-12  mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h3 class="title">Members</h3>
                            <a href="<?= base_url('Member/addMember') ?>" class="custom_design_btn"><i class="fa fa-plus"></i> Add Member</a>
                        </div>
                        <div class="box-body">
                          
                            <table class="table table-bordered data-table data-table-default">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Subscription Plan</th>
                                        <th>Plan Activation Date</th>
                                        <th>Plan Expiry Date</th>
                                        <th>Registration Date</th>
                                        <th>Remaining Hours</th>
                                        <th>Total Bookings</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($user as $u):?>
                                    <tr>
                                        <td><?= $u->user_name ?></td>
                                        <td><?= $u->user_contact ?></td>
                                        <td><?= (empty($u->user_subscription_id))?'Not Activated':$u->sub_name.' '.$u->sub_validity.' Months' ?></td>
                                        <td><?= (empty($u->user_subscription_id))?'Not Activated':date_format(date_create($u->subscription_activation_date),'d  M  yy')  ?></td>
                                        <td>
                                            <?php $d = strtotime("+".$u->sub_validity." months",strtotime($u->subscription_activation_date)); 
                                                $date1= date("y/m/d", $d);
                                                $current_date = date('y/m/d');
                                             ?>
                                             <?= (empty($u->subscription_activation_date))?'Not Activated':
                                             ($date1 < $current_date ?'Plan Expired':date("d M Y",$d))

                                            ;?>
                                        </td>
                                        <td><?= date_format(date_create($u->user_reg_date),'d  M  yy')  ?> </td>
                                        <td><?= ($u->sub_hours)?$u->sub_hours-$u->hours->P:'-'; ?></td>
                                        <td><?= ($u->hours->I)?$u->hours->I:'0'; ?></td>
                                        
                                        
                                    </tr>
                                <?php endforeach;?>
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Subscirption Plan</th>
                                        <th>Plan Activation Date</th>
                                        <th>Plan Expiry Date</th>
                                        <th>Registration Date</th>
                                        <th>Remaining Hours</th>
                                        <th>Total Bookings</th>
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