<?php

include '../html/dbcon.php';

?>
<?php

if(isset($_POST['coursename'])){

$coursename=$_POST['coursename'];
$duration=$_POST['duration'];
$fees=$_POST['fees'];

$sql="INSERT INTO `course`(`coursename`, `duration`, `fees`) VALUES ('$coursename',$duration,$fees)";

$r=array();

$result=$connection->query($sql);

if($result===TRUE){

$r["Status"]="Course Added Successfully";

}
else{

    $r["Status"]="Course Adding Failed";  
}
echo json_encode($r);

}else{

    echo "Invalid Data";
}

?>