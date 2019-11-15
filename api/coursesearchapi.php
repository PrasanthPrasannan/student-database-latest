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
    echo "<tr><th>Course Name</th><th>Duration</th><th>Fees</th></tr>";

    while($row=$result->fetch_assoc()){

        $coursename=$row['coursename'];
        $duration=$row['duration'];
        $fees=$row['fees'];

echo "<tr><td>$coursename</td><td>$duration</td><td>$fees</td></tr>";

}

echo "</table> </form>";
}
else{

echo "<script>alert('Invalid Course')</script>";

}

}

?>