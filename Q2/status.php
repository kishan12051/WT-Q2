<?php
include 'db.php';
include 'menu.php';

$id = $_REQUEST['id'];

$sql = "select * from stud_master where id='$id'";
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);
    $status = $row['status'];

    if($status == 'active'){
        $sql1 = "update stud_master set status='deactive' where id='$id'";
        $res1 = mysqli_query($con, $sql1);
        if($res1){
            header("Location:student_register.php");
        }
    }elseif($status == 'deactive'){
        $sql1 = "update stud_master set status='active' where id='$id'";
        $res1 = mysqli_query($con, $sql1);
        if($res1){
            header("Location:student_register.php");
        }
    }
}
?>