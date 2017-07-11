<!DOCTYPE html>
<html>

<head>
    <?php include "plugin/session.php"; ?>
    <?php include "template/meta.php"; ?>
    <?php include "template/siteStylesheet.php"; ?>
    <?php $page = "pollrusvote"; ?>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

     <!-- Top Bar Start -->
    <?php include "template/topbar.php"; ?>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <?php include "template/leftbar.php"; ?>
    <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="hidden" id="thepostid">
                            <?php
                            $thepostId = $_GET['postid'];
                            echo $thepostId;
                            ?>                        
                        </div>

 
                        <!-- end row -->

                        <div class="row">


                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30" id="jsontester"> </h4>

                                    <div id="morris-donut-example" style="height: 300px;"></div>

                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5 style="color: #ff8acc;"><i class="fa fa-circle m-r-5"></i>Option 1 [<span id="one"></span>]</h5>
                                            </li>
                                            <li>
                                                <h5 style="color: #5b69bc;"><i class="fa fa-circle m-r-5"></i>Option 2 [<span id="two"></span>]</h5>
                                            </li>
                                            <li>
                                                <h5 style="color: #35b8e0;"><i class="fa fa-circle m-r-5"></i>Option 3 [<span id="three"></span>]</h5>
                                            </li>
                                           <li>
                                                <h5 style="color: #fff;"><i class="fa fa-circle m-r-5"></i>Option 4 [<span id="four"></span>]</h5>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
                    2016 - 2017 © Adminto.
                </footer>

            </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->



    </div>
    <!-- END wrapper -->



    <script>
        var resizefunc = [];
    </script>
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>


        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/js/inforgraphics.js"></script>
</body>


</html>