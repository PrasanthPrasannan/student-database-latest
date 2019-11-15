<?php

include 'navbar.php';

?>
<script>
$(document).ready(function(){
$("#submit").click(function(){

console.log("Test");

var coursename=$("#coursename").val();

$.ajax({

  type:'POST',
  url:'../api/coursesearchapi.php',
  data:{coursename:coursename},
  success:function(response){

      console.log(response);
      $("#coursedetails").html(response);
  }  
})

})

})

</script>
<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">COURSE SEARCH</h1>
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
</td>
<td>
<button type="button" class="btn btn-success" id="submit">SUBMIT</button>
</td>
</tr>
</table>
</form>
<div id="coursedetails">
</div>
</div>
</div>
</div>  
</body>
</html>

