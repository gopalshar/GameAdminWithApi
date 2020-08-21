 <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Admin Profile</h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->
            <?php $userdata = $this->session->userdata('user'); ?>
            <div class="row mbn-50">

                <!--Author Top Start-->
                <div class="col-12 mb-50">
                    <div class="author-top">
                        <div class="inner">
                            <div class="author-profile">
                                <div class="image">
                                    <img src="assets/images/avatar/profile.jpg" class="d-none" alt="">
                                    <?php $firstCharacter = substr(explode(' ',$userdata->name)[0], 0, 1); 
                                          $secondCharacter = substr(explode(' ',$userdata->name)[1], 0, 1); 
                                        
                                     ?>
                                    <h2><?= $firstCharacter.''.$secondCharacter; ?></h2>
                                   <!--  <button class="edit"><i class="zmdi zmdi-cloud-upload"></i>Change Image</button> -->
                                </div>
                                <div class="info">
                                    <h5><?php echo $userdata->name ?></h5>
                                    <span><?php echo $userdata->UserName ?></span>
                                    <a href="#" class="edit"><i class="zmdi zmdi-edit"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Author Top End-->

                <!--Timeline / Activities Start-->
                
                <!--Right Sidebar End-->

            </div>

        </div><!-- Content Body End -->
