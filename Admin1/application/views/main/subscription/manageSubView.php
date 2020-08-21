        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-12 mb-20">
                    <div class="page-heading">
                        <h3 class="title">Subscription <span>/ Manage Subscription</span></h3>
                    </div>
                </div>


                <!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">

                <!--Default Data Table Start-->
                <div class="col-12  mb-30">
                    <div class="box">
                        <div class="box-head d-flex justify-content-between">
                            <h3 class="title">Subscription Plans</h3>
                            <a href="<?= base_url('Subscription/addSubscription') ?>" class="custom_design_btn"><i class="fa fa-plus"></i> Add Plans</a>
                        </div>
                        <div class="box-body">
                          
                            <table class="table table-bordered data-table data-table-default">
                                <thead>
                                    <tr>
                                        <th>Subscription Name</th>
                                        <th>Subscription Validity</th>
                                        <th>Subscription Price</th>
                                        <th>Subscription Hours</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sub as $f):?>
                                    <tr>
                                        <td><?= $f->sub_name ?></td>
                                        <td><?= $f->sub_validity ?></td>
                                        <td><?= $f->sub_price_currency.' '.$f->sub_price ?></td>
                                        <td><?= $f->sub_hours ?></td>
                                        <td><a href="<?= base_url() ?>Subscription/editSubscription/<?= $f->sub_id ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="delete-confirm" href="<?= base_url() ?>Subscription/deleteSubscription/<?= $f->sub_id ?>" ><i class="fa fa-trash" style="color:red;margin-left:10px;"></i></a></td>
                                        
                                    </tr>
                                <?php endforeach;?>
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Subscription Name</th>
                                        <th>Subscription Validity</th>
                                        <th>Subscription Price</th>
                                        <th>Subscription Hours</th>
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