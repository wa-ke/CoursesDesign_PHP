<meta charset="UTF-8">
<?php
$id=$_POST['id1'];
$psw=$_POST['socre1'];
require_once "conn.php";
$stmt = $conn->prepare("update user set password='$psw' where id=?");
$stmt->bind_param("s", $di);
$di=$id;
$stmt->execute();
$conn->close();
header("location:root.php");