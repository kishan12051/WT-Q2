<?php
include 'db.php';
include 'menu.php';


if(isset($_REQUEST['submit'])){
	$sql = "insert into stud_master(name,course,contact,gender,email_id,password,profile_pic,status, semester) 
	values ('".$_REQUEST['stud_name']."', '".$_REQUEST['course']."','".$_REQUEST['contact']."', '".$_REQUEST['gender']."', '".$_REQUEST['email_id']."', '".$_REQUEST['password']."', '".$_FILES["img"]["name"]."', 'active', '".$_REQUEST['semester']."')";

	$res = mysqli_query($con, $sql);

	if($res){
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["img"]["name"]);
		if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
			header("Location:student_register.php");
		  } else {
			echo "Something went wrong.";
		  }
		
	} else{
		echo "something went wrong1";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleform.css?v=2">
	<title>Document</title>
</head>
<body>
	<center>
	<h2>Student Registration</h2>

	<div class="container">
	<form  method='post' enctype="multipart/form-data">
		<table cellpadding="8px">
			<tr class="inputs">
				<td>Student Name:</td>
				<td><input type="text" name="stud_name"></td>
			</tr>
			<tr class="inputs">
				<td>Contact:</td>
				<td><input type="text" maxlength="10" name="contact"></td>
			</tr>
			<tr class="inputs">
				<td>Gender:</td>
				<td>
					<input type="radio" id="male" name="gender" value="male">
					<span class="rd">Male</span>
					<input type="radio" id="female" name="gender" value="female">
					<span class="rd">Female</span>
				</td>
			</tr>
			<tr class="inputs">
				<td>Course:</td>
				<td><select name="course">
						<option selected>Select Course</option>
						<option>Mca</option>
						<option>Msc-IT</option>
					</select>
				</td>
			</tr>
			<tr class="inputs">
				<td>Semester:</td>
				<td><select name="semester">
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
			<tr class="inputs">
				<td>Email ID:</td>
				<td><input type="email" name="email_id"></td>
			</tr>
			<tr class="inputs">
				<td>Password:</td>
				<td><input type="text" name="password" value="<?php
					function password_generate($chars) 
					{
						$random = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
						return substr(str_shuffle($random), 0, $chars);  //three parameters (string,start,length)
					}
					echo password_generate(6)."\n";
					?>">
				</td>
			</tr>
			<tr class="inputs">
				<td>Profile Picture:</td>
				<td><input class="file" type="file" id="img" name="img" accept="image/*"></td>
				
			</tr>
			<!-- <tr class="inputs">
				<td>Status:</td>
				<td>
					<input type="radio" id="active" name="status" value="active">
					<span class="rd">Active</span>
					<input type="radio" id="deactive" name="status" value="deactive">
					<span class="rd">Deactive</span>
				</td>
			</tr> -->
			<tr class="inputs">
				<td><input class="btnr" type="reset"></td>
				<td><input class="btn" type="submit" value="Register" name="submit"></td>
			</tr>
		</table>
	</form>
	</div>
				
	<table border="1" cellpadding="5px">
	<tr>
		<th>ID</th>
		<th>Student Name</th>
		<th>Course</th>
		<th>Semester</th>
		<th>Contact</th>
		<th>Gender</th>
		<th>Email ID</th>
		<!-- <th>Password</th> -->
		<th>Profile Picture</th>
		<th>Status</th>
		<th>Edit</th>
	</tr>
		<?php 
			$select='select * from stud_master';
			$ex=mysqli_query($con, $select);
			while($rec=mysqli_fetch_array($ex)){
				
			?>
			<tr>
				<td><?php echo $rec['id'] ?></td>
				<td><?php echo $rec['name'] ?></td>
				<td><?php echo $rec['course'] ?></td>
				<td><?php echo $rec['semester'] ?></td>
				<td><?php echo $rec ['contact'] ?></td>
				<td><?php echo $rec ['gender'] ?></td>
				<td><?php echo $rec ['email_id'] ?></td>
				<!-- <td><?php echo $rec ['password'] ?></td> -->
				<td><img src = "img/<?php echo $rec['profile_pic']?>" style="width:100px; height:100px;"></td>
				<td><a href="status.php?id=<?php echo $rec['id']; ?>"><?php echo $rec ['status'] ?></a></td>
				<td><a href="registerupdate.php?id=<?php echo $rec['id']; ?>">edit</a></td>
			</tr>
			<?php } ?>

	</table>
	</center>
</body>
</html>