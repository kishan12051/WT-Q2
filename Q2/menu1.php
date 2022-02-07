<?php
    include 'db.php';

    $name = $_SESSION["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1 align="center" class="title">Student Dashboard</h1>

    <ul class="menu">
        <li>
        <a class="link" href="studentdashboard.php"><h3>Welcome, <?php echo $name; ?></h3></a>
        </li>
        <li>
            <a class="link" href="result.php"><h3>Result</h3></a>
        </li>
        <li>
            <a class="link" href="chpass.php"><h3>Change Password</h3></a>
        </li>
        <li>
        <a class="link" href="index.php"><h3>Logout</h3></a>
        </li>
    </ul>
</body>
</html>