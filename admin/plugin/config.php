<?php
/**
 * Created by PhpStorm.
 * User: Ogudu Chimaobi
 * Date: 23/06/2017
 * Time: 20:40
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'pollr');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>