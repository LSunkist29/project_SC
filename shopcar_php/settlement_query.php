
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- data -->
</head>
<body>

<?php
session_start();
if(isset($_SESSION["username"])){
    if($_POST["content_value"]){
    $content1=$_POST["content_value"];
    $content=str_replace("刪除","","$content1");
    // $content= substr($content,1);
    // echo "$content";
    // $sound=$_POST["sound_value"];
    // $username1=$_POST["username"];

    // $shoplist="$content"."總共 "."$sound"."元";
    $shoplist=$content;

    echo "$shoplist";
    $username=$_SESSION["username"];
    // echo "$sessionvalue";
    echo "$username";

    //data
    require_once('config.php');
    //
    
    // echo "$_SESSION["username"]";
    // $sql = "UPDATE `users` SET `content` = '$shoplist' WHERE `username` = '$_SESSION["username"]'";
    $sql = "UPDATE `users` SET `content` = '$shoplist' WHERE `username` = '$username'";
    //conuntdone
    $result = mysqli_query($link,$sql);
        if($result){
            $sql="DELETE FROM `pullshopcar`";
            $result = mysqli_query($link,$sql);
            echo "交易完成";
        }
    }else{
        header("location:../index.php");
    }
}else{
    echo "交易失敗 請登入會員";
}
    
    
?>
<a href="../index.php">回首頁</a>
</body>
</html>