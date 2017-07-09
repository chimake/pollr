<!DOCTYPE html>
<html>
<head>
    <?php include "plugin/session.php"; ?>
    <?php include "template/meta.php"; ?>
    <?php include "template/siteStylesheet.php"; ?>
    <?php $page = "pollrusers"; ?>

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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30">PollrApp Users</h4>

                            <table id="admin_grid" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Provider</th>
                                    <th>Email</th>
                                    <th>Registered On</th>
                                    <th>Account Updated On</th>
                                    <th>Disable</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $theQuery = "SELECT id,oauth_provider,first_name,last_name,user_name,email,created,modified,disable FROM users";
                                $runtheQuery = mysqli_query($db, $theQuery);
                                while ($qFetcher = mysqli_fetch_array($runtheQuery)){
                                    $userid     =   $qFetcher['id'];
                                    $first_name = $qFetcher['first_name'];
                                    $provider   =   $qFetcher['oauth_provider'];
                                    $last_name = $qFetcher['last_name'];
                                    $user_name = $qFetcher['user_name'];
                                    $email = $qFetcher['email'];
                                    $created    =   $qFetcher['created'];
                                    $updated    =   $qFetcher['modified'];
                                    $disabled   =   $qFetcher['disable'];
                                    echo "<tr>"
                                            ."<td>$first_name</td>"
                                            ."<td>$last_name</td>"
                                            ."<td>$user_name</td>"
                                            ."<td>$provider</td>"
                                            ."<td>$email</td>"
                                            ."<td>$created</td>"
                                            ."<td>$updated</td>"
                                            ."<td><input type='checkbox'" . (($disabled == 1) ? 'checked="checked"' : '') . "class='disab' data-uidl='$userid'></td>"
                                            ."<td><button class='btn btn-danger deleuser' data-polluser='$userid'>Delete</button></td>"
                                        ."</tr>";

                                }
                                ?>

                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Provider</th>
                                    <th>Email</th>
                                    <th>Registered On</th>
                                    <th>Account Updated On</th>
                                    <th>Disable</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- end col -->
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


    <!-- Right Sidebar -->
    <div class="side-bar right-bar">
        <a href="javascript:void(0);" class="right-bar-toggle">
            <i class="zmdi zmdi-close-circle-o"></i>
        </a>
        <h4 class="">Notifications</h4>
        <div class="notification-list nicescroll">
            <ul class="list-group list-no-border user-list">
                <li class="list-group-item">
                    <a href="#" class="user-list-item">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-2.jpg" alt="">
                        </div>
                        <div class="user-desc">
                            <span class="name">Michael Zenaty</span>
                            <span class="desc">There are new settings available</span>
                            <span class="time">2 hours ago</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="user-list-item">
                        <div class="icon bg-info">
                            <i class="zmdi zmdi-account"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name">New Signup</span>
                            <span class="desc">There are new settings available</span>
                            <span class="time">5 hours ago</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="user-list-item">
                        <div class="icon bg-pink">
                            <i class="zmdi zmdi-comment"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name">New Message received</span>
                            <span class="desc">There are new settings available</span>
                            <span class="time">1 day ago</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item active">
                    <a href="#" class="user-list-item">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-3.jpg" alt="">
                        </div>
                        <div class="user-desc">
                            <span class="name">James Anderson</span>
                            <span class="desc">There are new settings available</span>
                            <span class="time">2 days ago</span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item active">
                    <a href="#" class="user-list-item">
                        <div class="icon bg-warning">
                            <i class="zmdi zmdi-settings"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name">Settings</span>
                            <span class="desc">There are new settings available</span>
                            <span class="time">1 day ago</span>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- /Right-bar -->

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

<!-- Datatables-->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('#datatable').dataTable();-->
<!--        $('#datatable-keytable').DataTable({keys: true});-->
<!--        $('#datatable-responsive').DataTable();-->
<!--        $('#datatable-scroller').DataTable({-->
<!--            ajax: "assets/plugins/datatables/json/scroller-demo.json",-->
<!--            deferRender: true,-->
<!--            scrollY: 380,-->
<!--            scrollCollapse: true,-->
<!--            scroller: true-->
<!--        });-->
<!--        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});-->
<!--    });-->
<!--    TableManageButtons.init();-->
<!---->
<!--</script>-->

<script type="text/javascript">
    $(document).ready(function () {
        $('#admin_grid').dataTable();

    });
</script>

</body>
</html>