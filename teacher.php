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
        #c2{
            text-decoration: none;
            font-style: normal;
            color: black;
            padding: 1vh;
            font-size: 2vh;
        }
    </style>
    <title>Document</title>
</head>
<body class="container">
<?php
    session_start();
    $name=$_SESSION['username'];
    require_once "conn.php";
    $sql="select id,nickname from score ";
    $result=mysqli_query($conn,$sql);
?>
<div class="card-header">
    <h4 >欢迎你&nbsp;&nbsp;&nbsp;<?php echo $name; ?>
    </h4> <a>学生成绩录入</a></div>
<form role="form" method="post" action="scoreAdd.php" id="scoreAdd">

    <div class="form-group">
        <label for="name">选择科目</label>
        <select class="form-control" name="course" id="">
            <?php
            $sql1="select CourseName from cource ";
            $result1=mysqli_query($conn,$sql1);
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    echo "<option>".$row['CourseName']."</option>";
                }
            }
            ?>
        </select>
        <?php
        $sql1="select CourseName from cource ";
        $result1=mysqli_query($conn,$sql1);
        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered table-striped' id='table'>";
            echo "<tr align='center'><td>ID</td><td>昵称</td><td>成绩</td></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr align='center'><td> " . $row["id"] . "</td><td>" . $row["nickname"]. "</td><td><input type='number' name='score[]' required></td> ";
            }
        }
        echo "</table>";
        ?>
    </div>
    <button type="submit" class="btn btn-success col-lg-6">提交</button>
    <button type="reset" class="btn col-lg-6 float-right">重置</button>
</form>
<div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card">
                    <a id="c2" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne">
                       个人成绩修改
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                     <form action="updateScore.php" method="post" class="form-group" id="fom">
                        ID：<input type="number" name="id1" class="form-control col-auto">
                         <label for="name">选择科目</label>
                         <select class="form-control" name="" id="">
                             <?php
                             if ($result1->num_rows > 0) {
                                 while ($row = $result1->fetch_assoc()) {
                                     echo "<option>".$row['CourseName']."</option>";
                                 }
                             }
                             ?>
                         </select>
                        成绩<input type="number" name="socre1" class="form-control col-auto">
                         <br>
                         <button type="submit" class="btn btn-success col-lg-6">提交</button>
                         <button type="reset" class="btn col-lg-6 float-right">重置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#fom').validate({
        rules:{
            id1:{
                required:true
            },
            socre1:{
                required:true
            }
        }
    })
</script>
    </body>
</html>