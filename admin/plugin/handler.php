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
        case 'tablefetcher':
            $User = new User();
            echo $User->tablefetcher();
            break;
        case 'addnewcat':
            $User = new User();
            echo $User->addnewcat();
            break;
        case 'editpage':
            $User = new User();
            echo $User->editpage();
            break;
        case 'editNew':
            $User = new User();
            echo $User->editNew();
            break;
        case 'deleteFuc':
            $User = new User();
            echo $User->deleteFuc();
            break;
        case 'infodonut':
             $User = new User();
             echo $User->infodonut();
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
        $runQuery = mysqli_query($this->db, $theQuery);
        $q = mysqli_fetch_array($runQuery);
        $enQ = json_encode($q);
        if ($enQ !='') {
            echo $enQ;
        } else {
            echo $theQuery;
        }
    }

    public function addnewcat()
    {
        $cateName   =   $_POST['newcat'];
        $cateParent =   $_POST['catParent'];
        $userName   =   $_POST['userIdn'];
        $time_keeper = date("Y-m-d h:i:sa");
        if ($cateParent=='null') {
            $insertNewCatQuery1 = "INSERT INTO categories SET catname='$cateName',catparent='0',disable='0',created_by='$userName',updated_by='0',created_on='$time_keeper',updated_on=''";
            $runinsertcatQuery1  =   mysqli_query($this->db, $insertNewCatQuery1);
            if ($runinsertcatQuery1) {
                echo "worked";
            } else {
                echo $insertNewCatQuery1;
            }
        } else {
            $insertNewCatQuery = "INSERT INTO categories SET catname='$cateName',catparent='$cateParent',disable='0',created_by='$userName',updated_by='0',created_on='$time_keeper',updated_on=''";
            $runinsertcatQuery  =   mysqli_query($this->db, $insertNewCatQuery);
            if ($runinsertcatQuery) {
                echo "worked";
            } else {
                echo $insertNewCatQuery;
            }
        }
    }


    public function editpage()
    {
        $cateIdn = $_POST['cateIdn'];
        $editfetchQuery = "SELECT catid,catname,catparent FROM categories WHERE catid='$cateIdn'";
        $runfetchQ = mysqli_query($this->db, $editfetchQuery);
        $qFetch = mysqli_fetch_array($runfetchQ);
        $encjson = json_encode($qFetch);
        if ($runfetchQ) {
            echo $encjson;
        } else {
            echo $editfetchQuery;
        }
    }

    public function editNew()
    {
        $thenewId = $_POST['newId'];
        $newCat = $_POST['newCate'];
        $newcatPare = $_POST['newparent'];
        $Update = "UPDATE categories SET catname='$newCat',catparent='$newcatPare' WHERE catid='$thenewId'";
        $runQuery = mysqli_query($this->db, $Update);
        if ($runQuery) {
            echo "worked";
        } else {
            echo $Update;
        }
    }

    public function deleteFuc()
    {
        $ItemId =$_POST['itemId'];
        $tblName =$_POST['tablename'];
        $columName =$_POST['columName'];
        $deleteStat = "DELETE FROM $tblName WHERE $columName=$ItemId";
        $runQuery = mysqli_query($this->db, $deleteStat);
        if ($runQuery) {
            echo "worked";
        } else {
            echo $deleteStat;
        }
    }

    public function infodonut()
    {
        # code...
        $thepostId = $_POST['thepostid'];
        $fetchQuery = "SELECT COUNT(optionpicked) AS pickedOption FROM vote WHERE postid='$thepostId' GROUP by optionpicked,postid ORDER BY optionpicked";
        $runQuery = mysqli_query($this->db, $fetchQuery);
        $data = array();
        while ($fetcher = mysqli_fetch_array($runQuery)) {
            $data[] = $fetcher['pickedOption'];
        }
             $encjson = json_encode(array("response"=>$data));
            echo $encjson;
    }
}
