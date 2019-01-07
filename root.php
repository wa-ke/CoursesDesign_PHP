<html>
<head>
    <meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/messages_zh.js"></script>
    <script src="js/additional-methods.min.js"></script>
<title>Document</title>
</head>
<style>
    #cl{
        text-decoration: none;
        font-style: normal;
        color: black;
        padding: 1vh;
        font-size: 2vh;
    }
    .form-control:focus{
        box-shadow: none;
    }
</style>
<body>
<div class="container col-lg-6 ">
    <div class="card-header">
        <h4 >用户管理</h4> </div>
    <br>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card">
                    <a style="color: black" id="cl" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseSer">
                        查找用户
                    </a>
                </h4>
            </div>
            <div id="collapseSer" class="panel-collapse collapse show">
                <div class="panel-body">
                    <form action="Ser.php" method="post" class="form-group" id="fo" onsubmit="return check();">
                        输入姓名：<input type="text" name="id1" class="form-control col-auto" id="txt1" onkeyup="showHint(this.value)">
                        <br>
                        <p>提示信息: <span id="txtHint"></span></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card bg-light ">
                    <a id="cl" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne">
                        用户列表
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
<?php
require_once "conn.php";
$sql="select id,nickname,name from user ";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-striped' id='table'>";
    echo "<tr align='center'><td>ID</td><td>姓名</td><td>email</td></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr align='center'><td> " . $row["id"] . "</td><td>" . $row["nickname"]. "</td><td> ".$row['name']."</td>";
    }
}
echo "</table>";
$conn->close();
?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card ">
                    <a id="cl" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo">
                        修改用户
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse show">
                <div class="panel-body">
                    <form action="updateUser.php" method="post" class="form-group" id="fot" onsubmit="return check();">
                        输入ID：<input type="number" name="id1" class="form-control col-auto">
                        密码：<input type="password" name="socre1" class="form-control col-auto">
                        <br>
                        <button type="submit" class="btn btn-success col-lg-6" id="tj">提交</button>
                        <button type="reset" class="btn col-lg-6 float-right">重置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card bg-light">
                    <a id="cl" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseThr">
                        添加用户
                    </a>
                </h4>
            </div>
            <div id="collapseThr" class="panel-collapse collapse show">
                <div class="panel-body">
                    <form action="addUser.php" method="post" class="form-group" id="fo1" onsubmit="return check();">
                        输入Email：<input type="email" name="id1" class="form-control col-auto">
                        密码：<input type="password" name="socre1" class="form-control col-auto">
                        <br>
                        <button type="submit" class="btn btn-success col-lg-6" id="tj">提交</button>
                        <button type="reset" class="btn col-lg-6 float-right">重置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card ">
                    <a id="cl" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseFour">
                        删除用户
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse show">
                <div class="panel-body">
                    <form action="delete.php" method="post" class="form-group" id="fo2" onsubmit="return check();">
                        输入ID：<input type="number" name="id1" class="form-control col-auto"><br>
                        <button type="submit" class="btn btn-success col-lg-6" id="tj">提交</button>
                        <button type="reset" class="btn col-lg-6 float-right">重置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card bg-light ">
                    <a id="cl" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseFive">
                        添加课程
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse show">
                <div class="panel-body">
                    <form action="addCource.php" method="post" class="form-group">
                        输入课程名：<input type="text" name="cource" class="form-control col-auto" required><br>
                        <button type="submit" class="btn btn-success col-lg-6" id="tj">提交</button>
                        <button type="reset" class="btn col-lg-6 float-right">重置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#fot').validate({
        rules:{
            socre1:{
                required:true,
                minlength:8
            },
            id1:{
                required:true
            }
        }
    })
    $('#fo1').validate({
        rules:{
            socre1:{
                required:true,
                minlength:8
            },
            id1:{
                required:true
            }
        }
    });
    $('#fo2').validate({
        rules:{
            id1:{
                required:true
            }
        }
    })
   // function check() {
   //  var r=confirm("确认修改？");
   //  if (r==true){
   //      return true;
   //  } else {
   //      return false;
   //  }
   // }
    function showHint(str)
    {
        var xmlhttp;
        if (str.length==0)
        {
            document.getElementById("txtHint").innerHTML="";
            return;
        }
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","Ser.php?q="+str,true);
        xmlhttp.send();
    }
    // $(function(){
    //     $("#key").autocomplete({
    //         source:  "search.php"
    //     });
    // });
</script>
</body>
</html>