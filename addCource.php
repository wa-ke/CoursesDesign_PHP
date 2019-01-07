<?php
$courceName=$_POST['cource'];
require_once "conn.php";
$sql="insert into selCourse value ('$courceName')";
mysqli_query($conn,$sql);
header("location:root.php");