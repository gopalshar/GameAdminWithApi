<div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Booking <span>/ Edit Booking</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row mbn-30">

                <!--Default Form Start-->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h4 class="title">Form Field</h4>
                            <a href="<?= base_url('Booking/manageBooking') ?>" class="custom_design_btn">Show Bookings</a>
                        </div>
                        <div class="result">
                            <?php if($this->session->flashdata('result')):?>
                                <div class="alert alert-success"><?= $this->session->flashdata('result'); ?></div>
                            <?php endif; ?>
                            </div>
                        <div class="box-body">

                            <form action="<?= base_url('Booking/editBooking') ?>" method="post" >
                                <div class="row mbn-20">

                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Select Member</label>
                                       
                                        <select name="booking_user_id" class="form-control" required>
                                            <option value=''>Select Member</option>
                                            <?php foreach($users as $u):?> 
                                            <option <?= ($u->user_id == $booking_detail->booking_user_id)?'selected':''; ?> value="<?= $u->user_id ?>"><?= $u->user_name ?></option>
                                        <?php endforeach;?>
                                        </select>
                                    </div>
                                    
                                    
                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Mobile Number</label>
                                        <input type="number" name="booking_user_mobile" class="form-control" placeholder="Mobile Number" value="<?= $booking_detail->booking_user_mobile ?>" required>
                                    </div>


                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Select Facility</label>
                                       
                                        <select name="booking_facility_id" class="form-control" id="facility_id" required>
                                            <option value=''>Select Facility</option>
                                            <?php foreach($facilities as $u):?> 
                                            <option <?= ($u->facility_id == $booking_detail->booking_facility_id)?'selected':''; ?> value="<?= $u->facility_id ?>"><?= $u->facility_name ?></option>
                                        <?php endforeach;?>
                                        </select>
                                    </div>
                                    
                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Date</label>
                                        <input type="text" id="datepicker_id" name="booking_date" class="form-control input-date-single" value="<?= date_format(date_create($booking_detail->booking_date),'m/d/yy') ?>" placeholder="Validity In Month">
                                    </div> 

                                    <div class="col-6 mb-20">
                                        <lable>Hours</lable>
                                        <select class="form-control" name="booking_hour" id="hour" required>
                                            <?php  foreach($hours as $h):?>
                                            <option value="<?= $h ?>"><?= $h ?></option>
                                        <?php endforeach; ?>
                                        </select>

                            <label style="color:red;display: none;margin-top:5px;" id="booking_error">Booking is not available in this time</label>
                                    </div>
                                 
                          

                                    <div class="col-6 mb-20">

                                        <label for="formLayoutMessage2">Person</label>

                                        <input type="number" id="formLayoutMessage2" name="booking_persons" class="form-control" value="<?= $booking_detail->booking_persons ?>" placeholder="Person" required>
                                    </div>
                                   
                                    <div class="col-6 mb-20">
                                        <lable>Addons</lable>
                                        <select class="form-control" name="booking_addons[]" multiple="true" >
                                            <option value='' >No one</option>
                                            <?php $addons_array = explode(',',$booking_detail->booking_addons); ?>
                                            <?php  foreach($addons as $s):?>

                                            <option <?= (in_array($s->id,$addons_array))?'selected':''; ?> value="<?= $s->id ?>"><?= $s->name ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    

                                     <div class="col-6 mb-20">

                                        <label for="formLayoutMessage2">Additional Members</label>

                                        <input type="number" id="formLayoutMessage2" name="addi_person" class="form-control" value="<?= $booking_detail->addi_person ?>"placeholder="Additional Members" required >
                                    </div>
                                    <input type="hidden" name="booking_id" value='<?= $booking_detail->booking_id ?>' id="booking_id">
                                    

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