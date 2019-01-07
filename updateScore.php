<meta charset="UTF-8">
<?php
$id=$_POST['id1'];
$cource=$_POST['course'];
$score=$_POST['socre1'];
require_once "conn.php";
$stmt = $conn->prepare("update score set $cource=? where id=?");
$stmt->bind_param("ss", $sco,$di);
if ($score>100 || $score<0){
    echo "<script>alert('成绩不符合规则');history.back();</script>";
    exit;
}
$sco=$score;
$di=$id;
$stmt->execute();
echo "<script>alert('执行成功！');history.back();</script>";
$conn->close();