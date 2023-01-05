<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
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
    require_once('config.php'); 
    $id=$_GET['id'];
    $sql="DELETE FROM `pullshopcar` WHERE `id` = $id";

    $result = mysqli_query($link,$sql);
  
    if ($result){
        echo "您選擇購物車商品品項,已刪除成功";
    }else{
        echo "您選擇購物車商品品項,已刪除失敗";
    }
?>
<br>
<a href="../index.php">回首頁</a>
</body>
</html>