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
                <div id="userIDN" class="hidden"><?php echo $user_check;?></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <h4 class="header-title m-t-0 m-b-30">PollrApp Post</h4>
                            <a href="#" data-toggle="modal" data-target="#add-post" class="btn  btn-success btn-block waves-effect waves-light">
                                <i class="fa fa-plus"></i> Create New
                            </a>
                            <div id="tblErrors"></div>
                            <table class="table table-striped table-bordered" id="votegrid">
                                <thead>
                                    <tr>
                                        <td>Post Title</td>
                                        <td>User</td>
                                        <td>Total Votes</td>
                                        <td>Votes Breakdown</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $selectQuery = "SELECT COUNT(vote.postid) AS tot,posttbl.postid,posttbl.userid FROM vote INNER JOIN posttbl ON vote.postid=posttbl.postid GROUP by posttbl.postid,posttbl.userid";
                                        $fetchSelectRun = mysqli_query($db, $selectQuery);
                                    while ($fetchSelect = mysqli_fetch_array($fetchSelectRun)) {
                                        $total = $fetchSelect['tot'];
                                        $postid = $fetchSelect['postid'];
                                        $userId = $fetchSelect['userid'];
                                        $selePostName = "SELECT post_title FROM posttbl where postid='$postid'";
                                        $runPOstQuery  = mysqli_query($db,$selePostName);
                                        $fetchPostQuery = mysqli_fetch_array($runPOstQuery);
                                        $postTitle = $fetchPostQuery['post_title'];
                                        $seleuserQuery = " SELECT user_name from users where id='$userId'";
                                        $runuserQuery = mysqli_query($db, $seleuserQuery);
                                        $fetchuserQuery = mysqli_fetch_array($runuserQuery);
                                        $userName = $fetchuserQuery['user_name'];
                                        echo"<tr>"
                                        ."<td>$postTitle</td>"
                                        ."<td>$userName</td>"
                                        ."<td>$total</td>"
                                        ."<td><a href='totalbreadown.php?postid=$postid' class='btn btn-success'>View Vote Breakdown</a></td>"
                                        ."</tr>";
                                    }
                                        
                                    ?>
                                </tbody>
                                <tfoot>
                                   <tr>
                                        <td>Post Title</td>
                                        <td>User</td>
                                        <td>Total Votes</td>
                                        <td>Votes Breakdown</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-post">
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
        $('#votegrid').dataTable();

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