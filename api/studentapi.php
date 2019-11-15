<?php

session_start();

include '../html/dbcon.php';

if(isset($_POST['username'])){

  $username=$_POST["username"];
  $password=$_POST["password"];

  $hash=md5($password);

   $sql="SELECT `Id`, `name`, `admno`, `rollno`, `college`, `mobile`, `email`, `username`, `password` FROM `student_details` WHERE `username`='$username' and `password`='$hash'";

  $result=$connection->query($sql);

  $r=array();

  if($result->num_rows>0){

    while($row=$result->fetch_assoc()){

      $id=$row['Id'];
      
      $_SESSION['studentlogin']=true;

      $_SESSION['student_id']=$id;


     $r['status']="success";

    }
  }
  else{


    $r['status']="Invalid Username Or Password";

  }


  echo json_encode($r);


}


?>