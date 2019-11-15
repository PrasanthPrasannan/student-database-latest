<?php

include '../html/dbcon.php';

session_start();

$Sid=$_SESSION['student_id'];

if(isset($_POST['names'])){

    $name=$_POST['names'];
    $admno=$_POST['admnos'];
    $rollno=$_POST['rollnos'];
    $college=$_POST['colleges'];
    $email=$_POST['emails'];
    $username=$_POST['usernames'];

  $sql="UPDATE `student_details` SET `name`='$name',`admno`=$admno,`rollno`=$rollno,`college`='$college',`email`='$email',`username`='$username' WHERE `Id`='$Sid'";

 $result=$connection->query($sql);

 $r=array();

if($result===TRUE){

    $r["Status"]="Data Updated";

}
else{

    $r["Status"]="Data Updation Failed";

}
echo json_encode($r);
}
else{

    echo "Invalid Data";
}