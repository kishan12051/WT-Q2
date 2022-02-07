<?php
include 'db.php';
include 'menu.php';
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
        <div class="container1">
    <form>
        <table cellpadding="8px">
            <tr>
                <td>
                    <select name="name" id="">
                    <option value="">Select Name</option>
                    <?php
                        $sqlName = "select name from stud_master";
                        $resName = mysqli_query($con, $sqlName);
                        if(mysqli_num_rows($resName) > 0){
                            while($rowNames = mysqli_fetch_assoc($resName)){
                                ?>
                                    <option value="<?php echo $rowNames['name']; ?>"><?php echo $rowNames['name']; ?></option>;
                                <?php
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="course" id="">
                        <option selected>Select Course</option>
                        <option value="Mca">MCA</option>
                        <option value="Msc-IT">MSC-IT</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="semester" id="">
                        <option selected>Select Semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="btn" type="submit" value="Search" name="search">
                </td>
            </tr>
        </table>
    </form>
    </div>

    <br><br>

    <table border="1" cellpadding="5px">
	<tr>
		<th>ID</th>
		<th>Student Name</th>
		<th>Course</th>
		<th>Contact</th>
		<th>Gender</th>
		<th>Email ID</th>
		<th>Password</th>
		<th>Profile Picture</th>
		<th>Status</th>
		<th>Edit</th>
	</tr>
		<?php 
            if(isset($_REQUEST['search'])){
                $name = $_REQUEST['name'];
                $course = $_REQUEST['course'];
                $sem = $_REQUEST['semester'];

                $select="select * from stud_master where name='$name' or course='$course' or semester='$sem'";
                $ex=mysqli_query($con, $select);
                while($rec=mysqli_fetch_array($ex)){
                    
                ?>
                <tr>
                    <td><?php echo $rec['id'] ?></td>
                    <td><?php echo $rec['name'] ?></td>
                    <td><?php echo $rec['course'] ?></td>
                    <td><?php echo $rec ['contact'] ?></td>
                    <td><?php echo $rec ['gender'] ?></td>
                    <td><?php echo $rec ['email_id'] ?></td>
                    <td><?php echo $rec ['password'] ?></td>
                    <td><img src = "img/<?php echo $rec['profile_pic']?>" style="width:100px; height:100px;"></td>
                    <td><a href="status.php?id=<?php echo $rec['id']; ?>"><?php echo $rec ['status'] ?></a></td>
                    <td><a href="registerupdate.php?id=<?php echo $rec['id']; ?>">edit</a></td>
                </tr>
                <?php }
            }
		?>

	</table>
    </center>
</body>
</html>