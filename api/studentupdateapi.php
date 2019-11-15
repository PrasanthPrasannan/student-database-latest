
<?php

include '../html/dbcon.php';

if(isset($_POST['names'])){

    $names=$_POST['names'];
    $admnos=$_POST['admnos'];
    $rollnos=$_POST['rollnos'];
    $colleges=$_POST['colleges'];
    $mobiles=$_POST['mobiles'];
    $emails=$_POST['emails'];
    $usernames=$_POST['usernames'];
         
       $sql="UPDATE `student_details` SET `name`='$names',`admno`=$admnos,`rollno`=$rollnos,`college`='$colleges',`mobile`=$mobiles,`email`='$emails',`username`='$usernames' WHERE `admno`=$admnos";

        $result=$connection->query($sql);

        $r=array();

        if($result===TRUE){

            $r["Status"]="Data Updated Successfully";

        }
        else{

            $r["Status"]="Data Updation Failed";
        }

        echo json_encode($r);
}
else{
    echo "Invalid Data";
}

?>