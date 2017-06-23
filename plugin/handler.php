<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'pollr');

if (isset($_POST['page']) && !empty($_POST['page'])) {
    $action = $_POST['page'];
    switch ($action) {
        case 'usersregister' :
            $Auth = new Auth();
            echo $Auth->usersregister();
            break;
        case 'login':
            $Auth = new Auth();
            echo $Auth->userlogin();
            break;
    }
}

class Auth {

    public $db;

    public function __construct() {
        # code...
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {

            echo "Error: Could not connect to database.";

            exit;
        }
    }

    function usersregister() {
        $thefirstname = $_POST['thefirstname'];
        $thelastname = $_POST['thelastname'];
        $theusername = $_POST['theusername'];
        $theemailaddr = $_POST['theemailaddr'];
        $thepassword = $_POST['thepassword'];
        $birthday = $_POST['birthday'];
        $birthmonth = $_POST['birthmonth'];
        $birthyear = $_POST['birthyear'];
        $thesex = $_POST['thesex'];
        $thecity = $_POST['thecity'];
        $thecountry = $_POST['thecountry'];
        $encpass = md5($thepassword);
        $time_keeper = date("Y-m-d h:i:sa");
        $occuranceQuery = "SELECT user_id FROM user_table WHERE user_name='$theusername' OR user_email='$theemailaddr'";
        $SearchQuery = mysqli_query($this->db, $occuranceQuery);
        if ($SearchQuery){
                  $searchforOccurance = mysqli_num_rows($SearchQuery);
        if($searchforOccurance > 0){
            echo "picked";
        }else{
            $insertUserQuery = "INSERT INTO user_table SET first_name='$thefirstname',last_name='$thelastname',user_name='$theusername',user_password='$encpass',"
                    . "user_dob='$birthday/$birthmonth/$birthyear',user_sex='$thesex',user_city='$thecity',user_country='$thecountry',user_email='$theemailaddr',"
                    . "created_on='$time_keeper',update_on='',created_from='Form',active='1'";
            $runtheInsertQuery = mysqli_query($this->db, $insertUserQuery);
            if($runtheInsertQuery){
                echo 'done';
            } else {
                echo $insertUserQuery;
            }
        }  
        } else {
            $occuranceQuery;
        }

            
        
    }
    
    function userlogin() {
        $userEmail = $_POST['myemail'];
        $userpass = $_POST['mypassword'];
        $encpassword = md5($userpass);
        $finduserQuery = "SELECT * FROM user_table where user_email='$userEmail' AND user_password='$encpassword'";
        $runuserSearch = mysqli_query($this->db, $finduserQuery);
        if($runuserSearch){
            if(mysqli_num_rows($runuserSearch)>0){
                $theinfo = mysqli_fetch_array($runuserSearch);
                session_start();
                $_SESSION['user_name'] = $theinfo;
                $_SESSION['user_id'] = $theinfo;
                $_SESSION['approve'] = $theinfo;
                echo 'Logged in!';
            } else {
                echo 'User Name or Password is incorrect';
            }
        } else {
            echo $finduserQuery;
        }
        
    }

}

?>
