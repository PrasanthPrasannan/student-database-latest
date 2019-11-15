<?php
include 'navbar.php';

?>

<script>
$(document).ready(function(){

$.ajax({

type:'GET',
url:'../api/viewallstudentapi.php',
success:function(response){

    console.log(response);
    $("#student").html(response);
}

})

})

</script>
<div id="student">
</div>

