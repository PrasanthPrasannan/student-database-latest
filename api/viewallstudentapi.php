<?php
include '../html/dbcon.php';
?>

<?php


$sql="SELECT  `name`, `admno`, `rollno`, `college`, `mobile`, `email`, `username` FROM `student_details`";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<form method='POST'> <table class='table'>";
    echo "<tr><th>Name</th><th>Admission Number</th><th>Roll Number</th><th>College</th><th>Mobile</th><th>Email</th><th>Username</th></tr>";


    while($row=$result->fetch_assoc()){

        $name=$row['name'];
        $admno=$row['admno'];
        $rollno=$row['rollno'];
        $college=$row['college'];
        $mobile=$row['mobile'];
        $email=$row['email'];
        $username=$row['username'];

        echo "<tr><td>$name</td><td>$admno</td><td>$rollno</td><td>$college</td><td>$mobile</td><td>$email</td><td>$username</td></tr>";


    }

    echo "</table> </form>";
}
else{

    echo "Invalid Data";
}

?>