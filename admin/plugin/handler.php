<?php
/**
 * Created by PhpStorm.
 * User: Ogudu Chimobi
 * Date: 26/06/2017
 * Time: 22:04
 */
include 'conn.php';
if (isset($_POST['page']) && !empty($_POST['page'])) {
    $action = $_POST['page'];
    switch ($action) {
        case 'tablefetcher' :
            $User = new User();
            echo $User->tablefetcher();
            break;

    }
}

class User
{
    public $db;

    public function __construct()
    {
        # code...
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {

            echo "Error: Could not connect to database.";

            exit;
        }
    }


    public function tablefetcher()
    {
        $thedbname = $_POST['dbname'];
        $theQuery = "SELECT * FROM '$thedbname'";
        $runQuery = mysqli_query($this->db,$theQuery);
        $q = mysqli_fetch_array($runQuery);
        $enQ = json_encode($q);
        if ($enQ !='')
        {
            echo $enQ;
        }else
        {
            echo $theQuery;
        }
    }

    }
?>