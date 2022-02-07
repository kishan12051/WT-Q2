<?php
include 'db.php';
include 'menu.php';
$course = "";
$studId = "";
if(isset($_GET["stud_id"]) && !isset($_GET["action"])){
	$studId = $_GET["stud_id"];
	$query = "select * from stud_master where id='$studId'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	$course = $row["course"];

if(isset($_REQUEST['ressubmit'])){

	$total =  $_REQUEST['sub1'] + $_REQUEST['sub2'] + $_REQUEST['sub3'] + $_REQUEST['sub4'] + $_REQUEST['sub5'];

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

	$sem = $_REQUEST["sem"];
	$sub1 = $_REQUEST["sub1"];
	$sub2 = $_REQUEST["sub2"];
	$sub3 = $_REQUEST["sub3"];
	$sub4 = $_REQUEST["sub4"];
	$sub5 = $_REQUEST["sub5"];

	$sql = "insert into stud_result (stud_id, semester, sub_1, sub_2, sub_3, sub_4, sub_5, total, percentage, class, result) VALUES ('$studId', '$sem', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', '$total', '$percentage', '$class', '$resultPass')";
	$resins = mysqli_query($con, $sql);
	if($resins){
		echo "Records inserted successfully.";
		header("Location:student_result.php");
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
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
		<h2>Student Registration</h2>
		<div class="container">
		<form method='post'>
			<table class="inputs" cellpadding="8px">
				<tr>
					<td>Student Name:</td>
					<td><select id="name" name="name">
							<option>Select Name</option>
							<?php
								$sels = "select * from stud_master";
								$ers = mysqli_query($con,$sels);
								while($records = mysqli_fetch_array($ers)){
							?>
							<option value='<?php echo $records['id']; ?>' <?php echo $records['id'] == $studId ? "selected":"" ?> ><?php echo $records['name']; ?></option>

							<?php 
							}  
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Course:</td>
					<td><input type="text" name="course" id="course" value="<?php
						echo $course != ""?$course:"Please select student!";
					?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Semester:</td>
					<td><select name ="sem">
							<option selected>Select Semester</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Subjects:</td>
					<td></td>
				</tr>
				<tr>
					<td>Sub 1:</td>
					<td><input type="number" name="sub1"></td>
				</tr>
				<tr>
					<td>Sub 2:</td>
 					<td><input type="number" name="sub2"></td>
				</tr>
				<tr>
					<td>Sub 3:</td>
					<td><input type="number" name="sub3"></td>
				</tr>
				<tr>
					<td>Sub 4:</td>
					<td><input type="number" name="sub4"></td>
				</tr>
				<tr>
					<td>Sub 5:</td>
					<td><input type="number" name="sub5"></td>
				</tr>
				<tr>
					<td><input type="reset" class="btnr" name="reset" value="Clear"></td>
					<td><input class="btn" type="submit" value="Upload Result" name="ressubmit"></td>
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
				<th>Subject1</th>
				<th>Subject2</th>
				<th>Subject3</th>
				<th>Subject4</th>
				<th>Subject5</th>
				<th>Total</th>
				<th>Percentage</th>
				<th>Class</th>
				<th>Result</th>
				<th>Edit</th>
			</tr>
	<?php 
		$sql = 'select * from stud_result';
		$res = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($res)){	
		?>
			<tr>
				<td><?php $stud_id = $row['stud_id'];
							echo $stud_id; ?></td>
				<?php 
					$sql1 = "select * from stud_master where id='$stud_id'";
					$res1 = mysqli_query($con, $sql1);
					while($row1 = mysqli_fetch_assoc($res1)){
						?><td><?php echo $row1['name'];?></td>
						<td><?php echo $row1['course']; ?></td>
				<?php	}?>
				
				<td><?php echo $row['semester']; ?></td>
				<td><?php echo $row['sub_1']; ?></td>
				<td><?php echo $row['sub_2']; ?></td>
				<td><?php echo $row['sub_3']; ?></td>
				<td><?php echo $row['sub_4']; ?></td>
				<td><?php echo $row['sub_5']; ?></td>
				<td><?php echo $row['total']; ?></td>
				<td><?php echo $row['percentage']; ?></td>
				<td><?php echo $row['class']; ?></td>
				<td><?php echo $row['result']; ?></td>
				<td><a href="resultupdate.php?id=<?php echo $row['id']; ?>">edit</a></td>
			</tr>
		<?php } ?>
</tbody>

</table>

</center>

<script>
    const currentChanges = document.getElementById("name");
    currentChanges.onchange = (e)=>{
        const currentStudent = e.target.value;
        window.location = `?stud_id=${currentStudent}`;
    }
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

</body>
</html>