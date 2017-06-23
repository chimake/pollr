<?php
if ($userData['email'] =='') {
    header("Location:register.php");
    exit();
} else {
    $signedUser = $userData['oauth_uid'];
    $id = $userData["oauth_uid"];
    $theinform = $userData['first_name'];

}
?>