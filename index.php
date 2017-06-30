<?php
session_start();
//include_once 'gpConfig.php';
include_once 'facebooklogin.php';
//include_once 'googlelogin.php';
?>
<!DOCTYPE html>
<html lang="en">

    <?php include 'template/connector.php';?>
    <?php include 'plugin/usercheck.php';?>
    <?php include 'template/head.php'; ?>
    <body>

        <!-- Header
        ================================================= -->
        <?php include 'template/innerheader.php'; ?>
        <!--Header End-->

        <div id="page-contents">
            <div class="container">
                <div class="row">

                    <!-- Newsfeed Common Side Bar Left
                    ================================================= -->
                    <?php include 'template/lefthand.php'; ?>
                    <div class="col-md-9">

                        <!-- Post Create Box
                        ================================================= -->
                        <div class="create-post">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <h2>Polls</h2>
                                </div>

                            </div>
                        </div><!-- Post Create Box End-->

                        <!-- Post Content
                        ================================================= -->

                            <?php
                                $selectQuery = "SELECT * FROM  posttbl  WHERE approve=1";
                                $runQuery = mysqli_query($con,$selectQuery);
                                while ($postdata = mysqli_fetch_array($runQuery)){
                                    $postId = $postdata['postid'];
                                    $userid = $postdata['userid'];
                                    $post_title = $postdata['post_title'];
                                    $fistOption = $postdata['option1'];
                                    $option2 = $postdata['option2'];
                                    $option3 = $postdata['option3'];
                                    $option4 = $postdata['option4'];
                                    $category = $postdata['category'];
                                    $created_on = $postdata['created_on'];
                                    $fetchUser = "SELECT first_name,last_name FROM users WHERE id='$userid'";
                                    $runQ = mysqli_query($con,$fetchUser);
                                    $fetres = mysqli_fetch_array($runQ);
                                    $first_name = $fetres['first_name'];
                                    $last_name = $fetres['last_name'];
                                    $picturue = $fetres['picture'];
                                    echo "<div class=\"post-content\"><ul class='list-group trip-details'>"
                                         ."<li class='list-group-item'><input class='choice1' type='radio' id='choice1' data-postid='$postId' value='$fistOption' /><lable for='choice1' class='mixed'>$fistOption</lable></li>"
                                        ."<li class='list-group-item'><input class='choice2' type='radio' id='choice2' data-postid='$postId' value='$option2' /><lable for='choice2' class='mixed'>$option2</lable></li>"
                                        ."<li class='list-group-item'><input class='choice3' type='radio' id='choice3' data-postid='$postId' value='$option3' /><lable for='choice2' class='mixed'>$option3</lable></li>"
                                        ."<li class='list-group-item'><input class='choice4' type='radio' id='choice4' data-postid='$postId' value='$option4' /><lable for='choice2' class='mixed'>$option4</lable></li>"
                                        ."</ul>"
                                        ."<div class=\"post-container\">"
                                        ." <img src=\"$picturue\" alt=\"user\" class=\"profile-photo-md pull-left\" />"
                                        ."</div>";
                                }
                            ?>


                    </div>

                    <!-- Newsfeed Common Side Bar Right
                    ================================================= -->

                </div>
            </div>
        </div>

        <!-- Footer
        ================================================= -->
        <footer id="footer">


            <div class="copyright">
                <p>Thunder Team © 2016. All rights reserved</p>
            </div>
        </footer>

        <!--preloader-->
        <div id="spinner-wrapper">
            <div class="spinner"><img src="images/logo.png" alt="logo" />
            </div>
        </div>

        <!-- Modal -->
        <div id="post" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Polls</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger alert-dismissable fade in" id="errorhandle">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>

                        </div>
                        <form>
                            <div class="form-group">
                                <label for="email">Poll Title</label>
                                <input type="text" class="form-control" id="pollTitle" placeholder="Poll Title" data-placeholder="Poll Title">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email"></label>
                                        <input type="text" class="form-control" id="choicefixed1" placeholder="Choice 1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email"></label>
                                        <input type="text" class="form-control" id="choicefixed2" placeholder="Choice 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="newBox">

                            </div>
                            <div class="row">
                                <div id="error"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" id="fieldadd" class="btn btn-success">+ Add</button>
                                    <button type="button" id="fieldremove" class="btn btn-danger hidden">X Remove</button>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn-success" id="formStm">Submit</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scripts
        ================================================= -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky-kit.min.js"></script>
        <script src="js/jquery.scrollbar.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#errorhandle").addClass("hidden");
            var counter = 2;
            $("#fieldadd").click(function () {
                $("#fieldremove").removeClass("hidden");
                if (counter == 3){
                    $("#fieldadd").addClass("hidden");
                }
                counter++;
                var newtextbox  = $(document.createElement('div'))
                    .attr("class",'col-sm-6');
                newtextbox.after().html('<input type="text" class="form-control"" name="choice'+counter+'" id="choice'+counter+'" placeholder="Choice '+counter+'">');
                newtextbox.appendTo("#newBox");

            });
            $("#fieldremove").click(function () {
                if (counter > 2){
                    $("#choice"+counter).remove();
                    counter--;
                    if (counter == 2){
                        $("#fieldremove").addClass("hidden");
                        $("#fieldadd").removeClass("hidden");
                    }
                }


            });
            $("#formStm").click(function () {
               var theTitle = $("#pollTitle").val();
               var fisrchoice = $("#choicefixed1").val();
               var secChoice = $("#choicefixed2").val();
               var thirdchoice = $("#choice3").val();
               var fourthcchoice = $("#choice4").val();
               var userid = $("#userID").html();
               var page = "pollrAdd";
               var dataString = "theTitle="+theTitle+"&firstchoice="+fisrchoice+"&secChoice="+secChoice+"&thirdchoice="+thirdchoice+"&fourthcchoice="+fourthcchoice+"&page="+page+"&userid="+userid;
               if (theTitle==''){
                   var place = $("#pollTitle").attr("placeholder");
                    $("#errorhandle").removeClass("hidden");
                    $("#errorhandle").html("<b>"+place+"</b>  shouldn't be empty");
               }else if(fisrchoice == ''){
                   var plaeholder1 = $("#choicefixed1").attr("placeholder");
                   $("#errorhandle").removeClass("hidden");
                   $("#errorhandle").html("<b>"+plaeholder1+"</b>  shouldn't be empty");
               }else if(secChoice == ''){
                   var placeholder2 = $("#choicefixed2").attr("placeholder");
                   $("#errorhandle").removeClass("hidden");
                   $("#errorhandle").html("<b>"+placeholder2+"</b>  shouldn't be empty");
               }else {
                   $("#errorhandle").addClass("hidden");

                   $.ajax({
                       type: "POST",
                       url: "plugin/handler.php",
                       data: dataString,
                       cache: false,
                       success: function (result) {
                           if (result == "worked") {
                               swal("Poll Added", "");
                               window.open("index.php", "_self");
                           } else {
                               $("#errorhandle").removeClass("hidden");
                               $("#errorhandle").html(result);
                           }

                       }
                   });
               }

            });
        });
    </script>
    </body>


</html>
