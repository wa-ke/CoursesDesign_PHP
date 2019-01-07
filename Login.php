<meta charset="UTF-8">
<?php
session_start();
class User{
    private $email;
    private $psw;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPsw()
    {
        return $this->psw;
    }

    /**
     * @param mixed $psw
     */
    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

}
$user=new User();
$user->setEmail($_POST['email']);
$user->setPsw($_POST['psw']);
$email=$user->getEmail();
$psw=$user->getPsw();
require_once "conn.php";
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

$sql = "SELECT password FROM user where name ='$email'";
$sql1="SELECT name FROM user where name ='$email'";
$sql2="SELECT nickname FROM user where name ='$email'";
$sql3="SELECT id FROM user where name ='$email'";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2=mysqli_query($conn,$sql2);
$result3=mysqli_query($conn,$sql3);
@$s_email=$result1->fetch_object()->name;
@$s_psw=$result->fetch_object()->password;
@$s_nickname=$result2->fetch_object()->nickname;
@$s_id=$result3->fetch_object()->id;
$_SESSION['username']=$s_nickname;
$_SESSION['id']=$s_id;
if ($s_email!=$email){
    echo "<script>alert('账户未注册！');history.back();</script>";
    exit;

}
if ($s_psw!=$psw){
    echo "<script>alert('密码错误！');history.back();</script>";
    exit;
}
$str = $email;
echo $email;
echo $str;
if (preg_match('/\w+([-+.]\w+)*(@)root(.)com/', $str, $matches)){
    header("location:root.php");
}else if(preg_match('/\w+([-+.]\w+)*(@)teacher(.)com/', $str,$matches)){
    header("location:teacher.php");
}else{
    header("location:Per_info.php");
}
