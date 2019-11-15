<?php
include 'navbar.php';
?>

<script>
$(document).ready(function(){
$("#submit").click(function(){

console.log("Test");

var student=$("#student").val();
var coursename=$("coursename").val();

console.log(student);
console.log(coursename);

$.ajax({

type:'POST',
url:'',
data:{student:studentcoursename:coursename},
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
<h1 style="text-align:center; font-size:28px;">COURSE SEARCH</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Select Student
</td>
<?php

include 'dbcon.php';

$sql="SELECT `Id`, `name`, `admno` FROM `student_details`";

$result=$connection->query($sql);

echo "<td>

<select name='student' class='form-control'>";

if($result->num_rows>0){

    while($row=$result->fetch_assoc()){

        $student_id=$row['Id'];
        $student_name=$row['name'];

       echo " <option value='$student_id'>$student_name</option>";


    }

    echo "</td>";

}

?>
<!-- <td>
<select name="student" class="form-control">
<option value="prasanth">prasanth</option>
</select>
</td> -->
</tr>
<tr>
<td>
Select Course
</td>
<?php

include 'dbcon.php';

$sql="SELECT `Id`, `coursename` FROM `course`";

$result=$connection->query($sql);

if($result->num_rows>0){
echo "<td>
    <select name='course' class='form-control'>";

while($row=$result->fetch_assoc()){

    $course_id=$row['Id'];
    $coursename=$row['coursename'];

    echo " <option value=$course_id>$coursename</option>";

}
echo "</td>";
}

?>
<!-- <td>
<select name="course" class="form-control">
<option value="BTech CS">BTech CS</option>
</select>
</td> -->
</tr>
<tr>
<td>
</td>
<td>
<button type='submit' class="btn btn-success" name="submit">ISSUE</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>

<?php

if(isset($_POST['submit'])){

$student=$_POST["student"];
$course=$_POST["course"];


$sql="INSERT INTO `couse_issue`(`student_id`, `course_id`) VALUES ('$student','$course')";

$result=$connection->query($sql);

if($result===TRUE){

    
    echo "<script>alert('Course Issued Successfully')</script>";

}
else{

    echo "<script>alert('Course Issued Failed')</script>";
}

}
else{

    echo "Invalid Data";
}


?>