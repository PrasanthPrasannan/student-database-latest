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
    $email=$row['email'];
    $username=$row['username'];

    echo "<tr><td>Name</td><td><input type='text' class='form-control' id='names' value='$name'></td></tr>";
    echo "<tr><td>Admission Number</td><td><input type='text' class='form-control' id='admnos' value='$admno'></td></tr>";
    echo "<tr><td>Roll Number</td><td><input type='text' class='form-control' id='rollnos' value='$rollno'></td></tr>"; 
    echo "<tr><td>College</td><td><input type='text' class='form-control' id='colleges' value='$college'></td></tr>"; 
    echo "<tr><td>E-mail</td><td><input type='text' class='form-control' id='emails' value='$email'></td></tr>";
    echo "<tr><td>User Name</td><td><input type='text' class='form-control' id='usernames' value='$username'></td></tr>";
    echo "<tr><td></td><td><button type='button' class='btn btn-success' id='update'>UPDATE</button>
    <button type='button' class='btn btn-success' id='delete'>DELETE</button></td></tr>";
    
    
}

echo "</table> </form>";
    echo "</div> </div> </div>";

}

else{

  echo "<script>alert('Invalid Credential')</script>";
}


?>
<script>

$(document).ready(function(){
$("#update").click(function(){

console.log("Test");

var admnos=$("#admnos").val();
var names=$("#names").val();
var rollnos=$("#rollnos").val();
var colleges=$("#colleges").val();
var emails=$("#emails").val();
var usernames=$("#usernames").val();

console.log(names);
console.log(rollnos);
console.log(admnos);
console.log(colleges);
console.log(emails);
console.log(usernames);

$.ajax({

type:'POST',
url:'../api/editupdateprofileapi.php',
data:{names:names,rollnos:rollnos,admnos:admnos,colleges:colleges,emails:emails,usernames:usernames},
success:function(response){

  var res=JSON.parse(response);

  var result=res.Status;

   if(result=='Data Updated'){

     alert('Data Updated Successfully');

     window.location.href='editprofile.php';
   } 
   else{

    alert('Data Updation Failed');
   
   }
console.log(response);

}

})

})
$("#delete").click(function(){

console.log("Test");
var admnos=$("#admnos").val();

console.log(admnos);

$.ajax({

type:'POST',
url:'../api/editdeleteprofileapi.php',
data:{admnos:admnos},
success:function(response){

  var res=JSON.parse(response);
  
  var result=res.Status;

if(result=="Data Deleted"){

   alert("Data Updated Successfully");
   window.location.href='editprofile.php';

}
else{
 alert("Data Updation Failed");
}

console.log(response);

}

})

})

})
</script>


