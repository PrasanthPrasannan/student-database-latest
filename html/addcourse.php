<?php
include 'navbar.php';
?>

<script>
$(document).ready(function(){
$("#submit").click(function(){

    console.log("Test");

    var coursename=$("#coursename").val();
    var duration=$("#duration").val();
    var fees=$("#fees").val();

    console.log(coursename);
    console.log(duration);
    console.log(fees);

    $.ajax({

    type:'POST',
    url:'../api/addcourseapi.php',
    data:{coursename:coursename,duration:duration,fees:fees},
    success:function(response){

    var res=JSON.parse(response);
    var result=res.Status;

    if(result=="Course Added Successfully"){

        alert("Course Added Successfully");
        
        window.location.href='addcourse.php';
    }
    else{
        alert("Course Adding Failed");
    }
   

    console.log(response);

}

    }) 
})


})
</script>

<div class="container border">
<div class="row">
</div>
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">COURSE ADD</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Course Name
</td>
<td>
<input type="text" class="form-control" id="coursename">
</td>
</tr>
<tr>
<td>
Duration
</td>
<td>
<input type="number" class="form-control" id="duration">
</td>
</tr>
<tr>
<td>
Fees
</td>
<td>
<input type="number" class="form-control" id="fees">
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