<?php
session_start();
require("conn.php");
class  User{
    private $user;
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }

}

$user =new User();
$user->setUser($_SESSION["AdminName"]);
$adminName=$user->getUser();

if($identify=="admin")
{
	$user_pass=md5($user_pass);
	$sql="select * from admin where UserName='$user_no' and PassWord='$user_pass'";
	$result=mysql_query($sql);
	$login=mysql_fetch_array($result);
	if(empty($login))
	{
		echo "<script>alert('管理员用户名密码错误');location.href='login.php';</script>";
		exit;
	}
	else
	{
		$adminName=$user_no;
		$_SESSION[admin]=$user_no;
		echo "<script>alert('管理员登录成功');location.href='admin/admin_index.php';</script>";
		//header("location:admin/");
	}
	}
if($identify=="yg")
{
$sql="select * from workers where uname='$user_no' and pwd='$user_pass'";
	$result=mysql_query($sql);
	$login=mysql_fetch_array($result);
	if(empty($login))
	{
		echo "<script>alert('员工用户名密码错误');location.href='login.php';</script>";
		exit;
	}
	else
	{
$_SESSION[login_id]=$login[id];
		$_SESSION[login_name]=$user_no;
		$_SESSION["AdminName"]=$user_no;
		$_SESSION[yg]=$user_no;
		echo "<script>alert('员工登录成功');location.href='admin/yg_index.php';</script>";
		//header("location:admin/");
	}
}

?>