<?php
$conn = mysqli_connect('localhost:3306', 'root', 'root', 'user');
if(!$conn){
    echo "连接失败";
}