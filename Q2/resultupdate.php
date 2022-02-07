<?php
include 'db.php';
include 'menu.php';
$id = $_GET['id'];

$sql = "select * from stud_master where id='$id'";
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);
}
$sql1 = "select * from stud_result where stud_id='$id'";
$res1 = mysqli_query($con, $sql1);
if(mysqli_num_rows($res1) > 0){
    $row1 = mysqli_fetch_assoc($res1);
}

if(isset($_REQUEST["submit"])){
    $s1 = $_REQUEST["s1"];
    $s2 = $_REQUEST["s2"];
    $s3 = $_REQUEST["s3"];
    $s4 = $_REQUEST["s4"];
    $s5 = $_REQUEST["s5"];

    $total =  $s1+$s2+$s3+$s4+$s5;

	$percentage = ($total / 500) * 100;

	if($percentage > 80){
        $class = "A";
    }else if($percentage <= 80 && $percentage > 70){
        $class = "B";
    }else if($percentage <= 70 && $percentage >= 50){
        $class = "C";
    }else {
        $class = "F";
    }
    $resultPass = "";
    if($percentage >= 35){
        $resultPass = "Pass";
    }else{
        $resultPass = "Fail";
    }

    $sql2 = "update stud_result set sub_1='$s1', sub_2='$s2', sub_3='$s3', sub_4='$s4', sub_5='$s5', total='$total', percentage='$percentage', class='$class', result='$resultPass' where stud_id='$id'";
    $res2 = mysqli_query($con, $sql2);
    if($res){
        header("Location: student_result.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css?v=1">
    <title>Document</title>
</head>
<body>
    <center>
        <div class="container">
    <form action="" method="post">
        <table class="inputs" cellpadding="8px">
            <tr>
                <td>Name :</td>
                <td><input type="text" name="name" value="<?php echo $row["name"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Course :</td>
                <td><input type="text" name="course" value="<?php echo $row["course"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Semester :</td>
                <td><input type="text" name="sem" value="<?php echo $row1["semester"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Subject 1 :</td>
                <td><input type="text" name="s1" value="<?php echo $row1["sub_1"]; ?>"></td>
            </tr>
            <tr>
                <td>Subject 2 :</td>
                <td><input type="text" name="s2" value="<?php echo $row1["sub_2"]; ?>"></td>
            </tr>
            <tr>
                <td>Subject 3 :</td>
                <td><input type="text" name="s3" value="<?php echo $row1["sub_3"]; ?>"></td>
            </tr>
            <tr>
                <td>Subject 4 :</td>
                <td><input type="text" name="s4" value="<?php echo $row1["sub_4"]; ?>"></td>
            </tr>
            <tr>
                <td>Subject 5 :</td>
                <td><input type="text" name="s5" value="<?php echo $row1["sub_5"]; ?>"></td>
            </tr>
            <tr>
                
                <td colspan="2" align="center"><input type="submit" class="btn" name="submit" value="Update"></td>
            </tr>
        </table>
    </form>
    </div>
    </center>
</body>
</html>