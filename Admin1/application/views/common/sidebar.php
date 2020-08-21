 <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <?php if(!empty($this->uri->segment(1))){
                            $url = $this->uri->segment(1); }

                            else{ $url='';}  ?>
                        <li class="<?= ($url=='Dashboard')?'active':''; ?>" ><a href="<?= base_url('Dashboard') ?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>

                        <li class="has-sub-menu <?= ($url=='Facility')?'active':''; ?>"><a href="#"><i class="ti-package"></i> <span>Facilities</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="<?= base_url('Facility/addFacility') ?>"><span>Add Facilities</span></a></li>
                                <li><a href="<?= base_url('Facility/manageFacility') ?>"><span>Manage Facilities</span></a></li>
                                
                            </ul>
                        </li> 

                        <li class="has-sub-menu <?= ($url=='Subscription')?'active':''; ?>"><a href="#"><i class="ti-crown"></i> <span>Subscription</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="<?= base_url('Subscription/addSubscription') ?>"><span>Add Subscriptions</span></a></li>
                                <li><a href="<?= base_url('Subscription/manageSubscription') ?>"><span>Manage Subscriptions</span></a></li>
                               
                            </ul>
                        </li>
                        <li class="has-sub-menu <?= ($url=='Booking')?'active':''; ?>"><a href="#"><i class="ti-notepad"></i> <span>Booking</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="<?= base_url('Booking/manualBooking') ?>"><span>Manual Booking</span></a></li>
                                <li><a href="<?= base_url('Booking/manageBooking') ?>"><span>Manage Booking</span></a></li>
                                <li><a href="<?= base_url('WholeDayBooking/Bookings') ?>"><span>Whole Day Booking</span></a></li>
                               
                            </ul>
                        </li>
                        <li class="has-sub-menu <?= ($url=='Member')?'active':''; ?>"><a href="#"><i class="ti-user"></i> <span>Member</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="<?= base_url('Member/addMember') ?>"><span>Add Member</span></a></li>
                                <li><a href="<?= base_url('Member/manageMembers') ?>"><span>Manage Member</span></a></li>
                               
                            </ul>
                        </li>
                        <li class="has-sub-menu <?= ($url=='Schedule')?'active':''; ?>"><a href="#"><i class="ti-time"></i> <span>Date & Time</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="<?= base_url('Schedule/manageSchedule') ?>"><span>Manage Schedule</span></a></li>
                                <li><a href="<?= base_url('Schedule/blockDates') ?>"><span>Block Dates</span></a></li>
                                
                                
                            </ul>
                        </li>
                        
                        <li class="<?= ($url=='Payment')?'active':''; ?>" ><a href="<?= base_url('Payment') ?>"><i class="ti-money"></i> <span>Payment</span></a></li>

                        <li class="<?= ($url=='Banner')?'active':''; ?>"><a href="<?= base_url('Banner/showBanners') ?>"><i class="ti-image"></i> <span>Banner</span></a></li>
                        
                        <li class="<?= ($url=='Calendar')?'active':''; ?>"><a href="<?= base_url('Calendar') ?>"><i class="ti-calendar"></i> <span>Calender</span></a></li>
                        

                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div>