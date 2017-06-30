<?php
include_once'../User.php';
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
        case  'pollrAdd':
            $Auth = new Auth();
            echo $Auth->pollrAdd();
            break;
        case 'voteCaster':
            $Auth = new Auth();
            echo $Auth->voteCaster();
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
        $theemailaddr = $_POST['theemailaddr'];
        $thepassword = $_POST['thepassword'];
        $thesex = $_POST['thesex'];
        $encpass = md5($thepassword);

        $today = date('YmdHi');
        $startDate = date('YmdHi', strtotime('2017-06-28 09:06:00'));
        $range = $today - $startDate;
        $rand = mt_rand(0, $range);
        $genRand = ($startDate + $rand);

        $user = new User();

        // Insert or update user data to the database
        $websiteUserData = array(
            'oauth_provider'=> 'Website',
            'oauth_uid' 	=> $genRand,
            'first_name' 	=> $thefirstname,
            'last_name' 	=> $thelastname,
            'email' 		=> $theemailaddr,
            'passwordenc'   => $encpass,
            'gender' 		=> $thesex,
            'locale' 		=> '',
            'picture' 		=> '',
            'link' 			=> ''
        );
        $userData = $user->checkUser($websiteUserData);

        // Put user data into session
        $_SESSION['userData'] = $userData;
        $mainQuery = $user->checkUser();
        echo $mainQuery;
        
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

    function  pollrAdd(){
        $thetitle = $_POST['theTitle'];
        $thefirstchoice = $_POST['firstchoice'];
        $thesecChoice = $_POST['secChoice'];
        $thirdchoice = $_POST['thirdchoice'];
        $fourthChoice = $_POST['fourthcchoice'];
        $user_id = $_POST['userid'];
        $time_keeper = date("Y-m-d h:i:sa");
        $insertQuery = "INSERT INTO  posttbl SET userid='$user_id',post_title='$thetitle',option1='$thefirstchoice',option2='$thesecChoice',option3='$thirdchoice',option4='$fourthChoice',category='0',approve='1',created_by='$user_id',update_by='0',created_on='$time_keeper',updated_on=''";
        $runQuery = mysqli_query($this->db,$insertQuery);

        if ($runQuery){
            echo "worked";
        }else{
            echo $insertQuery;
        }
    }

    function voteCaster(){
        $theChoice = $_POST['choice'];
        $postId = $_POST['postId'];
        $userIdn = $_POST['userIdn'];
        $time_keeper = date("Y-m-d h:i:sa");
        $insertQuery = "INSERT INTO vote SET postid='$postId',voterid='$userIdn',optionpicked='$theChoice',created_on='$time_keeper',updated_on='',created_by='$userIdn',updated_by='0'";
        $runQuery = mysqli_query($this->db,$insertQuery);
        if ($runQuery){
            echo "worked";
        }else{
            echo $insertQuery;
        }
    }

}

?>
