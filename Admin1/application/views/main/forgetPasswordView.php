<div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Admin <span>/ Change </span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row mbn-30">

                <!--Default Form Start-->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="box">
                       <div class="box-head d-flex justify-content-between">
                            <h4 class="title">Form Field</h4>
                            <a href="<?= base_url('Facility/manageFacility') ?>" class="btn btn-default custom_design_btn">Show Facility</a>
                        </div>

                        <div id="result">
                            
                                
                         
                        </div>

                        <div class="box-body">
                            <form action="<?= base_url('Login/changePassword') ?>" method="post" id="forget_form" >
                                <div class="row mbn-20">

                                    <div class="col-12 mb-20">
                                        <label for="formLayoutUsername1">Current Password</label>
                                        <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Current Password" required>
                                        <i class="zmdi zmdi-eye show_password" ></i>
                                    </div>
                                   
                                   
                                     <div class="col-12 mb-20">
                                        <label for="formLayoutUsername1">New Password</label>
                                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                                        <i class="zmdi zmdi-eye show_password"></i>
                                    </div>
                                   
                                     <div class="col-12 mb-20">
                                        <label for="formLayoutUsername1">Confirm Password</label>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                        <i class="zmdi zmdi-eye show_password"></i>
                                    </div>
                                    
                                   
                                   
                                  
                                    <input type="hidden" name="admin_id" value="<?= $this->session->userdata('user')->id ?>" id="admin_id">
                                    

                                    <div class="col-12 mb-20">
                                        <input type="submit" value="submit" class="button button-primary">
                                        <input type="reset" value="cancel" class="button button-danger">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             

            </div>

        </div>