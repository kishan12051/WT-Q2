<?php
include 'db.php';
$msg = '';

  if(isset($_REQUEST['submit'])){
    $user = $_REQUEST['uname'];
    $pass = $_REQUEST['pass'];
    if ($user == "admin"  && $pass == "admin") {
      header("Location:admindashboard.php");
    } else{
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
  <h1>Admin Login</h1>
    <table cellpadding="5px">
      <tr>
          <td>Username :</td>
          <td class="txtb"><input type="text" name="uname"></td>
      </tr>
      <tr>
          <td>Password :</td>
          <td class="txtb"><input type = "password" name ="pass"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Login" name="submit" class="logbtn"></td>
      </tr>
      <tr>
        <td colspan="2"><?php if($msg){
          ?><div class="bottom-text"><?php echo $msg; ?></div><?php
        } ?></td>
      </tr>
    </table>
  </form>

</body>
</html>