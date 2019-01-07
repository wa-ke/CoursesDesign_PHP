<meta charset="UTF-8">
<?php
$id=time();
$email=$_POST['id1'];
$nickname="temp_name";
$psw=$_POST['socre1'];
require_once "conn.php";
$sql="INSERT INTO user (id,nickname, name, password)
VALUES ('$id','$nickname', '$email', '$psw')";
$conn->query($sql);
$conn->close();
header("location:root.php");