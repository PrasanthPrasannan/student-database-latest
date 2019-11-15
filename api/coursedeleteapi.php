<?php

include '../html/dbcon.php';

if(isset($_POST['course_name'])){

$coursename=$_POST['course_name'];


$sql="DELETE FROM `course` WHERE `coursename`='$coursename'";

$result=$connection->query($sql);

$r=array();

if($result===TRUE){

    $r["Status"]="Deleted Successfully";

}
else{
    $r["Status"]="Deletion Failed";
  
}
 echo json_encode($r); 
}

?>