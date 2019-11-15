<?php

include '../html/dbcon.php';
?>
<?php
if(isset($_POST['coursename'])){

$coursename=$_POST["coursename"];

$sql="SELECT `coursename`, `duration`, `fees` FROM `course` WHERE `coursename`='$coursename'";

$r=array();

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<form method='POST'><table class='table'>";

    while($row=$result->fetch_assoc()){

        $coursename=$row['coursename'];
        $duration=$row['duration'];
        $fees=$row['fees'];

        echo "<tr><td>Course Name</td><td><input type='text' class='form-control' id='course_name' value='$coursename'></td></tr>";
        echo "<tr><td>Duration</td><td><input type='text' class='form-control' id='durations' value='$duration'></td></tr>";
        echo "<tr><td>Course Name</td><td><input type='text' class='form-control' id='fee' value='$fees'></td></tr>";
        echo "<tr><td></td><td><button type='button' class='btn btn-success' id='update'>UPDATE</button>
        <button type='button' class='btn btn-success' id='delete'>DELETE</button></td></tr>";


}

echo "</table> </form>";
}
else{

echo "<script>alert('Invalid Course')</script>";

}
// echo json_encode($r);
}

?>
<script>
$(document).ready(function(){
$("#update").click(function(){

 console.log("Test");

 var course_name=$("#course_name").val();
 var durations=$("#durations").val();
 var fee=$("#fee").val();

  console.log(course_name);
  console.log(durations);
  console.log(fee);


  $.ajax({

 type:'POST',
 url:'../api/courseedit_updateapi.php',
 data:{course_name:course_name,durations:durations,fee:fee},

 success:function(response){

     var res=JSON.parse(response);
     var result=res.Status;

     if(result=='Data Updated Successfully'){
        
        alert('Data Updated');
        window.location.href='courseedit.php';

     }
     else{

      alert('Data Updation Failed');
     }

     console.log(response);
 }

})

})
$("#delete").click(function(){

console.log("Test");

$course_name=$("#course_name");

console.log(course_name);

$.ajax({

type:'POST',
url:'../api/coursedeleteapi.php',
data:{course_name:course_name},
success:function(response){

    var res=JSON.parse(response);

    var result=res.Status;

    if(result=='Deleted Successfully'){
    
    alert("Deleted Successfully");

    window.location.href='courseedit.php';
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