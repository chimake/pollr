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
                                    <div id="votingErrors"></div>
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
                                    $fetchUser = "SELECT first_name,last_name,picture FROM users WHERE oauth_uid='$userid'";
                                    $runQ = mysqli_query($con,$fetchUser);
                                    $fetres = mysqli_fetch_array($runQ);
                                    $first_name = $fetres['first_name'];
                                    $last_name = $fetres['last_name'];
                                    $picturue = $fetres['picture'];
                                    $time_keeper = date("Y-m-d h:i:sa");
                                    $dateDiff = intval((strtotime($created_on)-strtotime($time_keeper))/60);
                                    $hours = intval($dateDiff/60);
                                    $minutes = $dateDiff%60;
                                    echo "<div class=\"post-content\">"
                                        ."<ul class='list-group trip-details'>"
                                         ."<li class='list-group-item'><input class='optionChosen' type='radio' id='choice1' data-choice='firstchoice' data-postid='$postId' value='$fistOption' /><lable for='choice1' class='mixed'>$fistOption</lable></li>"
                                        ."<li class='list-group-item'><input class='optionChosen' type='radio' id='choice2' data-choice='secChoice' data-postid='$postId' value='$option2' /><lable for='choice2' class='mixed'>$option2</lable></li>"
                                        ."<li class='list-group-item'><input class='optionChosen' type='radio' id='choice3' data-choice='thirdChoice' data-postid='$postId' value='$option3' /><lable for='choice2' class='mixed'>$option3</lable></li>"
                                        ."<li class='list-group-item'><input class='optionChosen' type='radio' id='choice4' data-choice='fourthChoice' data-postid='$postId' value='$option4' /><lable for='choice2' class='mixed'>$option4</lable></li>"
                                        ."</ul>"
                                        ."<div class=\"post-container\">"
                                        ." <img src=\"$picturue\" alt=\"user\" class=\"profile-photo-md pull-left\" />"
                                        ."<div class='post-detail'>"
                                        ."<div class=\"user-info\">"
                                        ."<h5><a href=\"#\" class=\"profile-link\">$first_name $last_name</a> <span class=\"following\"></span></h5>"
                                        ."<p class=\"text-muted\">Published a poll about $hours hrs $minutes mins ago</p>"
                                        ."</div>"
                                        ."<div class=\"reaction\">"
                                        ."<a class=\"btn text-green\"><i class=\"fa fa-check-square-o\"></i> </a>"
                                        ."</div>"
                                        ." <div class=\"line-divider\"></div>"
                                        ."<div class=\"post-text\">"
                                        ."<p>$post_title</p>"
                                        ."</div>"
                                        ."</div>"
                                        ."</div>"
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
        <?php include "template/footer.php";?>

        <!--preloader-->
        <div id="spinner-wrapper">
            <div class="spinner"><img src="images/logo.png" alt="logo" />
            </div>
        </div>

        <!-- Modal -->
        <?php include "template/modalHome.php";?>

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
        $(".optionChosen").click(function () {
           var choice =$(this).val();
           var IDn = $(this).attr('id');

           var postId =$(this).data("postid");
           var page ="voteCaster";
           var userIdn = $("#userID").html();
           var dataString = "choice="+choice+"&postId="+postId+"&page="+page+"&userIdn="+userIdn;
            $.ajax({
                type: "POST",
                url: "plugin/handler.php",
                data: dataString,
                cache: false,
                success: function (result) {
                    if (result == "worked") {
                        swal("Vote Added", "");
                        $(IDn).attr('checked','checked');
                    } else {
                        $("#votingErrors").html(result);
                    }

                }
            });
        });
    </script>
    </body>


</html>
