<?php
include 'db.php';
session_start();
$msg = "";
if(isset($_REQUEST["submit"])){
	$email = $_REQUEST["email"];
	$pass = $_REQUEST["pass"];

	$sql = "select * from stud_master where email_id='$email' and password='$pass' and status='active'";
	$res = mysqli_query($con, $sql);
	if(mysqli_num_rows($res) > 0){
		$row = mysqli_fetch_assoc($res);
		$_SESSION["name"] = $row["name"];
		$femail = $row["email_id"];
		$fpass = $row["password"];

		if($femail == $email && $pass = $fpass){
			header("Location:studentdashboard.php");
		}
	}else{
		$msg = "Credentials doesn't match..!!";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css?v=1">
	<title>Document</title>
</head>
<body class="adbc">
		<form method='post' class="login-form">
		<h1>Student Login</h1>
			<table cellpadding="5px">
				<tr>
					<td>Email ID:</td>
					<td class="txtb"><input type="email" name="email"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td class="txtb"><input type="password" name="pass"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="logbtn" value="Login" name="submit"></td>
				</tr>
				<tr>
					<td></td>
					<td><?php if($msg){ ?><div class="bottom-text"><?php echo $msg; ?></div><?php } ?></td>
				</tr>
			</table>
		</form>

	</body>
</html>