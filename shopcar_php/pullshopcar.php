
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
    $buyname=$_POST["buyname"];//名字
    $buycount=$_POST["buycount"];//價錢
    $buycount=substr( $buycount,1);
    $buycommodity1=$_POST["buycommodity1"];//數量
    $total=$buycount * $buycommodity1;
    // echo $buyname."-".$buycount."-".$buycommodity1."-".$total;
    $sw=$_POST["switch"];
    // $page=$_SESSION["page"];
    
    $totalvalue=$buyname.$buycount."*".$buycommodity1."=".$total;

    require_once('config.php');
    

        $sql = " INSERT INTO `pullshopcar`(`commodityName`, `commodityPrice`,`count`,`total`) VALUES ('$buyname','$buycount','$buycommodity1','$total')";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "已將商品放至購物車";
            $_SESSION["stand"]="block";
        }else{echo "放入購物車交易未完成";}
    
    
}else{
  header("Location: http://localhost/shopweb/shopcar_php/index_login.php");
}
?>
<h6><a href="../index.php">回首頁</a></h6></div>

</body>
<style>
    body{
        text-align:left;
    }
    .box{
        width:200px;
        margin:0 auto;
        margin-top:100px;
    }

    a{
      color:orange;
      text-decoration: none;
    }
</style>
</html>