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
            margin-top: 5vh;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container col-lg-4 col-sm-6">
    <h2 align="center">登录</h2>
    <form action="Login.php" class="form-group" method="post" id="fom">
        <div class="form-group">
            <label for="user">Email：</label>
            <input type="email" class="form-control" name="email" >
        </div>
        <div class="form-group">
            <label for="psw">密码：</label>
            <input type="password" class="form-control"  name="psw" >
        </div>
        <a href="calendar.html">日历查询</a>
        <p class="float-right">还没有账号？去&nbsp;<a href="index.php">注册</a></p>
        <button class="btn col btn-success" type="submit" name="submit" id="submit">登录</button>
    </form>
</div>
<script>
    $('#fom').validate({
        rules:{
            email:{
                required:true
            },
            psw:{
                required:true
            }
        }
    })
</script>
</body>
</html>