<div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Subscription <span>/ Edit Subscription</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row mbn-30">

                <!--Default Form Start-->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h4 class="title">Form Field</h4>
                            <a href="<?= base_url('Subscription/manageSubscription') ?>" class="custom_design_btn">Show Plans</a>
                        </div>
                        <!-- <div class="result">
                            <?php if($this->session->flashdata('result')):?>
                                <div class="alert alert-success"><?= $this->session->flashdata('result'); ?></div>
                            <?php endif; ?>
                            </div> -->
                        <div class="box-body">

                            <form action="<?= base_url('Subscription/editSubscription') ?>" method="post" enctype='multipart/form-data'>
                                <div class="row mbn-20">

                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Subscription Name</label>
                                        <input type="text" id="formLayoutUsername1" name="sub_name" class="form-control" value="<?= empty($sub->sub_name)?'':$sub->sub_name ?>" placeholder="Subscription Name" required>
                                    </div>
                                    
                                    
                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Hours</label>
                                        <input type="number" value="<?= empty($sub->sub_hours)?'':$sub->sub_hours ?>" name="sub_hours" class="form-control" placeholder="Hours">
                                    </div>
                                    
                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Validity In Month</label>
                                        <input type="number" id="formLayoutUsername1" name="sub_validity" class="form-control" placeholder="Validity In Month" value="<?= empty($sub->sub_validity)?'':$sub->sub_validity ?>">
                                    </div>

                                    <div class="col-2 ">
                                        <lable>currency</lable>
                                        <select class="form-control" name="sub_price_currency">
                                            <option value="QR">QR</option>
                                        </select>
                                    </div>

                                    <div class="col-4 mb-20">

                                        <label for="formLayoutMessage2">Price</label>

                                        <input type="number" id="formLayoutMessage2" name="sub_price" class="form-control" placeholder="Price" value="<?= empty($sub->sub_price)?'':$sub->sub_price ?>" >
                                    </div>

                                    

                                     
                                    <input type="hidden" value="<?= empty($sub->sub_id)?'':$sub->sub_id ?>" name="sub_id" id="addons_id">
                                    

                                    <div class="col-12 mb-20">
                                        <input type="submit" value="Update" class="button button-primary">
                                        
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                

            </div>

        </div>