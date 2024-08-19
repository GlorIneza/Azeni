<?php
session_start();
if(isset($_SESSION['username'])){
header("location:login.php");
}
include("conn.php");
if(isset($_POST['submit'])){
	$a=$_POST['id'];
	$b=$_POST['name'];
	$c=$_POST['pass'];
	$sql="INSERT INTO user(userid,username,Password) VALUES ('$a','$b','$c')";
	$check=mysqli_query($conn,$sql);
	if($check){
		echo "<script>alert('acount created')</script>";
		echo'<meta http-equiv="refresh" content="0.5;url=login.php">';
		header("location:login.php");
	}
	else{
		echo "<script>alert('acount not created')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>creat acount</title>
	<style>input[type=text]{
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password]{
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 
}
P{
	color: green;
}
a{
		background-color: green;
  color: white;
  border: 2px solid green;
  padding: 10px 10px;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 margin-top: 10px;
}</style>
</head>
<body>
	<center>
		<p>creat acount</p>
	<form method="POST">
		<input type="text" name="name"placeholder="Enter username"><br><br>
		<input type="password" name="pass"placeholder="create password"><br><br>
		<input type="password" name="pass2"placeholder="re-inter password"><br><br>
		<input type="submit" name="submit">    Click here: <a href="login.php">Login</a>
	</form>

	</center>
</body>
</html>