<?php
session_start();
require "dbcon.php";
if(isset($_POST['save_student'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $course=mysqli_real_escape_string($con,$_POST['course']);

    $query="insert into students(name,email,phone,course) values('$name','$email','$phone','$course')";
    $run=mysqli_query($con,$query);
    if($run){
        $_SESSION['message']="student created successfully";
        header("Location: student-create.php");
        exit();
    }
    else{
        $_SESSION['message']="student not created successfully";
        header("Location: student-create.php");
        exit();
    }
}
?>