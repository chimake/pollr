<?php
/**
 * Created by PhpStorm.
 * User: Ogudu Chimaobi
 * Date: 23/06/2017
 * Time: 23:27
 */

session_start();

if(session_destroy()) {
    header("Location: ../login.php");
}

?>