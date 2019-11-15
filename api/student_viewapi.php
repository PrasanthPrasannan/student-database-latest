<?php

include '../html/dbcon.php';

session_start();

$Sid=$_SESSION['student_id'];

$sql="SELECT * FROM `student_details` where Id=$Sid";

$result=$connection->query($sql);


if($result->num_rows>0){

  echo "<div class='container border'> <div class='row'> <div class='col-md-12'>";
  echo "<h1 style='text-align:center; font-size:18px;'>Student Details</h1>";
  echo "<form method='POST'> <table class='table'>";

  while($row=$result->fetch_assoc()){

    $name=$row['name'];
    $admno=$row['admno'];
    $rollno=$row['rollno'];
    $college=$row['college'];
    $mobile=$row['mobile'];
    $email=$row['email'];
    $username=$row['username'];

    echo "<tr><td>Name</td><td><input type='text' class='form-control' id='names' value='$name'></td></tr>";
    echo "<tr><td>Admission Number</td><td><input type='text' class='form-control' id='admnos' value='$admno'></td></tr>";
    echo "<tr><td>Roll Number</td><td><input type='text' class='form-control' id='rollnos' value='$rollno'></td></tr>"; 
    echo "<tr><td>College</td><td><input type='text' class='form-control' id='colleges' value='$college'></td></tr>";
    echo "<tr><td>Mobile</td><td><input type='text' class='form-control' id='mobiles' value='$mobile'></td></tr>";
    echo "<tr><td>E mail</td><td><input type='text' class='form-control' id='colleges' value='$email'></td></tr>";
    echo "<tr><td>User Name</td><td><input type='text' class='form-control' id='usernames' value='$username'></td></tr>";

    
}

echo "</table> </form>";
    echo "</div> </div> </div>";

}

else{

  echo "<script>alert('Invalid Credential')</script>";
}


?>


