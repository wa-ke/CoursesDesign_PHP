<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <title>Document</title>
    <style>
        .rounded-circle{
            width: 2.3vw;
            height: 2.3vw;
            cursor: pointer;
        }
        p{
            font-style: initial;
            font-size: 1.6vh;
            float: left;
            padding-top: 2vh;
            padding-left: 1.5vh;
        }
        .card-header{
            height: 6.2vh;
        }
        a{
            float: left;
        }
        #table{
            margin-top: -17vh;
        }
        #cl{
            text-decoration: none;
            font-style: normal;
            color: black;
            padding: 1vh;
            font-size: 2vh;
            padding-left: 0.6vw;
        }
        #c2{
            text-decoration: none;
            font-style: normal;
            color: black;
            padding: 1vh;
            font-size: 2vh;

        }
        #btn1{
            color: white;
            margin-top: 2vh;
            margin-bottom: 1vh;
        }
        #mod{
            padding: 3vh;
        }
        #nicname{
            cursor:pointer;
        }
    </style>
</head>
<body>
<?php
session_start();
//$user=$_SESSION['username'];
$id=$_SESSION['id'];
$sql="SELECT img_url FROM user where id='$id'";
$sql1="SELECT * FROM timetable";
$sql2="SELECT nickname FROM user where id='$id'";
require_once "conn.php";
$i=0;
$user=$conn->query($sql2)->fetch_object()->nickname;
if (!$conn){
    die("连接服务器失败");
    exit;
}else{
    $img_url=mysqli_query($conn,$sql)->fetch_object()->img_url;
    $result=mysqli_query($conn,$sql1);
    $squ=mysqli_query($conn,"select php,java,mfc,计算机组装,计算机网络安全,专业英语 from score where id='$id'");
    $r=mysqli_fetch_array($squ);

}
?>
<div class="container">
    <div class="card-header">
        <a><img src="<?php echo $img_url ?>" class="rounded-circle card-img" data-toggle="modal" data-target="#myModal"></a>
        <iframe class="float-right" name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=1" width="330" height="35" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
        <p >欢迎你</p><p id="nicname" data-toggle="modal" data-target="#nickname"><?php echo $user ?></p></div>
    <br>
    <br>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card">
                    <a id="cl" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne">
                        课表
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="collapse show">
                <div class="panel-body">

    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped' id='table'>";
        echo "<tr align='center'><td>&nbsp;</td><td>1-2节课</td><td>3-4节课</td><td>5-6节课</td><td>7-8节课</td></tr>";
        while ($row = $result->fetch_assoc()) {
            $i++;
            echo "<tr align='center'><td>$i</td> <td> " . $row["12"] . "</td><td>" . $row["34"]. "</td><td> " . $row["56"]. " </td><td>" . $row["78"] . "</td><br>";
        }
    }
    echo "</table>";

    ?>
                </div>
        </div>
    </div>
</div>
<div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title card">
                    <a id="c2" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo">
                        成绩表
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="panel-body">
    <table class="table table-bordered table-striped">
        <?php
            echo "<tr align='center'><td >php</td><td>java</td><td>mfc</td><td>计算机组装</td><td>计算机网络安全</td><td>专业英语</td></tr>";
            echo "<tr align='center'>";
        for ($i=0;$i<6;$i++)
            echo "<td>".$r["$i"]."</td>";
            echo "</tr>";
        ?>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form method="post" action="img_updata.php" class="form-group" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">更换头像</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="img" value="<?php echo $id ?>">
                            <label for="psw-agin">上传头像：</label>
                            <input type="file"  name="userfile" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交更改
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="nickname">
        <div class="modal-dialog modal-sm">
            <div id="mod" class="modal-content">
                <form action="updateNick.php" method="post">
                    更改昵称：<input type="text" class="form-control" name="nickname">
                    <button id="btn1" type="submit" class="btn bg-success col-12">提交</button>
                    <button id="btn2" type="button" class="btn btn-secondary col-12" data-dismiss="modal">关闭</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

        $('table td').click(function(){
            var tdSeq = $(this).parent().find("td").index($(this)[0]);
            var trSeq = $(this).parent().parent().find("tr").index($(this).parent()[0]);
            // alert("第" + (trSeq ) + "行，第" + (tdSeq) + "列");
            var url="courseSel.php?tdSeq="+tdSeq+"&trSeq="+trSeq;
            window.location.href=url;

        });


</script>



</div>
</body>
</html>