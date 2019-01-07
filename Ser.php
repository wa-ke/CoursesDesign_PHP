<?php

require_once "conn.php";
$sql ="select nickname from user";
$result=mysqli_query($conn,$sql);
if ($result->num_rows>0){
    while ($row=$result->fetch_assoc()){
        $a[]= $row['nickname'];
    }
}
$q=$_GET["q"];

if (strlen($q) > 0)
{
    $hint="";
    for($i=0; $i<count($a); $i++)
    {
        if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
        {
            if ($hint=="")
            {
                $hint=$a[$i];
            }
            else
            {
                $hint=$hint." , ".$a[$i];
            }
        }
    }
}

if ($hint == "")
{
    $response="没有结果";
}
else
{
    $response=$hint;
}

echo $response;
?>