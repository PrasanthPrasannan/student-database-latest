<?php

include '../html/dbcon.php';


if(isset($_POST['name'])){

    $name=$_POST['name'];
    $admno=$_POST['admno'];
    $rollno=$_POST['rollno'];
    $college=$_POST['college'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $hash=md5($password);

    $sql="INSERT INTO `student_details`(`name`, `admno`, `rollno`, `college`, `mobile`, `email`, `username`, `password`) VALUES ('$name',$admno,$rollno,'$college',$mobile,'$email','$username','$hash')";

    $result=$connection->query($sql);

    $r=array();

    if($result===TRUE){


        $r["Status"]="Data Inserted Successfully";

       
    }
    else{

        $r["Status"]="Data Insertion Failed";
    }
 
    echo json_encode($r);
}
else{

    echo "Invalid Data";
}


?>