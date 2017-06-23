<?php

$con = mysqli_connect('localhost', 'root', '', 'pollr');
if (mysqli_connect_errno()) {
    # code...
    echo "Failed to connect to Mysql" . mysqli_connect_errno();
}
?>

