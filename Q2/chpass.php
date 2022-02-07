<?php
    include 'db.php';
    session_start();
    $name = $_SESSION["name"];
    $msg = "";

    if(isset($_REQUEST['submit'])){

        $sql = "select * from stud_master where name='$name'";
        $res = mysqli_query($con, $sql);
        if($res){
            $row = mysqli_fetch_assoc($res);
            $oldpass = $row['password'];
        }

        $oldPass = $_REQUEST["oldpass"];
        $newpass = $_REQUEST["newpass"];
        $confpass = $_REQUEST["confpass"];

        if($oldpass == $oldPass){
            if($newpass == $confpass){
                $sql1 = "update stud_master set password='$confpass' where name='$name'";
                $res1 = mysqli_query($con, $sql1);
                if($res1){
                    $msg = "Password Updated suceessfuly";
                }
            }else{
                $msg = "Please enter same password in new password & confirm password..!!";
            }
        }else{
            $msg = "Old Password is Wrong..!!";
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
    <?php
        include "menu1.php";
    ?>
    <center>
        <div class="container1">
        <form action="">
        <table cellpadding="8px">
            <tr>
                <td>Old Password :</td>
                <td><input type="text" name="oldpass" id=""></td>
            </tr>
            <tr>
                <td>New Password :</td>
                <td><input type="password" name="newpass" id=""></td>
            </tr>
            <tr>
                <td>Confirm Password :</td>
                <td><input type="password" name="confpass" id=""></td>
            </tr>
            <tr>
                <!-- <td></td> -->
                <td colspan="2" align="center"><input type="submit" value="Change" class="btn" name="submit"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><?php if($msg) { echo $msg; } ?></td>
            </tr>
        </table>
        </form>
        </div>
    </center>
</body>
</html>