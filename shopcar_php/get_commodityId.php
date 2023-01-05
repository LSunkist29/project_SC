<?php
session_start();
// $_SESSION['nowbuy']=false;
$_SESSION['id']=0;

$p="index";
$id=1;

if(isset($_GET['p'])){
    $p = $_GET['p'];
    $id=$_GET['id'];
}
$sql="SELECT * FROM `commoditys` WHERE `id` = '$id'";
$result = mysqli_query($link,$sql);
// echo $result;
// print_r($result);
// echo $result;
if ($result) {
    // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
    if (mysqli_num_rows($result)>0) {
        // 取得大於0代表有資料
        // while迴圈會根據資料數量，決定跑的次數
        // mysqli_fetch_assoc方法可取得一筆值
        while ($row = mysqli_fetch_assoc($result)) {
            // 每跑一次迴圈就抓一筆值，最後放進data陣列中
            $datas[] = $row;
        }
        // echo "你查找的商品!!:".$datas."<br>";
        // echo "<hr>";
        // echo "為你顯示商品"."<br>";
        foreach($datas as $datass){
            //    echo $datass["id"]."產品名稱:".$datass["commodityname"]."/價格:".$datass["commodityPrice"]."元"."/簡介:".$datass["commodityintroduce"]."<br>";

        }
    }else{
    // 釋放資料庫查到的記憶體
    // mysqli_free_result($result);
    // echo $datas;
    // print_r($datas);
    // $datas=json_encode($datas);
    // foreach ($datas as $score) {
    //     echo"$score";
    // }
   
    // echo $datass[0]["id"]."產品名稱:".$datass[0]["commodityname"]."/價格:".$datass[0]["commodityPrice"]."元"."/簡介:".$datass[0]["commodityintroduce"];

        $sql = "SELECT * FROM `commoditys` WHERE `id` = $id";
        $result = mysqli_query($link,$sql);
        if (mysqli_num_rows($result)>0) {
            // 取得大於0代表有資料
            // while迴圈會根據資料數量，決定跑的次數
            // mysqli_fetch_assoc方法可取得一筆值
            while ($row = mysqli_fetch_assoc($result)) {
                // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                $datas[] = $row;
            }
        }
    // 釋放資料庫查到的記憶體
    // mysqli_free_result($result);
    // echo $datas;
    // print_r($datas);
    // $datas=json_encode($datas);
    // foreach ($datas as $score) {
    //     echo"$score";
    // }
        // echo "你查找的商品??:".$datas."<br>";
        // echo "查無此商品"."<br>";
        // echo "<hr>";
        // echo "為你顯示網站商品"."<br>";
        foreach($datas as $datass){
                    echo $datass["id"]."產品名稱:".$datass["commodityname"]."/價格:".$datass["commodityPrice"]."元"."/簡介:".$datass["commodityintroduce"]."<br>";
        }
    }
}else{
//     if($result){
//         echo "交易完成";
    echo "交易失敗 請登入會員";
}
?>

<?php 
//  function delLIST(a){
//     $id=a;
//     $sql="DELETE FROM `pullshopcar` WHERE `id` = $id";

//     $result = mysqli_query($link,$sql);

//     if ($result){
//         echo "刪除成功";
//     }else{
//         echo "刪除失敗";
//     }
//  }
?>