        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-12 mb-20">
                    <div class="page-heading">
                        <h3 class="title">Facility <span>/ Manage Facility</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">

                <!--Default Data Table Start-->
                <div class="col-12  mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h3 class="title">Facilities</h3>
                            <a href="<?= base_url('Facility/addFacility') ?>" class="custom_design_btn "><i class="fa fa-plus"></i> Add Facility</a>
                        </div>
                        <div class="box-body">
                          
                            <table class="table table-bordered data-table data-table-default">
                                <thead>
                                    <tr>
                                        <th>Facility Name</th>
                                        <th>Facility Image</th>
                                        <th>Facility Names</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($facilities as $f):?>
                                    <tr>
                                        <td><?= $f->facility_name ?></td>
                                        <td><img class="datatable_images img_fluid" src="<?= base_url().'uploads/facility_image/'.$f->facility_image ?>"></td>
                                        <td><?= $f->facility_tables ?></td>
                                        <td><a href="<?= base_url() ?>Facility/editFacility/<?= $f->facility_id ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="delete-confirm" href="<?= base_url() ?>Facility/deleteFacility/<?= $f->facility_id ?>"><i class="fa fa-trash" style="color:red;margin-left:10px;"></i></a></td>
                                        
                                    </tr>
                                <?php endforeach;?>
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Facility Name</th>
                                        <th>Facility Image</th>
                                        <th>Facility Names</th>
                                        <th>Actions</th>
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