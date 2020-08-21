<div class="footer-section">
            <div class="container-fluid">

                <div class="footer-copyright text-center">
                    <p class="text-body-light">2019 &copy; <a href="https://themeforest.net/user/codecarnival">Codecarnival</a></p>
                </div>

            </div>
        </div><!-- Footer Section End -->

    </div>

    <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="<?= base_url() ?>assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <!-- Plugins & Activation JS For Only This Page -->

    <!--Moment-->
    <script src="<?= base_url() ?>assets/js/plugins/moment/moment.min.js"></script>

    <!--Daterange Picker-->
    <script src="<?= base_url() ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/daterangepicker/daterangepicker.active.js"></script>

    <!--Echarts-->
    <script src="<?= base_url() ?>assets/js/plugins/chartjs/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/chartjs/chartjs.active.js"></script>

    <!--VMap-->
    <script src="<?= base_url() ?>assets/js/plugins/vmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/vmap/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/vmap/vmap.active.js"></script>
     <script src="<?= base_url() ?>assets/js/plugins/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/datatables/datatables.active.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/sweetalert/sweetalert.active.js"></script>

     <script src="<?= base_url() ?>assets/js/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/daterangepicker/daterangepicker.active.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/inputmask/bootstrap-inputmask.js"></script>

    <script src="<?= base_url() ?>assets/js/plugins/moment/moment.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/js/plugins/fullcalendar/fullcalender1.min.js"></script> -->
    <?php if($this->uri->segment(1) == 'Calendar'){ ?>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.0/main.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/fullcalendar/fullcalendar.active.js"></script>
<?php } ?>

</body>

</html>