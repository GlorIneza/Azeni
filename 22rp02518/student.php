<?php
include("conn.php");
session_start();
if(!isset($_SESSION['username'])){
header("location:login.php");
}
$nameErr=$regErr=$depErr=$ageErr=$genderErr="";
$name=$reg=$dep=$age=$gender= '';
$valid=true;

if(isset($_POST['submit'])){
    $name=trim($_POST['name']);
    $reg=trim($_POST['Regno']);
    $depart=trim($_POST['depart']);
    $age=isset($_POST['age'])? intval(trim($_POST['age'])):0;
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

    if(empty($name)||!preg_match('/^[a-zA-Z]+$/',$name))
    {
    $nameErr="The name must contain only letters and not empty";
    $valid=false;
    }
 if(empty($reg)||!preg_match('/^\d{2}rp\d{4}$/', $reg))
 {
$regErr="Registration number must be valid and not empty";
$valid=false;
 }
 if(empty($depart)||!preg_match('/^[a-zA-Z]+$/',$depart))
 {
 $departErr="The depart must contain only letters and not empty";
 $valid=false;
 }
 
    if (empty($age)|| $age < 18 || $age > 100) {
        $ageErr = 'Age must be a number between 18 and 100.';
        $valid = false;
    }
    if (empty($gender)) {
        $genderErr= 'Please select a gender.';
        $valid = false;
    }

 if($valid){
    $sql="INSERT INTO student(name,regnumber,depart,age,gender) VALUES ('$name','$reg','$depar','$age','$gender')";
    $check=mysqli_query($conn,$sql);
    if($check){
        echo "<script>alert('data inserted')</script>";
        header("location:view.php");
    }
    else{
        echo "<script>alert('data not inserted')</script>";
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        nav {
            margin: 0;
            padding: 1em;
            background-color: green;
        }
        nav a {
            color: white;
            margin: 0 1em;
            text-decoration: none;
        }
        .container {
            padding: 2em;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 1em;
            margin: 1em 0;
        }
        p{
        
    float: right;
    margin-top: -6px;

        }
        input[type=text]{
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

    </style>
</head>
<body>
    
    <nav>
        <a href="home.php">Home</a>
        <a href="view.php">View Students</a>
        <P><a href="logout.php?username">logout</a></p>
    </nav>
    <div class="container">
        <div class="card">
            <h2>Add New Student</h2>
            <p> 
        <form method="POST">
        Student name :<input type="text" name="name"placeholder="Student name" required
        value="<?php echo htmlspecialchars($name); ?>">
        <span>*<?php echo htmlspecialchars($nameErr); ?></span><br><br>
        Reg_number :<input type="text" name="Regno"placeholder="Registration number"required
        value="<?php echo htmlspecialchars($reg); ?>">
        <span>*<?php echo htmlspecialchars($regErr); ?></span><br><br>
        Department :<input type="text" name="depart"placeholder="Department"required
        value="<?php echo htmlspecialchars($dep); ?>">
        <span>*<?php echo htmlspecialchars($depErr); ?></span><br><br>
        Age :<input type="text" name="age"placeholder="age"required
        value="<?php echo htmlspecialchars($age); ?>">
        <span>*<?php echo htmlspecialchars($ageErr); ?></span><br><br>
        Gender:<input type="radio" name="gender" value="Male"
        value="<?php echo htmlspecialchars($gender); ?>">Male 
        <input type="radio" name="gender" value="Female"
        value="<?php echo htmlspecialchars($gender); ?>">Female 
        <span>*<?php echo htmlspecialchars($genderErr); ?></span><br><br>
        <input type="submit" name="submit" >
    </form>

            </p>
        </div>
        
    </div>
</body>
</html>
