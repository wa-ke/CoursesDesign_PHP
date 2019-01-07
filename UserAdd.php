<?php
    session_start();
    class StuForm{
        private $user;
        private $pwd;
        private $file;
        private $nickname;
        /**
         * @return mixed
         */
        public function getUser()
        {
            return $this->user;
        }

        /**
         * @param mixed $nickname
         */
        public function setNickname($nickname)
        {
            $this->nickname = $nickname;
        }

        /**
         * @return mixed
         */
        public function getNickname()
        {
            return $this->nickname;
        }
        /**
         * @param mixed $user
         */
        public function setUser($user)
        {
            $this->user = $user;
        }

        /**
         * @return mixed
         */
        public function getPwd()
        {
            return $this->pwd;
        }

        /**
         * @param mixed $pwd
         */
        public function setPwd($pwd)
        {
            $this->pwd = $pwd;
        }

        public function getFile()
        {
            return $this->file;
        }

        /**
         * @param mixed $file
         */
        public function setFile($file)
        {
            $this->file = $file;
        }
    }
   $stu=new StuForm();
    $stu->setUser($_POST['user']);
    $stu->setPwd($_POST['psw']);
    $stu->setFile($_FILES['userfile']);
    $stu->setNickname($_POST['nickname']);
    $user=$stu->getUser();
    $psw=$stu->getPwd();
    $file=$stu->getFile();
    $nickname=$stu->getNickname();
    $id=time();
    $_SESSION['username']=$nickname;
    $_SESSION['id']=$id;
    define('MAX_SIZE',2000000);
    define('URL',dirname(__FILE__).'\uploads');
    $fileMimes = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
if (is_array($fileMimes)) {
    if (!in_array($file['type'],$fileMimes)) {
        echo "<script>alert('本站只允许jpg、gif、png图片！');history.back();</script>";
        exit;
    }
}
if ($file['error'] > 0) {
    switch ($file['error']) {
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
if ($file['size'] > MAX_SIZE) {
    echo "<script>alert('上传文件不得超过2M');history.back();</script>";
    exit;
}
if (!is_dir(URL)) {
    mkdir(URL,0777);
}

if (is_uploaded_file($file['tmp_name'])) {
    if (!@move_uploaded_file($file['tmp_name'],URL.'/'.$file['name'])) {
        echo "<script>alert('移动失败');history.back();</script>";
        exit;
    }
} else {
    echo "<script>alert('临时文件夹找不到上传的文件');history.back();</script>";
    exit;
}
$fileurl="uploads/".$file['name'];
$sql="INSERT INTO user (id,nickname, name, password,img_url)
VALUES ('$id','$nickname', '$user', '$psw','$fileurl')";
$sql1="INSERT INTO score (id,nickname)
VALUES ('$id','$nickname')";
require_once "conn.php";
if (!$conn){
    die("连接服务器失败");
    exit;
}else{
    $conn->query($sql);
    $conn->query($sql1);
}
header("location:Per_info.php");