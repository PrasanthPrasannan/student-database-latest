<?php
include 'navbar.php';

?>
<?php

include 'dbcon.php';

?>
<script>
$(document).ready(function(){
$("#submit").click(function(){

console.log("Test");

var name=$("#name").val();
var admno=$("#admno").val();
var rollno=$("#rollno").val();
var college=$("#college").val();
var mobile=$("#mobile").val();
var email=$("#email").val();
var username=$("#username").val();
var password=$("#password").val();

console.log(name);
console.log(admno);
console.log(rollno);
console.log(college);
console.log(mobile);
console.log(email);
console.log(username);
console.log(password);


$.ajax({

type:'POST',
url:'../api/studentaddapi.php',
data:{name:name,admno:admno,rollno:rollno,college:college,mobile:mobile,email:email,username:username,password:password},
success:function(response){

    var res=JSON.parse(response);

    var result=res.Status;

    if(result=="Data Inserted Successfully"){

        alert("Data Inserted Successfully");
        window.location.href='student_add.php';

    }
    else{
        alert("Data Insertion Failed");
    }

    console.log(response);
}


})
})
})

</script>
<div class="container border">
<div class="row">
<div class="col-md-12 studentadd">
<h1 style="text-align:center; font-size:28px;">STUDENT ADD</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Name
</td>
<td>
<input type="text" class="form-control" id="name">
</td>
</tr>
<tr>
<td>
Admission Number
</td>
<td>
<input type="number" class="form-control" id="admno">
</td>
</tr>
<tr>
<td>
Roll Number
</td>
<td>
<input type="number" class="form-control" id="rollno">
</td>
</tr>
<tr>
<td>
College
</td>
<td>
<input type="text" class="form-control" id="college">
</td>
</tr>
<tr>
<td>
Mobile 
</td>
<td>
<input type="number" class="form-control" id="mobile">    
</td>
</tr>
<tr>
<td>
E mail 
</td>
<td>
<input type="text" class="form-control" id="email">    
</td>
</tr>
<tr>
<td>
User Name
</td>
<td>
<input type="text" class="form-control" id="username">
</td>
</tr>
<tr>
<td>
Password
</td>
<td>
<input type="password" class="form-control" id="password">
</td>
</tr>
<tr>
<td></td>
<td>
<button type="button" class="btn btn-success" id="submit">SUBMIT</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>    
</body>
</html>