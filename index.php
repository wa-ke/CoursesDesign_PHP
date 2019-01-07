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

    <style>
        .container{
            margin-top: 10vh;
        }
        .btn-success{
            margin-bottom: 2vh;
        }
    </style>
    <title>Document</title>
</head>
<body>

<div class="container col-lg-4 col-sm-6">
    <h1 align="center">注册</h1>
    <form id="useradd" action="UserAdd.php" method="post" class="form-group" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nickuser">用户名：</label>
            <input type="text" class="form-control" name="nickname">
        </div>
        <div class="form-group">
            <label for="user">E-mail：</label>
            <input type="text" class="form-control" name="user">
        </div>
        <div class="form-group">
            <label for="psw">密码：</label>
            <input type="password" class="form-control"  name="psw" id="psw" >
        </div>
        <div class="form-group">
            <label for="psw-agin">确认密码：</label>
            <input type="password" class="form-control" name="psw_again">
        </div>
        <div class="form-group">
            <label for="userfile">上传头像：</label>
            <input type="file"  name="userfile" required>
        </div>
        <button class="btn col btn-success" type="submit" name="submit" id="submit">提交</button>
        <a href="UserLogin.php"><button type="button" class="btn col">登录</button></a>
    </form>
    <div></div>
</div>

<script>
    $('#useradd').validate({
        rules:{
            nickname:{
                required:true
            },
            user:{
                required:true,
                email:true,
            },
            psw:{
                required:true,
                minlength:8,
            },
            psw_again:{
                required:true,
                minlength:8,
                equalTo:"#psw",
            }
        }
    });

</script>
</body>
</html>