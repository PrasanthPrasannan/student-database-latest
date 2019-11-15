<?php

include 'navbar.php';

?>

<script>

$(document).ready(function(){

$.ajax({

type:'GET',
url:'../api/viewallcoursesapi.php',
success:function(response){

    console.log(response);
    
    $("#course").html(response);
}

})

})

</script>
<div id="course">
</div>



