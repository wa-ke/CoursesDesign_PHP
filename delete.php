<meta charset="UTF-8">
<?php
$id=$_POST['id1'];
require_once "conn.php";
$sql="DELETE FROM user WHERE id='$id'";
$conn->query($sql);
$conn->close();
header("location:root.php");