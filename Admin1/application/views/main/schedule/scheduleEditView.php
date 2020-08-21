<div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Schedule <span>/ Update Schedule</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row mbn-30">

                <!--Default Form Start-->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h4 class="title">Form Field</h4>
                            <a href="<?= base_url('WholeDayBooking/Bookings') ?>" class="custom_design_btn">Show Bookings</a>
                        </div>
                        
                        <div class="box-body">

                            <form action="<?= base_url('Schedule/editSchedule') ?>" method="post">
                                <div class="row mbn-20">

                                     <div class="col-6 mb-20">
                                        <select  name="schedule_days" required="" class="form-control">
                             <?php 
                              $results = array('Monday','Tuesday','Wednesday','Thirsday','Friday','Saturday','Sunday');
                              foreach($results as $key=>$value) : ?>
                              <option style="padding:7px;" <?php if(in_array($key+1,explode(',',$schedule->schedule_days))){ echo 'selected';} ?> value="<?php echo $key+1 ?>"><?php echo $value ?></option>
                             <?php endforeach; ?>
                              </select>

                                    </div> 

                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Select Hour</label>
                                       
                                        <select multiple name="schedule_booking_hours[]" required="" class="form-control">
                             <?php 
                              $results = array('09 AM - 10 AM','10 AM - 11 AM','11 AM - 12 PM','12 PM - 01 PM','01 PM - 02 PM','02 PM - 03 PM','03 PM - 04 PM','04 PM - 05 PM','05 PM - 06 PM','06 PM - 07 PM','07 PM - 08 PM','08 PM - 09 PM','09 PM - 10 PM','10 PM - 11 PM','11 PM - 12 AM','12 AM - 01 AM','01 AM - 02 AM','02 AM - 03 AM','03 AM - 04 AM','04 AM - 05 AM','05 AM - 06 AM','06 AM - 07 AM','07 AM - 08 AM','08 AM - 09 AM');
                              foreach($results as $key=>$value) : ?>
                              <option style="padding:7px;" <?php if(in_array($key+1,explode(',',$schedule->schedule_booking_hours))){ echo 'selected';} ?> value="<?php echo $key+1 ?>"><?php echo $value ?></option>
                             <?php endforeach; ?>
                              </select>
                                    </div>
                                    
                                    <!--  <div class="col-2 mt-15">
                                        <label for="formLayoutUsername1"></label>
                                        <select class="form-control">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                
                                    </div> -->

                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Start Time</label>

                                        <input type="time"  name="schedule_start_time" class="form-control" placeholder="Start Time" value="<?= $schedule->schedule_start_time ?>" required>
                                    </div>

                                   <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">End Time</label>

                                        <input type="time" name="schedule_end_time" class="form-control" placeholder="End Time" value="<?= $schedule->schedule_end_time ?>" id="end-time" required>
                                          <!-- <label for="end-time"></label> -->
                                    </div>

                                    <input type="hidden" name="schedule_id" value="<?= $schedule->schedule_id ?>" id="addons_id">
                                    

                                    <div class="col-12 mb-20">
                                        <input type="submit" id="disableme" value="submit" class="button button-primary">
                                        <input type="reset" value="cancel" class="button button-danger">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Default Form End-->

                <!--Horizontal Form Start-->
               <!--  <div class="col-lg-6 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Horizontal Form</h4>
                        </div>
                        <div class="box-body">
                            <form>
                                <div class="row mbn-20">

                                    <div class="col-12 mb-20">
                                        <div class="row mbn-10">
                                            <div class="col-sm-3 col-12 mb-10"><label for="formLayoutUsername2">Username</label></div>
                                            <div class="col-sm-9 col-12 mb-10"><input type="text" id="formLayoutUsername2" class="form-control" placeholder="Username"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="row mbn-10">
                                            <div class="col-sm-3 col-12 mb-10"><label for="formLayoutEmail2">Email Address</label></div>
                                            <div class="col-sm-9 col-12 mb-10"><input type="email" id="formLayoutEmail2" class="form-control" placeholder="Email"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="row mbn-10">
                                            <div class="col-sm-3 col-12 mb-10"><label for="formLayoutPassword2">Password</label></div>
                                            <div class="col-sm-9 col-12 mb-10"><input type="password" id="formLayoutPassword2" class="form-control" placeholder="Password"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="row mbn-10">
                                            <div class="col-sm-3 col-12 mb-10"><label for="formLayoutConfirmPassword2">Confirm Password</label></div>
                                            <div class="col-sm-9 col-12 mb-10"><input type="password" id="formLayoutConfirmPassword2" class="form-control" placeholder="Confirm Password"></div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-20"><label class="adomx-checkbox"><input type="checkbox"><i class="icon"></i>Remember me</label></div>

                                    <div class="col-12 mb-20">
                                        <input type="submit" value="submit" class="button button-primary">
                                        <input type="submit" value="cancle" class="button button-danger">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <!--Horizontal Form End-->

                <!--Form With Basic Form Elements Start-->
                <!-- <div class="col-lg-6 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">HoriForm With Basic Form Elements</h4>
                        </div>
                        <div class="box-body">
                            <form>
                                <div class="row mbn-20">

                                    <div class="col-12 mb-20">
                                        <label for="formLayoutUsername3">Username</label>
                                        <input type="text" id="formLayoutUsername3" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutEmail3">Email Address</label>
                                        <input type="email" id="formLayoutEmail3" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutPassword3">Password</label>
                                        <input type="password" id="formLayoutPassword3" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutAddress1">Address</label>
                                        <input type="text" id="formLayoutAddress1" class="form-control" placeholder="Address">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutAddress2">Address 2</label>
                                        <input type="text" id="formLayoutAddress2" class="form-control" placeholder="Address 2">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="row mbn-20">
                                            <div class="col-lg-4 mb-20">
                                                <label for="formLayoutCity1">City</label>
                                                <input type="text" id="formLayoutCity1" class="form-control" placeholder="City">
                                            </div>
                                            <div class="col-lg-4 mb-20">
                                                <label for="formLayoutState1">State</label>
                                                <select id="formLayoutState1" class="form-control">
                                                    <option>Select State</option>
                                                    <option>State One</option>
                                                    <option>State Two</option>
                                                    <option>State Three</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mb-20">
                                                <label for="formLayoutZip1">Zip</label>
                                                <input type="text" id="formLayoutZip1" class="form-control" placeholder="Zip">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label for="formLayoutMessage1">Message</label>
                                        <textarea id="formLayoutMessage1" class="form-control" placeholder="Message"></textarea>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label for="formLayoutFile1">Upload a File</label>
                                        <input type="file" id="formLayoutFile1" class="form-control">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <div class="form-group">
                                            <label class="inline"><input name="basicRadio" type="radio">Option One</label>
                                            <label class="inline"><input name="basicRadio" type="radio">Option Two</label>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-20"><label><input type="checkbox">Remember me</label></div>

                                    <div class="col-12 mb-20">
                                        <input type="submit" value="submit" class="button button-primary">
                                        <input type="submit" value="cancle" class="button button-danger">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <!--Form With Basic Form Elements End-->

                <!--Form With Advance Form Elements Start-->
               <!--  <div class="col-lg-6 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Form With Advance Form Elements</h4>
                        </div>
                        <div class="box-body">
                            <form>
                                <div class="row mbn-20">

                                    <div class="col-12 mb-20">
                                        <label for="formLayoutUsername4">Username</label>
                                        <input type="text" id="formLayoutUsername4" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutEmail4">Email Address</label>
                                        <input type="email" id="formLayoutEmail4" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutPassword4">Password</label>
                                        <input type="password" id="formLayoutPassword4" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutAddress3">Address</label>
                                        <input type="text" id="formLayoutAddress3" class="form-control" placeholder="Address">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="formLayoutAddress4">Address 2</label>
                                        <input type="text" id="formLayoutAddress4" class="form-control" placeholder="Address 2">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="row mbn-20">
                                            <div class="col-lg-4 mb-20">
                                                <label for="formLayoutCity2">City</label>
                                                <input type="text" id="formLayoutCity2" class="form-control" placeholder="City">
                                            </div>
                                            <div class="col-lg-4 mb-20">
                                                <label for="formLayoutState2">State</label>
                                                <select id="formLayoutState2" class="form-control select2">
                                                    <option>Select State</option>
                                                    <option>State One</option>
                                                    <option>State Two</option>
                                                    <option>State Three</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mb-20">
                                                <label for="formLayoutZip2">Zip</label>
                                                <input type="text" id="formLayoutZip2" class="form-control" placeholder="Zip">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label for="formLayoutMessage2">Message</label>
                                        <textarea id="formLayoutMessage2" class="form-control" placeholder="Message"></textarea>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label for="formLayoutFile2">Upload a File</label>
                                        <input type="file" id="formLayoutFile2" class="dropify">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <div class="adomx-checkbox-radio-group inline">
                                            <label class="adomx-radio"><input name="advanceRadio" type="radio"><i class="icon"></i>Option One</label>
                                            <label class="adomx-radio"><input name="advanceRadio" type="radio"><i class="icon"></i>Option Two</label>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-20"><label class="adomx-checkbox"><input type="checkbox"><i class="icon"></i>Remember me</label></div>

                                    <div class="col-12 mb-20">
                                        <input type="submit" value="submit" class="button button-primary">
                                        <input type="submit" value="cancle" class="button button-danger">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <!--Form With Advance Form Elements End-->

            </div>

            

        </div>