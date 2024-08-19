<?php
include("conn.php");
session_start();
if(!isset($_SESSION['username'])){
header("location:login.php");
}
if(isset($_GET['delete'])){
    $a=$_GET['delete'];
    $sql="DELETE FROM `student` WHERE sid='$a'";
    $check=mysqli_query($conn,$sql);
    if($check){
        echo "<script>alert('data deleted')</script>";
        header("location");
    }
    else{
        echo "<script>alert('data not deleted')</script>";
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
        <a href="home.php">Home</a>
        <a href="student.php">Add Student</a>
        <a href="View.php">View Students</a>
        <P><a href="logout.php?username">logout</a></p>
    </nav>
    <div class="container">
        <div class="card">
            <h2>Student's info</h2>
            <p> 
        <?php
            include("conn.php");
$sel=mysqli_query($conn,"SELECT * FROM student");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<?php
$a=1;
if(mysqli_num_rows($sel)){
?>
<table class="table">
    <tr>
<th>sid</th>
<th>student name</th>
    <th>Reg number</th>
        <th>department</th>
        <th>age</th>
        <th>gender</th>
            <th>action</th>
        </tr>
            <?php
while($row=mysqli_fetch_array($sel)){
            ?>
            <tr>
                <td><?php echo $a++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['regnumber']; ?></td>
                <td><?php echo $row['depart']; ?></td>
               <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td>
                    <button class="update"><a onclick="return confirm('Do you want to update!!')" 
                    href="update.php?id=<?php echo $row['sid']; ?>" style="text-decoration: none;color:green">edit</a></button>|<button class="danger">
                        <a onclick="return confirm('Are you sure you want to delete!!')" href="delete.php?delete=<?php echo $row['sid']; ?>"style="text-decoration: none;color:red">delete</a></button>
                </td>
            </tr>
            <?php
            }
            ?>
    </table>
    <?php
}
else{
    echo "no result";
}
?>
</body>
</html>
            </p>
        </div>
        
    </div>
</body>
</html>