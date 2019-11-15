<?php

include '../html/dbcon.php';

if(isset($_POST['admnos'])){

$admnos=$_POST['admnos'];


$sql="DELETE FROM `student_details` WHERE `admno`=$admnos";

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