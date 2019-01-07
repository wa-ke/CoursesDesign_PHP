<?php
define('MAX_SIZE',2000000);
define('URL',dirname(__FILE__).'\uploads');
$fileMimes = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
$id=$_POST['img'];
if (is_array($fileMimes)) {
    if (!in_array($_FILES['userfile']['type'],$fileMimes)) {
        echo "<script>alert('本站只允许jpg、gif、png图片！');history.back();</script>";
        exit;
    }
}
if ($_FILES['userfile']['error'] > 0) {
    switch ($_FILES['userfile']['error']) {
        case 1: echo "<script>alert('上传文件超过约定值1');history.back();</script>";
            break;
        case 2: echo "<script>alert('上传文件超过约定值2');history.back();</script>";
            break;
        case 3: echo "<script>alert('部分被上传');history.back();</script>";
            break;
        case 4: echo "<script>alert('没有任何文件被上传');history.back();</script>";
            break;
    }
    exit;
}
if ($_FILES['userfile']['size'] > MAX_SIZE) {
    echo "<script>alert('上传文件不得超过2M');history.back();</script>";
    exit;
}
if (!is_dir(URL)) {
    mkdir(URL,0777);
}

if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    if (!@move_uploaded_file($_FILES['userfile']['tmp_name'],URL.'/'.$_FILES['userfile']['name'])) {
        echo "<script>alert('移动失败');history.back();</script>";
        exit;
    }
} else {
    echo "<script>alert('临时文件夹找不到上传的文件');history.back();</script>";
    exit;
}

$url="uploads/".$_FILES['userfile']['name'];
$sql="UPDATE  `user`.`user` SET  `img_url` =  '$url' WHERE  `user`.`id` ='$id'";
require_once "conn.php";
if (!$conn){
    die("连接服务器失败");
    exit;
}else{
    $conn->query($sql);
}
echo "<script>history.back();</script>";