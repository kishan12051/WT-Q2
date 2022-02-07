<?php
include 'db.php';
include 'menu.php';

if(isset($_REQUEST['submit'])) {
	$sql="select * from stud_master where id= ".$_REQUEST['id']."";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);

	$sql = "update stud_master set name='" . $_REQUEST['name'] . "', course='" . $_REQUEST['course'] . "', contact='" . $_REQUEST['contact'] . "',gender='" . $_REQUEST['gender'] . "', email_id='" . $_REQUEST['email_id'] . "', status='" . $_REQUEST['status'] . "' WHERE id ='" . $_REQUEST['id'] . "'";
  
	$update = mysqli_query($con, $sql);
	
	if($update){
		header("Location:student_register.php");
	}
}

$sql1 = "select * from stud_master where id = ".$_REQUEST['id']."";
$res1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($res1);
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
		<h2>Student Registration</h2>
		<div class="container1">
		<form  method='post' enctype="multipart/form-data">
			<table class="inputs" cellpadding="8px">
				<tr>
					<td>Student Name:</td>
					<td><input type = "text" value="<?php echo $row1['name']?>" name ="name"></td>
				</tr>
				<tr>
					<td>Course:</td>
					<td><select value="<?php echo $row1['course']; ?>" name = "course">
							<?php if($row1){
								?><option defalut><?php echo $row1['course']; ?></option><?php
							} ?>
							<option>Mca</option>
							<option>Msc-IT</option>
						</select></td>
				</tr>
				<tr>
					<td>Contact:</td>
					<td><input type="text" value="<?php echo $row1['contact']?>" name ="contact"></td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td>
						<input type="radio" <?php
							$gender = $row1['gender'];

							if($gender == "m"){
								?>checked<?php
							}
						?> id="male" name="gender" value="male">
						<span class="rd">Male</span>
						<input type="radio" <?php
							$gender = $row1['gender'];

							if($gender == "f"){
								?>checked<?php
							}
						?> id="female" name="gender" value="female">
						<span class="rd">Female</span>
					</td>
				</tr>
				<tr>
					<td>Email ID:</td>
					<td><input type="email" value="<?php echo $row1['email_id']?>" name ="email_id"></td>
				</tr>
				<!-- <tr>
					<td>Status:</td>
					<td>
						<input type="radio" <?php
							$status = $row1['status'];

							if($status == "active"){
								?>checked<?php
							}
						?> id="active" name="status" value="active">Active

						<input type="radio" <?php
							$status = $row1['status'];

							if($status == "deactive"){
								?>checked<?php
							}
						?> id="deactive"  name="status" value="deactive">Deactive
					</td>
				</tr> -->
				<tr>
					<td colspan="2" align="center"><input class="btn" type="submit" value="Update" name="submit"></td>
				</tr>
			</table>
		</form>
		</div>
		</center>
	</body>
</html>


