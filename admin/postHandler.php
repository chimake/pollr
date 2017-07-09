<!DOCTYPE html>
<html>
<head>
    <?php include "plugin/session.php"; ?>
    <?php include "template/meta.php"; ?>
    <?php include "template/siteStylesheet.php"; ?>
    <?php $page = "pollruscaters"; ?>

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
                <div id="userIDN" class="hidden"><?php echo $user_check;?></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <h4 class="header-title m-t-0 m-b-30">PollrApp Users</h4>
                            <a href="#" data-toggle="modal" data-target="#add-category" class="btn  btn-success btn-block waves-effect waves-light">
                                <i class="fa fa-plus"></i> Create New
                            </a>
                            <div id="tblErrors"></div>
                            <table id="admin_grid" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Parent</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created On</th>
                                    <th>Updated On</th>
                                    <th>Disable</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $theQuery = "SELECT catid,catname,catparent,disable,created_by,updated_by,created_on,updated_on FROM categories";
                                $runtheQuery = mysqli_query($db, $theQuery);
                                while ($qFetcher = mysqli_fetch_array($runtheQuery)) {
                                    $cateId     =   $qFetcher['catid'];
                                    $catename   =   $qFetcher['catname'];
                                    $catparent  =   $qFetcher['catparent'];
                                    $disabled   =   $qFetcher['disable'];
                                    $created_by =   $qFetcher['created_by'];
                                    $updated_by =  $qFetcher['updated_by'];
                                    $created    =   $qFetcher['created_on'];
                                    $updated    =   $qFetcher['updated_on'];
                                    $getCreator = "SELECT user_name FROM adminusers WHERE userId='$created_by'";
                                    $runcreatorQuery = mysqli_query($db, $getCreator);
                                    $fetchCreator = mysqli_fetch_array($runcreatorQuery);
                                    $theCreator = $fetchCreator['user_name'];
                                    $getUpdater = "SELECT user_name FROM adminusers WHERE userId='$updated_by'";
                                    $runupdaterQuery = mysqli_query($db, $getUpdater);
                                    $fetchUpdater = mysqli_fetch_array($runupdaterQuery);
                                    $theUpdater = $fetchUpdater['user_name'];
                                    if ($catparent == 0) {
                                        $catparent='';
                                    }
                                    $getParent = "SELECT catname FROM categories WHERE catparent='$catparent'";
                                    $runParentQuery = mysqli_query($db, $getParent);
                                    $fetchParent = mysqli_fetch_array($runParentQuery);
                                    $theFetchParent = $fetchParent['catname'];

                                    echo "<tr>"
                                            ."<td>$catename</td>"
                                            ."<td>$theFetchParent</td>"
                                            ."<td>$theCreator</td>"
                                            ."<td>$theUpdater</td>"
                                            ."<td>$created</td>"
                                            ."<td>$updated</td>"
                                            ."<td><input type='checkbox'" . (($disabled == 1) ? 'checked="checked"' : '') . "class='disab' data-uidl='$cateId'></td>"
                                            ."<td><button  data-toggle=\"modal\" data-target=\"#editcategory\" data-editCa='$cateId' class=\"btn  btn-primary waves-effect waves-light editcat\"><i class=\"fa fa-cogs\"></i></button></td>"
                                            ."<td><button  data-deleCat='$cateId' class=\"btn  btn-danger waves-effect waves-light delecat\"><i class=\"fa fa-trash-o\"></i></button></td>"
                                            ."<input type='hidden' class='editCa' value='$cateId'>"
                                        ."</tr>";
                                }
                                ?>

                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Parent</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created On</th>
                                    <th>Updated On</th>
                                    <th>Disable</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div id="catError"></div>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add a category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" id="categoryname"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Parent</label>
                                            <select class="form-control form-white" data-placeholder="Choose a category parent..." id="categoryparent">
                                                <option value="" disabled>Choose a category parent...</option>
                                                <?php
                                                    $fetParentCate  =   "SELECT catparent FROM categories";
                                                    $runParentCate  =   mysqli_query($db, $fetParentCate);
                                                while ($Qfetch = mysqli_fetch_array($runParentCate)) {
                                                    $theParent  =   $Qfetch['catparent'];
                                                    $getActualName  =   "SELECT catname FROM categories WHERE catid='$theParent'";
                                                    $fetchActualName    =   mysqli_query($db, $getActualName);
                                                    $fetchAt    =   mysqli_fetch_array($fetchActualName);
                                                    $theActual  =   $fetchAt['catname'];
                                                    echo "<option value='$theParent'>$theActual</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" id="svbtn">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->

                <!-- Modal Edit Category -->
                <div class="modal fade none-border" id="editcategory">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div id="updateerrors"></div>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Edit category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" id="editcategoryname"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Edit Category Parent</label>
                                            <select class="form-control form-white" data-placeholder="Choose a category parent..." id="editcategoryparent">
                                                <option value="" disabled>Choose a category parent...</option>
                                                <?php
                                                $fetParentCate  =   "SELECT catparent FROM categories";
                                                $runParentCate  =   mysqli_query($db, $fetParentCate);
                                                while ($Qfetch = mysqli_fetch_array($runParentCate)) {
                                                    $theParent  =   $Qfetch['catparent'];
                                                    $getActualName  =   "SELECT catname FROM categories WHERE catid='$theParent'";
                                                    $fetchActualName    =   mysqli_query($db, $getActualName);
                                                    $fetchAt    =   mysqli_fetch_array($fetchActualName);
                                                    $theActual  =   $fetchAt['catname'];
                                                    echo "<option value='$theParent'>$theActual</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" id="catId" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" id="editsvbtn">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->


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
    <?php include "template/rightSide.php";?>
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
<script src="assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#admin_grid').dataTable();

    });
    $("#svbtn").click(function () {
    var newcat  =   $("#categoryname").val();
    var catParent   =   $("#categoryparent").val();
    var page    =   "addnewcat";
    var userIdn =   $("#userIDN").html();
    var dataString  =   "newcat="+newcat+"&catParent="+catParent+"&userIdn="+userIdn+"&page="+page;
        $.ajax({
            type: "POST",
            url: "plugin/handler.php",
            data: dataString,
            cache: false,
            success: function (result) {
                if (result == "worked") {
                    swal("Category Added");
                    window.open("cateAdd.php", "_self");
                } else {
                    $("#catError").html(result);
                }

            }
        });
    });
    $(".editcat").click(function () {
        var cateIdn = $('.editCa').val();
        var userId =   $("#userIDN").html();
        var page = "editpage";
        var dataString = "cateIdn="+cateIdn+"&userId="+userId+"&page="+page;
        $.ajax({
            type: "POST",
            url: "plugin/handler.php",
            data: dataString,
            dataType: "json",
            cache: false,
            success: function (result) {
                    $("#editcategory .modal-body #catId").val(result[0]);
                    $("#editcategory .modal-body #editcategoryname").val(result[1]);
                    $("#editcategory .modal-body #editcategoryparent").val(result[2]);
                    $("#editsvbtn").click(function () {
                       var newId = $("#catId").val();
                       var newCate = $("#editcategoryname").val();
                       var newparent = $("#editcategoryparent").val();
                    //    alert(newCate);
                       var page = "editNew";
                       var datastring = "newId="+newId+"&newCate="+newCate+"&newparent="+newparent+"&page="+page;
                        $.ajax({
                            type: "POST",
                            url: "plugin/handler.php",
                            data: datastring,
                            cache: false,
                            success: function (result) {
                                if(result == "worked"){
                                    swal("Poll Category Updated", "");
                                    window.open("cateAdd.php", "_self");
                                }else{
                                    $("#updateerrors").html(result);
                                }
                            }
                        });
                    });


            }
        });

    });
    $(".delecat").click(function () {
    var catId = $(".editCa").val();
    var tablename = "categories";
    var columName = "catid";
    var page ="deleteFuc";
    var dataString = "itemId="+catId+"&tablename="+tablename+"&page="+page+"&columName="+columName;
        $.ajax({
            type: "POST",
            url: "plugin/handler.php",
            data: dataString,
            cache: false,
            success: function (result) {
                if (result=="worked"){
                    swal("Poll Category Delete", "");
                    window.open("cateAdd.php", "_self");
                }else {
                    $("#tblErrors").html(result);
                }
            }
        });
    });
</script>

</body>
</html>