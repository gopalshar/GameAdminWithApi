        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3 class="title">Calendar <span>/ Fullcalendar</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Fullcalendar</h4>
                        </div>
                        <div class="box-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
                <!--Fullcalendar End-->

                <!--How To Use Start-->
               
                <!--How To Use End-->
            </div>

              <!-- Modal HTML -->
    


    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="date"></span> Details</h5>
                    <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <ul class="col-6 list-unstyled p-10 unique_class">
                            <li>Total Bookings : <span id="tb"></span></li>
                            <li>Is Date Blocked : <span id="ib"></span></li>
                          
                        </ul>

                         <ul class="col-6  list-unstyled pt-10 facility_count">
                            
                          
                        </ul>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Booking Time</th>
                                    <th>Facility Name</th>
                                </tr>
                            </thead>
                            <tbody id="bookings">
                                

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="button button-danger" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
   </div>

        </div>