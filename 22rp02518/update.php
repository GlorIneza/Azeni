<?php
include("conn.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit(); 
}


$sid = $name = $regnumber = $depart = $age = $gender = '';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $sql = "SELECT * FROM student WHERE sid=$id";
    $check = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($check)) {
        $sid = $row['sid'];
        $name = $row['name'];
        $regnumber = $row['regnumber'];
        $depart = $row['depart'];
        $age = $row['age'];
        $gender = $row['gender']; 
    }
}

if (isset($_POST['submit'])) {
    $a = $_POST['sid'];
    $b = $_POST['name'];
    $c = $_POST['regnumber'];
    $d = $_POST['depart'];
    $e = $_POST['age'];
    $f = $_POST['gender'];
    $up = "UPDATE student SET name='$b', regnumber='$c', depart='$d', age='$e', gender='$f' WHERE sid='$a'";
    $check = mysqli_query($conn, $up);
    if ($check) {
        echo "<script>alert('Data updated successfully'); window.location.href='view.php';</script>";
    } else {
        echo "<script>alert('Data not updated');</script>";
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
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
   text-align: left;
  padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}

tr:hover {background-color: silver;
}
    </style>
</head>
<body>
    
    <nav>
        <a href="#">Home</a>
        <a href="student.php">Add Student</a>
        <a href="view.php">View Students</a>
        <p><a href="logout.php">Logout</a></p>
    </nav>
    <div class="container">
        <div class="card">
            <h2>Update Student's Info</h2>
            <form method="POST">
                Student ID: <input type="text" name="sid" value="<?php echo htmlspecialchars($sid); ?>" readonly>
                <br><br>
                Student Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"required>
                <br><br>
                Reg Number: <input type="text" name="regnumber" value="<?php echo htmlspecialchars($regnumber); ?>"required>
                <br><br>
                Department: <input type="text" name="depart" value="<?php echo htmlspecialchars($depart); ?>"required>
                <br><br>
                Age: <input type="text" name="age" value="<?php echo htmlspecialchars($age); ?>"required>
                <br><br>
                Gender: 
                <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?> required>Female
                <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?> required>Male
                <br><br>
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
