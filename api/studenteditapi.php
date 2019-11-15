<?php

include '../html/dbcon.php';

if(isset($_POST['admno'])){


$admno=$_POST["admno"];

$sql="SELECT `name`, `admno`, `rollno`, `college`, `mobile`, `email`, `username` FROM `student_details` WHERE `admno`=$admno";


$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<form method='POST'><table class='table'>";

    while($row=$result->fetch_assoc()){

        $name=$row['name'];
        $admno=$row['admno'];
        $rollno=$row['rollno'];
        $college=$row['college'];
        $mobile=$row['mobile'];
        $email=$row['email'];
        $username=$row['username'];
       
        echo "<tr><td>Admission Number</td><td><input type='text' class='form-control' id='admnos' value='$admno'></td></tr>";
        echo "<tr><td>Name</td><td><input type='text' class='form-control' id='names' value='$name'></td></tr>";
        echo "<tr><td>Roll Number</td><td><input type='text' class='form-control' id='rollnos' value='$rollno'></td></tr>";
        echo "<tr><td>College</td><td><input type='text' class='form-control' id='colleges' value='$college'></td></tr>";
        echo "<tr><td>Mobile</td><td><input type='text' class='form-control' id='mobiles' value='$mobile'></td></tr>";
        echo "<tr><td>Email</td><td><input type='text' class='form-control' id='emails' value='$email'></td></tr>";
        echo "<tr><td>Username</td><td><input type='text' class='form-control' id='usernames' value='$username'></td></tr>";
        echo "<tr><td> </td><td><button type='button' class='btn btn-success' id='update'>UPDATE</button>
        <button type='button' class='btn btn-success' id='delete'>DELETE</button></td></tr>";

    }

}

echo "</table> </form>";
}

else{
    echo "Invalid Credential";
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
var mobiles=$("#mobiles").val();
var emails=$("#emails").val();
var usernames=$("#usernames").val();
 
 console.log(admnos);
 console.log(names);
 console.log(rollnos);
 console.log(colleges);
 console.log(mobiles);
 console.log(emails);
 console.log(usernames);

 $.ajax({

type:'POST',
url:'../api/studentupdateapi.php',
data:{admnos:admnos,names:names,rollnos:rollnos,colleges:colleges,mobiles:mobiles,emails:emails,usernames:usernames},
success:function(response){
 
 var res=JSON.parse(response);
 
 var result=res.Status;

  if(result=='Data Updated Successfully'){

      alert("Data Updated Successfully");
      window.location.href='studentedit.php';
  } 
  else{
      
    alert("Data Updation Failed");
  }
    console.log(response);
}

 })

})

$("#delete").click(function(){

var $admnos=$("#admnos").val();

console.log(admnos);

$.ajax({

type:'POST',
url:'../api/studenteditdeleteapi.php',
data:{admnos:admnos},
success:function(response){
    
    var res=JSON.parse(response);
    var result=res.Status;

    if(result=='Deleted Successfully'){
        
        alert("Deleted Successfully");
      window.location.href='studentedit.php';

    }
    else{
        alert("Deletion Failed");
    }

console.log(response);

}

})


})



})

</script>