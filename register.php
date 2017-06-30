<?php 
//require_once 'gpConfig.php';
require_once 'fbConfig.php';
require_once 'User.php';
//$authUrl = $gClient->createAuthUrl();
$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
?>
<!DOCTYPE html>
<html lang="en">	
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="This is social network html5 template available in themeforest......" />
        <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
        <meta name="robots" content="index, follow" />
        <title>Friend Finder | A Complete Social Network Template</title>

        <!-- Stylesheets
        ================================================= -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/ionicons.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />

        <!--Google Font-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

        <!--Favicon-->
        <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
    </head>
    <body>

        <!-- Header
        ================================================= -->
        <?php include 'template/connector.php'; ?>
        <?php include 'template/header.php'; ?>
        <!--Header End-->

        <!-- Landing Page Contents
        ================================================= -->
        <div id="lp-register">
            <div class="container wrapper">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="intro-texts">
                            <h1 class="text-white">Make Cool Friends !!!</h1>
                            <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
                            <button class="btn btn-primary">Learn More</button>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-1">
                        <div class="reg-form-container"> 

                            <!-- Register/Login Tabs-->
                            <div class="reg-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                                    <li><a href="#login" data-toggle="tab" id="loginTb">Login</a></li>
                                </ul><!--Tabs End-->
                            </div>

                            <!--Registration Form Contents-->
                            <div class="tab-content">
                                <div class="tab-pane active" id="register">
                                    <h3>Register Now !!!</h3>
                                    <div id="errorhandler"></div>
                                    <?php
                                    $output = '<center><a class="btn btn-primary" href="'.htmlspecialchars($loginURL).'"><i class="fa fa-facebook-official" aria-hidden="true"></i> Sign In With Facebook</a>  ';
//                                            . '<a class="btn btn-danger" href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><i class="fa fa-google" aria-hidden="true"></i> Sign In With Google</a></center>';                                            ;
                                    echo $output;
                                    ?>
                                   
                                    <center>-OR-</center>
                                    <!--Register Form-->
                                    <form name="registration_form" id='registration_form' class="form-inline">
                                        <div class="row">
                                            <div class="form-group col-xs-6">
                                                <label for="thefirstname" class="sr-only">First Name</label>
                                                <input id="thefirstname" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name"/>
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label for="thelastname" class="sr-only">Last Name</label>
                                                <input id="thelastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name"/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="theemailaddr" class="sr-only">Email</label>
                                                <input id="theemailaddr" class="form-control input-group-lg" type="email" name="Email" title="Enter Email" placeholder="Your Email"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="thepassword" class="sr-only">Password</label>
                                                <input id="thepassword" class="form-control input-group-lg" type="password" name="upassword" title="Enter password" placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="thecpassword" class="sr-only">Confirm Password</label>
                                                <input id="thecpassword" class="form-control input-group-lg" type="password" name="cpassword" title="Confirm password" placeholder="Confirm Password"/>
                                            </div>
                                        </div>                                        

                                        <div class="form-group gender">
                                            <label class="radio-inline">
                                                <input type="radio" value="male" id="thesex" name="optradio" checked>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" id="thesex" value="female" name="optradio">Female
                                            </label>
                                        </div>

                                        <p><a href="#">Already have an account?</a></p>
                                        <input type="button" id="registerbtn" class="btn btn-primary" value="Register Now" />
                                    </form>
                                    <!--Register Now Form Ends-->

                                </div><!--Registration Form Contents Ends-->

                                <!--Login-->
                                <div class="tab-pane" id="login">
                                    <h3>Login</h3>
                                    <p class="text-muted">Log into your account</p>

                                    <!--Login Form-->
                                    <form name="Login_form" id='Login_form'>
                                        <div id="errorhandler2"></div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="my-email" class="sr-only">Email</label>
                                                <input id="myemail" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Your Email"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="my-password" class="sr-only">Password</label>
                                                <input id="mypassword" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                                            </div>
                                        </div>
                                    </form><!--Login Form Ends--> 
                                    <p><a href="#">Forgot Password?</a></p>
                                    <button class="btn btn-primary" id="theloginbtn">Login Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6">

                        <!--Social Icons-->
                        <ul class="list-inline social-icons">
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--preloader-->
        <div id="spinner-wrapper">
            <div class="spinner"></div>
        </div>

        <!-- Scripts
        ================================================= -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.appear.min.js"></script>
        <script src="js/jquery.incremental-counter.js"></script>
        <script src="js/script.js"></script>
        <script src="js/pace.min.js"></script>
        <script>
            var loginstat;
            var thefirstname;
            var thelastname;
            var theusername;
            var theemailaddr;
            var thepassword;
            var thecpassword;
            var thesex;
            var page;
            $(document).ready(function () {

                $("#registerbtn").click(function () {
                    thefirstname = $('#thefirstname').val();
                    thelastname = $('#thelastname').val();
                    theemailaddr = $('#theemailaddr').val();
                    thepassword = $('#thepassword').val();
                    thecpassword = $('#thecpassword').val();
                    thesex = $('#thesex').val();
                    page = 'usersregister';
                    var dataString = 'thefirstname=' + thefirstname + '&thelastname=' + thelastname + '&theemailaddr=' + theemailaddr + '&thepassword=' + thepassword + '&thesex=' + thesex + '&page=' + page;
                    if (thefirstname == '' || thelastname == '' || thepassword == '' || thecpassword == '' || thesex == '' ) {
                        alert('All fields are requried');
                    } else if (thepassword != thecpassword) {
                        alert('passwords do not match');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "plugin/handler.php",
                            data: dataString,
                            cache: false,
                            success: function (result) {
                                if (result == 'picked') {
                                    alert('User Name Or Email Address Has Been Used')
                                } else if (result == 'done') {
                                    $('#loginTb').trigger('click');
                                } else {
                                    $('#errorhandler').html(result);
                                }
                            }
                        });
                    }

                });
                $("#theloginbtn").click(function () {
                    var myemail = $('#myemail').val();
                    var mypassword = $('#mypassword').val();
                    page = 'login';
                    var datastring = 'myemail=' + myemail + '&mypassword=' + mypassword + '&page=' + page;
                    if (myemail == '' || mypassword == '') {
                        alert('All fields are required!');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "plugin/handler.php",
                            data: datastring,
                            cache: false,
                            success: function (result) {
                                if (result == 'Logged in!') {
                                    window.location.href="index.php";
                                } else if (result == 'User Name or Password is incorrect') {
                                    alert(result);
                                } else {
                                    $('#errorhandler2').html(result);
                                }
                            }
                        });
                    }

                    });
                    

                });
            

        </script>
    </body>
</html>
