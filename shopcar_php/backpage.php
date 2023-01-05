
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
// if(isset($_POST["name"])){
    //  $arr1 = [
    //     "線材",
    //     "延長線",
    //     "USBHUB",
    //     "週邊",
    //     "充電",
    //     "電池"
    // ];
    // $arr2 = [
    //     39,
    //     39,
    //     399,
    //     510,
    //     365,
    //     299
    // ];
    // $arr3=[
    //     "電玩遊戲",
    //     "Nintendo",
    //     "PlayStation",
    //     "Xbox",
    //     "遊戲週邊",
    //     "攝影機",
    //     "空拍機",
    //     "數位相機類單",
    //     "相機鏡頭",
    //     "微單眼",
    //     "單眼相機",
    //     "鏡頭濾鏡",
    //     "防潮箱",
    //     "相機專業配件",
    //     "專業攝影腳架",
    //     "家用清潔",
    //     "臉部清潔",
    //     "醫療用品",
    //     "寵物食品",
    //     "貓狗罐頭",
    //     "貓砂用品",
    //     "健身",
    //     "智慧錶",
    //     "護具球具",
    //     "水上器材",
    //     "露營野炊",
    //     "登山戶外",
    //     "雨具  ",
    //     "票券",
    //     "專櫃保養",
    //     "專櫃彩妝",
    //     "醫美保養",
    //     "開架保養",
    //     "彩妝美甲",
    //     "日韓美妝",
    //     "美材工具",
    //     "沙龍髮品",
    //     "髮妝造型",
    //     "香水",
    //     "香氛美體",
    //     "草本品牌",
    //     "手工香氛皂",
    //     "精油擴香",
    //     "男士保養",
    //     "飲料",
    //     "礦泉水",
    //     "零食",
    //     "團購",
    //     "沖泡",
    //     "咖啡"
    // ];
    $arr4=[
        "麥片",
        "茶葉",
        "奶粉",
        "甜點蔬果",
        "生鮮",
        "進口零食",
        "進口飲料",
        "進口沖調",
        "進口食材",
        "中文書",

        "簡體書",
        "外文書",
        "工具書",
        "雜誌",
        "電子書",
        "電子音樂",
        "運動鞋",
        "運動服",
        "機能服",
        "休閒服",

        "服飾",
        "電腦包",
        "男包",
        "女包",
        "鞋款",
        "鞋材",
        "內著",
        "票証",
        "售票",
        "教學軟體",

        "文書軟體",
        "各式字型"
    ];
    // $name=$_POST["name"];
// echo $name;
    // $price=$_POST["price"];
// echo $price;
//     $introduce=$POST["introduce"];
// echo $introduce;
for($i=0;$i<32;$i++){
// $name=$arr1[$i];
// $price=$arr2[$i];
$name=$arr4[$i];
    require_once('config.php'); 
    // $sql="INSERT INTO `commoditys` (`commodityname`,`commodityPrice`) VALUES('$name','$price')";
    $sql="INSERT INTO `commoditys` (`commodityname`) VALUES('$name')";

    $result = mysqli_query($link,$sql);
        if($result){
            $result = mysqli_query($link,$sql);
            echo "交易完成";
        }else{
            echo "交易失敗 請登入會員";
        }
    }

    
    
?>
<a href="../index.php">回首頁</a>
</body>
</html>