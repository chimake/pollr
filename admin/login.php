<!DOCTYPE html>
<html>
<head>
    <?php include_once 'template/meta.php'; ?>

    <?php include_once 'template/loginStyleLink.php'; ?>

    <?php
    include("plugin/config.php");
    session_start();
    $error = '';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        $myusername = mysqli_real_escape_string($db, $_POST['username']);
        $mypassword = mysqli_real_escape_string($db, $_POST['userpassword']);
        $encPass = md5($mypassword);

        $sql = "SELECT userId FROM adminusers WHERE user_name = '$myusername' and user_password = '$encPass'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['userId'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {

            $_SESSION['userId'] = $active;

            header("location: index.php");
        } else {
            $error = "Your Login Name or Password is invalid!";
        }
    }
    ?>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="index.html" class="logo"><span>POllr<span></span></span></a>
        <h5 class="text-muted m-t-0 font-600">Admin Section</h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
        </div>
        <div class="panel-body">

            <form class="form-horizontal m-t-20" action="" id="lg_form" method = "post">

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" id="userName" required="required" name="username" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" id="userPassword" name="userpassword" required="required" placeholder="Password">
                    </div>
                </div>


                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" id="logBtn" type="submit">Log In</button>
                    </div>
                </div>
            </form>
            <div class="text-center" style="color:#8b0000;font-size:15px;" id="error">
                <?php
                echo $error;
                ?></div>
        </div>
    </div>
    <!-- end card-box-->


</div>
<!-- end wrapper page -->


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
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>