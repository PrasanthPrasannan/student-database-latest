<?php

include 'navbar.php';

?>
<script>
$(document).ready(function(){
$("#submit").click(function(){

 console.log("Test");

 var admno=$("#admno").val();


 $.ajax({

type:'POST',
url:'../api/studentsearchapi.php',
data:{admno:admno},
success:function(response){

console.log(response);
$("#studentdetails").html(response);

}

 })


})


})


</script>

<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">STUDENT SEARCH</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Admission Number
</td>
<td>
<input type="text" class="form-control" id="admno">
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
<div id="studentdetails">
</div>
</div>
</div>
</div>  
</body>
</html>

