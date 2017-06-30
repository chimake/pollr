<?php
if ($userData['email'] =='') {
    header("Location:register.php");
    exit();
} else {
    $id = $userData["oauth_uid"];
    $fetcuserId = "SELECT id FROM users WHERE oauth_uid='$id'";
    $runfetcQuery = mysqli_query($con,$fetcuserId);
    $result = mysqli_fetch_array($runfetcQuery);
    $userID = $result['id'];
    $thefirstname = $userData['first_name'];
    $thelastname = $userData['last_name'];
    $thepicture = $userData['picture'];


}
?>