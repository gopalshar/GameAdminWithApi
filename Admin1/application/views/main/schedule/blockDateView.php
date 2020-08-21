<div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Block Dates <span>/ Add Dates</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row mbn-30">

                <!--Default Form Start-->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h4 class="title">Form Field</h4>
                            
                        </div>
                        <div class="result">
                            <?php if($this->session->flashdata('result')):?>
                                <div class="alert alert-success"><?= $this->session->flashdata('result'); ?></div>
                            <?php endif; ?>
                            </div>
                        <div class="box-body">

                            <form action="<?= base_url('Schedule/blockDates') ?>" method="post" >
                                <div class="row mbn-20">

                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Select Date</label>
                                        <input type="text" id="datepicker" name="booking_date" class="form-control input-date-single" placeholder="Booking Date">
                                    </div> 

                                  

                                     
                                   

                                   <!--  <input type="hidden" name="facility_adon_item" id="addons_id"> -->
                                    

                                    <div class="col-6 mt-25">
                                        <input type="submit" id="disableme" value="submit" class="button button-primary">
                                        <input type="reset" value="cancel" class="button button-danger">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="row mt-30 " id="block_table">
                <div class=" col-lg-12 col-12 box">
                        <div class="box-head d-flex justify-content-between">
                            <h3 class="title">Booking Details</h3>
                           
                        </div>
                        <div class="box-body">
                          
                            <table class="table table-bordered data-table data-table-default">
                                <thead>
                                    <tr>
                                        <th>Blocked Date</th>
                                        
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($block_dates as $bd):?>
                                    <tr>
                                        <td><?= date_format(date_create($bd->dates),'d  M  yy')?></td>
                                        
                                        

                                        <td>
                                            <a class="delete-confirm" href="<?= base_url() ?>Schedule/deleteBlockdate/<?= $bd->id ?>" ><i class="fa fa-trash" style="color:red;margin-left:10px;"></i></a></td>
                                        
                                    </tr>
                                <?php endforeach;?>
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Blocked Date</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
            </div>

        </div>