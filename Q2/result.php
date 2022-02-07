<?php
    include 'db.php';
    session_start();
    $name = $_SESSION["name"];

    $sql = "select * from stud_master where name='$name'";
    $res = mysqli_query($con, $sql);
    if($res){
        $row = mysqli_fetch_assoc($res);
        $id = $row["id"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "menu1.php";
?>
    <center>
    <img src="img/<?php echo $row['profile_pic'];?>" style="width:100px; height:100px;border-radius:45px;">
        <table border="1" cellpadding="5px">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Sub 1</th>
                <th>Sub 2</th>
                <th>Sub 3</th>
                <th>Sub 4</th>
                <th>Sub 5</th>
                <th>Total</th>
                <th>Percentage</th>
                <th>Class</th>
                <th>Result</th>
            </tr>
            <?php
                $sql1 = "select * from stud_result where stud_id='$id'";
                $res1 = mysqli_query($con, $sql1);
                if($res1) {
                    while($row1 = mysqli_fetch_assoc($res1)){
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["course"]; ?></td>
                                <td><?php echo $row1["semester"]; ?></td>
                                <td><?php echo $row1["sub_1"]; ?></td>
                                <td><?php echo $row1["sub_2"]; ?></td>
                                <td><?php echo $row1["sub_3"]; ?></td>
                                <td><?php echo $row1["sub_4"]; ?></td>
                                <td><?php echo $row1["sub_5"]; ?></td>
                                <td><?php echo $row1["total"]; ?></td>
                                <td><?php echo $row1["percentage"]; ?></td>
                                <td><?php echo $row1["class"]; ?></td>
                                <td><?php echo $row1["result"]; ?></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </center>
</body>
</html>