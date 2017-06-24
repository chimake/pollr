<?php
/**
 * Created by PhpStorm.
 * User: Ogudu Chimaobi
 * Date: 23/06/2017
 * Time: 23:13
 */

include('config.php');
session_start();

$user_check = $_SESSION['userId'];
echo  $user_check;
$ses_sql = mysqli_query($db,"select user_name from adminusers where userId = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['user_name'];

if(!isset($_SESSION['userId'])){
    header("location:login.php");
}

?>