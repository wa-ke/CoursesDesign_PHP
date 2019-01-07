<meta charset="UTF-8">
<?php
session_start();
$id= $_SESSION['id'];
$nickname=$_POST['nickname'];
require_once "conn.php";
$stmt = $conn->prepare("update user set nickname='$nickname' where id=?");
$stmt->bind_param("s", $di);
$di=$id;
$stmt->execute();
$conn->close();
header("location:Per_info.php");