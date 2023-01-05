
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
    $username=$_SESSION["username"];
    $buyname=$_POST["buyname"];
    $buycount=$_POST["buycount"];
    $buycommodity=$_POST["buycommodity"];
    $shoplist="會員:"."$username"."商品名稱:"."$buyname"."$buycount"."元";
    echo "$shoplist";
    //data
    require_once('config.php');
    //
    
    // echo "$_SESSION["username"]";
    // $sql = "UPDATE `users` SET `content` = '$shoplist' WHERE `username` = '$_SESSION["username"]'";
    $sql = "UPDATE `users` SET `content` = '$shoplist' WHERE `username` = '$username'";
    //conuntdone
    $result = mysqli_query($link,$sql);
    if($result){
        echo "交易完成";
    }
}else{
    echo "交易失敗 請登入會員";
}
?>
<a href="../index.php">回首頁</a>
</body>
</html>