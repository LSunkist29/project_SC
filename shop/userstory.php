<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    $username=$_SESSION['username'];
    require_once('../shopcar_php/config.php');
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            $datas=array();
            $sql="SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($link,$sql);
                // 如果有資料
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
    }
    // 釋放資料庫查到的記憶體
    mysqli_free_result($result);
}
else {
    echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
}
// 處理完後印出資料
if(!empty($result)){
    // 如果結果不為空，就利用print_r方法印出資料
    // print_r($datas);
}
else {
    // 為空表示沒資料
    echo "查無資料";
}

        }
        
        
        mysqli_close($link);
    ?>
<div class="wrap">
<!-- <h3>foreach列出查詢結果</h3> -->
<h3 class="h3_style">會員資料</h3>
<div>
<?php if(!empty($datas)): ?>
<ul>
<!-- 資料 as key(下標) => row(資料的row) -->
<?php foreach ($datas as $key => $row) :?>
<li>

<!-- 第<?php echo($key +1 ); ?> 筆資料， -->
<h5 class="text_sytle">會員名字:<?php echo $row['username'];?></h5>
<h5 class="text_sytle">購買資料:<?php echo $row['content'];?></h5>
</li>
<?php endforeach; ?>
</ul>
<?php else:  ?>
查無資料
<?php endif; ?>
</div>
<!-- 代表結束連線 -->
<?php
// $link->close(); 
// mysqli_close($$result); 
?>
<button class="button_style" type="text"><a href="../index.php">回首頁</a></button>
</div>
</body>
<style>
*{
    margin:0;
    padding:0;
    list-style: none;
    text-decoration:none;
    
}
body{
    background-color: orange;
}
.wrap{
    position: relative;
    background-color:#fff;
    width:500px;
    margin:0 auto;
    margin-top:50px;
    padding:50px;
    padding-bottom:150px; 
    border:1px solid gray;
}
.h3_style{
    margin-bottom:30px;
}
.text_sytle{
    margin:5px auto;
}
.button_style{
   position:absolute;
   bottom:25px;
   right:55px;
}
</style>
</html>