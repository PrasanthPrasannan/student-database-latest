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

$.ajax({

type:'GET',
url:'../api/editprofileapi.php',
success:function(response){

    $("#Student").html(response);
    console.log(response);
   
}


})

})

</script>
<div id="Student">

</div>

