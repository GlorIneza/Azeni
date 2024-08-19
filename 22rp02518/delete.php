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
        header("location:view.php");
    }
    else{
        echo "<script>alert('data not deleted')</script>";
    }
    }
?>