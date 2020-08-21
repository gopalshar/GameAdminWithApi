<div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Facility <span>/ Edit Facility</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->
           
            <div class="row mbn-30">

                <!--Default Form Start-->
                <div class="col-lg-12 col-12 mb-30">
                    <div class="box">
                         <div class="box-head d-flex justify-content-between">
                            <h4 class="title">Form Field</h4>
                            <a href="<?= base_url('Facility/manageFacility') ?>" class="custom_design_btn">Show Facility</a>
                        </div>
                        <div class="box-body">
                            <form action="<?= base_url('Facility/editFacility') ?>" method="post" enctype='multipart/form-data'>
                                <div class="row mbn-20">

                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Facility Name</label>
                                        <input type="text" id="formLayoutUsername1" name="facility_name" class="form-control" placeholder="Username" value="<?= empty($facilities->facility_name)?'':$facilities->facility_name ?>" required>
                                    </div>
                                    <div class="col-1">
                                        <lable></lable>
                                        <img src="<?= empty($facilities->facility_image)?base_url().'uploads/facility_image/'.$facilities->facility_image:''; ?>"  style="width:132px;margin-top:31px;" id="facility_image_preview" alt="">
                                       
                                        
                                    </div>
                                    <div class="col-5 mb-20">
                                        <label for="formLayoutEmail1">Facility Image</label>
                                        <input type="file" name="facility_image" id="facility_image" class="form-control" onchange="document.getElementById('facility_image_preview').src = window.URL.createObjectURL(this.files[0])" placeholder="Email" >
                                    </div>
                                     
                                    <?php  $facility_table_array = explode(',',$facilities->facility_tables);
                                  $facility_table_count = count($facility_table_array); ?>
                                  <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Facility number</label>
                                        <input type="number" id="facility_numbers" class="form-control" placeholder="Number" value="<?= empty($facility_table_count)?'':$facility_table_count; ?>">
                                    </div>

                                    <div class="col-1"></div>
                                    <div class="col-5 mb-20">
                                        <label for="formLayoutEmail1">Facility  names <button type="button" class="btn btn-primary" id="append"><i class="fa fa-plus"></i> Add</button></label>
                                        <div class="row" id="boards">
                                            <?php foreach($facility_table_array as $key=>$value): ?>
                                            <div class="col-6 mb-20">
                                               <label for="formLayoutUsername1">Name <?= $key+1 ?> </label>
                                               <input type="text" id="formLayoutUsername1" name="facility_tables[]" class="form-control" value="<?= $value ?>" >
                                            </div>
                                        <?php endforeach; ?>
                                            
                                        </div>
                                    </div> 
                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Max Person Quantity</label>
                                        <input type="text" id="formLayoutUsername1" name="facility_quantity" class="form-control" value="<?= empty($facilities->facility_quantity)?'':$facilities->facility_quantity;?>" placeholder="Max Person Quantity">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label for="formLayoutMessage2">Facility Description</label>
                                        <textarea id="formLayoutMessage2" name="facility_spec" class="form-control" placeholder="Description"> <?= empty($facilities->facility_spec)?'':$facilities->facility_spec;?> </textarea>
                                    </div>

                                     <div class="col-6 mb-20">
                                    <h5 class="sub-title">Select Addons</h5>
                                    <?php $array = explode(',',$facilities->facility_adon_item); ?>
                                    <select class="form-control bSelect" name="facility_adon_item[]" multiple>
                                        <?php foreach($addons as $a):?>
                                       <option <?= (in_array($a->id,$array))?'selected':''; ?> value="<?= $a->id ?>"><?= $a->name ?></option>
                                   <?php endforeach ?>
                                    </select>
                                </div>

                                    

                                     <div class="col-6 mb-20">
                                        <label for="formLayoutUsername1">Adon Max Person</label>
                                        <input type="text" id="formLayoutUsername1" name="facility_adon_person" class="form-control" placeholder="Adon Max Person" value="<?= empty($facilities->facility_adon_person)?'':$facilities->facility_adon_person;?>">
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label for="formLayoutEmail1">Hourly Price</label>
                                        <input type="text" id="formLayoutUsername1" name="facility_hour_price" class="form-control" placeholder="Hourly Price" value="<?= empty($facilities->facility_hour_price)?'':$facilities->facility_hour_price;?>">
                                    </div>
                                    <input type="hidden" value="<?= empty($f_id)?'':$f_id ?>" name="facility_id" id="addons_id">
                                    

                                    <div class="col-12 mb-20">
                                        <input type="submit" value="submit" class="button button-primary">
                                        <input type="submit" value="cancel" class="button button-danger">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>