<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body class="container">
<ul>
    <form action="getCourse.php" method="post" >
<?php
session_start();
require_once  "conn.php";
$_SESSION['tdSeq']=$_GET['tdSeq'];
$_SESSION['trSeq']=$_GET['trSeq'];
//$arr=array("1"=>"12","2"=>"34","3"=>"56","4"=>"78");
//$num=$arr[$tdSeq];
//$cour="";
//$sql="UPDATE  `user`.`timetable` SET  `$num` =  '$cour' WHERE  `timetable`.`day` ='$trSeq';";
//mysqli_query($conn,$sql);
$sql= "select courseName from selcourse ";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name=$row["courseName"];
        echo  " <li class=\"list-group-item\"><input type='radio' name=\"optradio\" value='$name'>".$row["courseName"]."</li>" ;
    }
}
echo "</table>";
$conn->close();
?>
<button type="submit">提交</button>
    </form>
</ul>
</body>
</html>