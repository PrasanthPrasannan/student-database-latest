<?php

session_start();

if(!isset($_SESSION['student_id'])){

header('Location:student.php');

}

?>

<?php
include 'student_navbar.php';
?>
<script>
$(document).ready(function(){
 console.log("Test");

 $.ajax({

type:'POST',
url:'../api/student_viewapi.php',
success:function(response){

  console.log(response);
  $("#student").html(response);
}

 })

})


</script>

<div id="student">
</div>