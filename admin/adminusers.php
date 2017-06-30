<!DOCTYPE html>
<html>
<head>
    <?php include "plugin/session.php"; ?>
    <?php include "template/meta.php"; ?>
    <?php include "template/siteStylesheet.php"; ?>
    <?php $page = "adminusers"; ?>

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
                            <h4 class="header-title m-t-0 m-b-30">Users</h4>

                            <table id="admin_grid" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Approve</th>
                                    <th>Can Create</th>
                                    <th>Can Read</th>
                                    <th>Can Update</th>
                                    <th>Can Delete</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created On</th>
                                    <th>Updated On</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $theQuery = "SELECT adminusers.userId,adminusers.last_name,adminusers.first_name,adminusers.user_name,"
                                            . "adminusers.approve,adminusers.created_by,adminusers.updated_by,adminusers.updated_by,adminusers.created_on,"
                                            . "adminusers.updated_on,permission.cancreate,permission.canupdate,permission.canread,permission.candelete "
                                            . "FROM adminusers INNER JOIN permission ON permission.userId=adminusers.userId";
                                    $runtheQuery = mysqli_query($db,$theQuery);
                                    while ($q = mysqli_fetch_array($runtheQuery)){
                                        $userid = $q['userId'];
                                        $thefirstname = $q['first_name'];
                                        $thelastname = $q['last_name'];
                                        $theusername = $q['user_name'];
                                        $approve = $q['approve'];
                                        $createdBy = $q['created_by'];
                                        $updatedBy = $q['created_by'];
                                        $created_on = $q['created_on'];
                                        $updated_on = $q['updated_on'];
                                        $cancreate = $q['cancreate'];
                                        $canupdate = $q['canupdate'];
                                        $canread = $q['canread'];
                                        $candelete = $q['candelete'];
                                        $getCreator = "SELECT user_name FROM adminusers WHERE userId='$createdBy'";
                                        $runtheCreatorsQuery = mysqli_query($db,$getCreator);
                                        $fetchThecreator = mysqli_fetch_array($runtheCreatorsQuery);
                                        $thecreator = $fetchThecreator['user_name'];
                                        if ($updatedBy != 0){
                                            $getUpdater = "SELECT user_name FROM adminusers WHERE userId='$updatedBy'";
                                            $runTheUpdaterQuery = mysqli_query($db,$getUpdater);
                                            $fetchTheupdater = mysqli_fetch_array($runTheUpdaterQuery);
                                            $theupdater = $fetchTheupdater['user_name'];
                                        }

                                        echo "<tr>"
                                        . "<td>$thefirstname</td>"
                                                . "<td>$thelastname</td>"
                                                . "<td>$theusername</td>"
                                                . "<td><input type='checkbox'" . (($approve == 1) ? 'checked="checked"' : '') . "class='disab' data-uidl='$userid'></td>"
                                                . "<td><input type='checkbox'" . (($cancreate == 1) ? 'checked="checked"' : '') . "class='disab' data-uidl='$userid'></td>"
                                                . "<td><input type='checkbox'" . (($canread == 1) ? 'checked="checked"' : '') . "class='disab' data-uidl='$userid'></td>"
                                                 . "<td><input type='checkbox'" . (($canupdate == 1) ? 'checked="checked"' : '') . "class='disab' data-uidl='$userid'></td>"
                                                . "<td><input type='checkbox'" . (($candelete == 1) ? 'checked="checked"' : '') . "class='disab' data-uidl='$userid'></td>"
                                                . "<td>$thecreator</td>"
                                                . "<td>$theupdater</td>"
                                                . "<td>$created_on</td>"
                                                . "<td>$updated_on</td>"
                                                . "</tr>";
                                    }
                                ?>
                                
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Approve</th>
                                    <th>Can Create</th>
                                    <th>Can Read</th>
                                    <th>Can Update</th>
                                    <th>Can Delete</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created On</th>
                                    <th>Updated On</th>
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
    $( document ).ready(function() {
        $('#admin_grid').dataTable();

    });
</script>

</body>
</html>