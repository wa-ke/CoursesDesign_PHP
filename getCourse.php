<?php
session_start();
require_once "conn.php";
$tdSeq=$_SESSION['tdSeq'];
$trSeq=$_SESSION['trSeq'];
$arr=array("1"=>"12","2"=>"34","3"=>"56","4"=>"78");
$num=$arr[$tdSeq];
$cour=$_POST['optradio'];
$sql="UPDATE  `user`.`timetable` SET  `$num` =  '$cour' WHERE  `timetable`.`day` ='$trSeq';";
mysqli_query($conn,$sql);
$conn->close();
header("location:Per_info.php");