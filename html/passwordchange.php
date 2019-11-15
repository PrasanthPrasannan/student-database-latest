<?php
include 'student_navbar.php';
?>

<script>
$(document).ready(function(){
$("#submit").click(function(){

console.log("Test");

var currentpwd=$("#currentpwd").val();
var changepwd=$("#changepwd").val();
var confirmpwd=$("#confirmpwd").val();

console.log(currentpwd);
console.log(changepwd);
console.log(confirmpwd);


$.ajax({

type:'POST',
url:'../api/passwordchangeapi.php',
data:{currentpwd:currentpwd,changepwd:changepwd,confirmpwd:confirmpwd},
success:function(response){

    console.log(response);
}

})

})


})

</script>

<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">CHANGE PASSWORD</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Current Password
</td>
<td>
<input type="password" class="form-control" id="currentpwd">
</td>
</tr>
<tr>
<td>
Change Password
</td>
<td>
<input type="password" class="form-control" id="changepwd">
</td>
</tr>
<tr>
<td>
Confirm Password
</td>
<td>
<input type="password" class="form-control" id="confirmpwd">
</td>
</tr>
<tr>
<td>
</td>
<td>
<button type="button" class="btn btn-success" id="submit">SUBMIT</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>