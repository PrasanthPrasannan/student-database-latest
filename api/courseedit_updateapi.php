<?php

include '../html/dbcon.php';
?>
<?php

if(isset($_POST['course_name'])){

        $course_names=$_POST['course_name'];
        $durations=$_POST['durations'];
        $fee=$_POST['fee'];
       

        $sql="UPDATE `course` SET `coursename`='$course_names',`duration`=$durations,`fees`=$fee WHERE `coursename`='$course_names'";

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