<?php

session_start();

$Sid=$_SESSION['student_id'];

if(isset($_POST['currentpwd'])){

$currentpwd=$_POST['currentpwd'];
$changepwd=$_POST['changepwd'];
$confirmpwd=$_POST['confirmpwd'];

$hash_currentpwd=md5($currentpwd);
$hash_changepwd=md5($changepwd);
$hash_confirmpwd=md5($confirmpwd);

$sql="SELECT * FROM `student_details` WHERE `Id`=$Sid";

$result=$connection->query($sql);

if($result->num_rows>0){

    while($row=$result->fetch_assoc()){

        $password=$row['password'];

        if($password===$hash_currentpwd){

       if($hash_changepwd===$hash_confirmpwd){

        $sql1="UPDATE `student_details` SET `password`='$hash_conformpwd' WHERE `Id`=$Sid";

        $result1=$connection->query($sql);

        if($result1===TRUE){

            $r['Status']='Password Changed Successfully';


        }
        else{

            $r['Status']='Password Changing Failed';
        }

       }
       else{

        echo "<script>alert('Current Password is Invalid') </script>";

       }
        }
        else{


        }
    }
    else{

        echo "<script>alert('Invalid credentials')</script>";

    }
}
echo json_encode($r);
else{
    echo "Invalid Data";
}
}

?>