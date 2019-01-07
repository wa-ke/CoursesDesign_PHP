<meta charset="UTF-8">
<?php
$cource=$_POST['course'];
$score=$_POST['score'];

require_once "conn.php";
$sql="select id from score ";
$result=mysqli_query($conn,$sql);
if ($result->num_rows>0){
    while ($row=$result->fetch_assoc()){
        $id[]= $row['id'];
    }
}
$stmt = $conn->prepare("update score set $cource=? where id=?");
$stmt->bind_param("ss", $sco,$di);
for ($i=0;$i<count($score);$i++){
    if ($score["$i"]>100 || $score["$i"]<0){
        echo "<script>alert('有成绩不符合规则');history.back();</script>";
        exit;
    }
    $sco=$score["$i"];
    $di=$id["$i"];
    $stmt->execute();
}
$conn->close();
header("location:teacher.php");