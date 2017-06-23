<?php
if ($_SESSION['user_name'] =='') {
    header("Location:register.php");
    exit();
} else {
    $signedUser = $_SESSION['user_id'];
    $id = $signedUser["user_id"];
    $theinform = $_SESSION['user_name'];

}
?>