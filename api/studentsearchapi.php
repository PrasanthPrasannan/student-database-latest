<?php

include '../html/dbcon.php';

if(isset($_POST['admno'])){


$admno=$_POST["admno"];

$sql="SELECT `name`, `admno`, `rollno`, `college`, `mobile`, `email`, `username`, `password` FROM `student_details` WHERE `admno`=$admno";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<form method='POST'><table class='table'>";

    echo "<tr><th>Name</th><th>Admission Number</th><th>Roll number</th><th>College</th><th>Mobile</th><th>Email</th><th>User Name</th></tr>";


    while($row=$result->fetch_assoc()){

        $name=$row['name'];
        $admno=$row['admno'];
        $rollno=$row['rollno'];
        $college=$row['college'];
        $mobile=$row['mobile'];
        $email=$row['email'];
        $username=$row['username'];
        $password=$row['password'];


    }
    echo "<tr><td>$name</td><td>$rollno</td><td>$admno</td><td>$college</td><td>$mobile</td><td>$email</td><td>$username</td></tr>";


}

echo "</table> </form>";
}

else{
    echo "Invalid Credential";
}

?>
