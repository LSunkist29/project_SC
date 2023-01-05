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

require_once('shopcar_php/config.php');
   
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
                        // echo $datass["id"]."產品名稱:".$datass["commodityname"]."/價格:".$datass["commodityPrice"]."元"."/簡介:".$datass["commodityintroduce"]."<br>";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/shop_page_style.css">
    <script src="jquery.js"></script>
    
</head>
<style>
    .list_style{
        display:none;
        position: absolute;
        top:35px;
        left:-30px;
        width:80px;
        background:rgb(149, 234, 205);
        text-align:center;
    }
</style>
<body>
    <!-- 1 -->

    <body>
        <!-- 1.logo search login register shopcar -->
        <header class="header w">
            <!-- logo_area -->
            <div class="logo">
                <h1>
                    <a href="index.php" title="網站名稱">網站名稱</a>
                </h1>
            </div>
            <!-- serch_area -->
            <div class="search">
                <form action="shopcar_php/search_page.php" method="post">
                    <input type="search" name="searchc" id="" placeholder="搜尋商品" onfocus="this.placeholder='';" onBlur="this.placeholder='搜尋商品';">
                    <button type="submit" class="search_button"><span></span></button>
                </form>
            </div>
            <!-- usertools_area -->
            <div class="usertools">
                <ul class="usertools_list">
                    <li id="username"></li>
                    <li id="userarea" class="userarea"><a href="../shopweb/shop/userstory.php">會員專區</a></li>
                    <li id="logout" class="userarea"><a href="shopcar_php/logout.php" onclick="loghide();">登出</a></li>
                    <li id="loginfasle" class="login_regi"><a href="shopcar_php/index_login.php">登入</a></li>
                    <li id="registerfasle" class="login_regi"><a href="shopcar_php/register.html">註冊</a></li>
                    <li class="newbox" onclick="shopcar_show('block');"><a href="javascript:;">購物車<span></span></a>
                        <div class="shopcar_new" id="shopcar_new">new<span class="triangle"></span></div>
                    </li>
                    <form action="shopcar_php/settlement_query.php" method="post">
                        <div class="in_shopcar" id="in_shopcar_id">
                            <div>
                                <h3>購物車清單 </h3><span onclick="shopcar_show('none');">X</span>
                            </div>
                            <hr>
                            <div id="in_shopcar_content">
                                <!-- 購物車start -->
                                <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                $datas=array();
                                $sql1="SELECT * FROM `pullshopcar`";
                                $result1 = mysqli_query($link,$sql1);
                                // 如果有資料
                                if ($result1) {
                                // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
                                if (mysqli_num_rows($result1)>0) {
                                    // 取得大於0代表有資料
                                    // while迴圈會根據資料數量，決定跑的次數
                                    // mysqli_fetch_assoc方法可取得一筆值
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                                        $datas1[] = $row1;
                                    }
                                }
                                // 釋放資料庫查到的記憶體
                                mysqli_free_result($result1);
                                }
                                else {
                                echo "{$sql1} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
                                }
                                // 處理完後印出資料
                                if(!empty($result1)){
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
                                <div>
                                <!-- <h3>foreach列出查詢結果</h3> -->
                                <div>
                                <?php if(!empty($datas1)): ?>
                                <ul id="data_all_h5">
                                <!-- 資料 as key(下標) => row(資料的row) -->
                                <?php foreach ($datas1 as $key1 => $row1) :?>
                                <li id="data_all_h5">
                                <!-- 第<?php echo($key1 +1 ); ?> 筆資料， -->
                                <h5 class="text_sytle"><?php echo $row1['commodityName'].$row1['commodityPrice']."*".$row1['count']."="?><i><?php echo $row1['total'];?></i><i>元</i><a href="./shopcar_php/del_list.php?id=<?php echo $row1['id'];?>">刪除</a></h5>
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
                                <!-- 購物車end -->
                            </div>
                            <input type="hidden" name="content_value" id="in_shopcar_content_input" value="">
                            <hr>
                            <div>總額:
                                <span id="shopcar_sound">0</span>
                                <input type="hidden" name="sound_value" id="shopcar_sound_input" value="">
                                <span>元</span>
                            </div>
                            <input type="hidden" name="username1" value="" id="username1">
                            <button id="countpush" onclick="shopcar_count();" type="submit">結算</button>
                            <!-- <div onclick="shopcar_count();">點me</div> -->

                            <!-- <button class="settlement" onclick="settlement();">結算</button> -->
                        </div>
                    </form>
                </ul>
            </div>
            <div class="clear_float"></div>
        </header>
        <!-- 2.commodity_list -->
        <div class="commodity w">
            <ul id="commodity_list" class="commodity_list">
                <li style="position: relative;"><a href="#" title="3C">3C</a><dl class="list_style">
                    <dd><a href="?p=shop&id=522" onclick="<?php $_SESSION['shopid']="522";?>">液晶螢幕</a></dd>
                    <dd><a href="?p=shop&id=523" onclick="<?php $_SESSION['shopid']="523";?>">硬碟</a></dd>
                    <dd><a href="?p=shop&id=524" onclick="<?php $_SESSION['shopid']="524";?>">記憶體</a></dd>
                </dl></li>
                <li style="position: relative;"><a href="#" title="週邊">週邊</a><dl class="list_style">
                    <dd><a href="?p=shop&id=525" onclick="<?php $_SESSION['shopid']="525";?>">滑鼠</a></dd>
                    <dd><a href="?p=shop&id=526" onclick="<?php $_SESSION['shopid']="526";?>">鍵盤</a></dd>
                    <dd><a href="?p=shop&id=527" onclick="<?php $_SESSION['shopid']="527";?>">喇叭</a></dd>
                </dl></li>
                <li style="position: relative;"><a href="#" title="NB">NB   </a><dl class="list_style">
                    <dd><a href="?p=shop&id=501" onclick="<?php $_SESSION['shopid']="501";?>">筆記型電腦</a></dd>
                    <dd><a href="?p=shop&id=502" onclick="<?php $_SESSION['shopid']="502";?>">商用筆記</a></dd>
                    <dd><a href="?p=shop&id=503" onclick="<?php $_SESSION['shopid']="503";?>">電競筆記</a></dd>
                </dl></li>
                <li  style="position: relative;"><a href="#" title="通訊">通訊</a><dl class="list_style">
                    <dd><a href="?p=shop&id=504" onclick="<?php $_SESSION['shopid']="504";?>">手機</a></dd>
                    <dd><a href="?p=shop&id=505" onclick="<?php $_SESSION['shopid']="505";?>">行動電源</a></dd>
                    <dd><a href="?p=shop&id=506" onclick="<?php $_SESSION['shopid']="506";?>">耳機</a></dd>
                </dl></li>
                <li  style="position: relative;"><a href="#" title="數位">數位</a><dl class="list_style">
                    <dd><a href="?p=shop&id=507" onclick="<?php $_SESSION['shopid']="507";?>">電玩</a></dd>
                    <dd><a href="?p=shop&id=508" onclick="<?php $_SESSION['shopid']="508";?>">攝影</a></dd>
                    <dd><a href="?p=shop&id=509" onclick="<?php $_SESSION['shopid']="509";?>">音訊</a></dd>
                </dl></li>
                <li  style="position: relative;"><a href="#" title="家電">家電</a><dl class="list_style">
                    <dd><a href="?p=shop&id=510" onclick="<?php $_SESSION['shopid']="510";?>">電視</a></dd>
                    <dd><a href="?p=shop&id=511" onclick="<?php $_SESSION['shopid']="511";?>">廚房家電</a></dd>
                    <dd><a href="?p=shop&id=512" onclick="<?php $_SESSION['shopid']="512";?>">冷暖空調</a></dd>
                </dl></li>
                <li  style="position: relative;"><a href="#" title="日用">日用</a><dl class="list_style">
                    <dd><a href="?p=shop&id=513" onclick="<?php $_SESSION['shopid']="513";?>">衛生紙</a></dd>
                    <dd><a href="?p=shop&id=514" onclick="<?php $_SESSION['shopid']="514";?>">家用清潔</a></dd>
                    <dd><a href="?p=shop&id=515" onclick="<?php $_SESSION['shopid']="515";?>">天然有機</a></dd>
                </dl></li>
                <li  style="position: relative;"><a href="#" title="食品">食品</a><dl class="list_style">
                    <dd><a href="?p=shop&id=516" onclick="<?php $_SESSION['shopid']="516";?>">食材</a></dd>
                    <dd><a href="?p=shop&id=517" onclick="<?php $_SESSION['shopid']="517";?>">熟食</a></dd>
                    <dd><a href="?p=shop&id=518" onclick="<?php $_SESSION['shopid']="518";?>">飲料</a></dd>
                </dl></li>
                <li  style="position: relative;"><a href="#" title="生活">生活</a><dl class="list_style">
                    <dd><a href="?p=shop&id=519" onclick="<?php $_SESSION['shopid']="519";?>">餐廚</a></dd>
                    <dd><a href="?p=shop&id=520" onclick="<?php $_SESSION['shopid']="520";?>">寢具</a></dd>
                    <dd><a href="?p=shop&id=521" onclick="<?php $_SESSION['shopid']="521";?>">修繕</a></dd>
                </dl></li>
            </ul>
        </div>
        <div>
        <!-- shop_content_area -->
        <!-- <div class="shoplist w">
            <span><a href="index.php">>>>返回首頁</a></span>
            <span>選購商品至購物車</span>
            <span onclick="getcommodity('01_01');"><a href="script:;"> ● 餐邊櫃</a></span>
            <span onclick="getData2(); "><a href="script:;"> ● 餐桌椅</a></span>
        </div> -->
        <!-- <hr class="w"> -->

        <?php if($p==="index"):?>
        <div id="content" class="w">
            <!-- 3.special offer countdown.SlideshowPic. -->
            <div class="SOCSP w">
                <div class="SOC">
                    <div class="soc_list1" title="全自動咖啡機" style=" cursor: crosshair;">
                        <div class="soclist_banner">限時特賣<span id="time" class="otime"></span></div>
                        <div class="soclist_img">
                            <img src="images/倒數特賣1.png" alt="特賣">
                        </div>
                        <div class="soclist_text">
                            <h6>全自動咖啡機</h6>
                            <h6>直覺式操作面板，一鍵享用咖啡</h6>
                            <span>$34900</span>
                        </div>
                    </div>
                    <div class="soc_list2" title="仿手沖咖啡機" style=" cursor: crosshair;">
                        <div class="soclist_banner">限時特賣<span id="time1" class="otime"></span></div>
                        <div class="soclist_img">
                            <img src="images/倒數特賣2.png" alt="特賣">
                        </div>
                        <div class="soclist_text">
                            <h6>自動仿手沖美式咖啡機</h6>
                            <h6>設定時間，自動沖煮</h6>
                            <span>$5990</span>
                        </div>
                    </div>
                </div>
                <div class="SP">
                    <div class="big-box">
                        <div class="wrap">
                            <ul class="img-list">
                                <li><img src="images/c_1.png" alt=""></li>
                                <li><img src="images/c_2.png" alt=""></li>
                                <li><img src="images/c_3.png" alt=""></li>
                                <li><img src="images/c_4.png" alt=""></li>
                            </ul>
                        </div>

                        <a class="left-f" href="javascript:;">◁</a>
                        <ul class="link">
                            <!-- <li><a href="#">●</a></li> -->
                        </ul>
                        <a class="right-f" href="javascript:;">▷</a>
                    </div>
                </div>
            </div>
            <!-- nav模塊制作 -->
            <!-- 4.Categories -->
            <div class="Categories_CategoriesList w">
                <nav class="nav">
                    <div class="dropdown">
                        <div class="dt">全部商品分類</div>
                        <!-- 左邊選擇列表 -->
                        <div class="dd">
                            <ul class="nav_list">
                                <li><a href="#">家電</a>.<a href="#">廚房用品</a>
                                    <ul class="dropdown_dd_li_right">
                                        <li><a href="?p=shop&id=1" onclick="<?php $_SESSION['shopid']="1";?>">冰箱</a><a href="?p=shop&id=2" onclick="<?php $_SESSION['shopid']="2";?>">平底鍋</a><a href="?p=shop&id=3" onclick="<?php $_SESSION['shopid']="3";?>">榨汁機</a><a href="?p=shop&id=4" onclick="<?php $_SESSION['shopid']="4";?>">吸塵器</a></li>
                                        <li><a href="?p=shop&id=5" onclick="<?php $_SESSION['shopid']="5";?>">液晶電視</a><a href="?p=shop&id=6" onclick="<?php $_SESSION['shopid']="6";?>">電風扇</a><a href="?p=shop&id=7" onclick="<?php $_SESSION['shopid']="7";?>">電暖器</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">手機</a>.<a href="#">通訊</a>
                                    <ul class="dropdown_dd_li_right">
                                        <li><a href="?p=shop&id=8" onclick="<?php $_SESSION['shopid']="8";?>">智慧型手機</a><a href="?p=shop&id=9" onclick="<?php $_SESSION['shopid']="9";?>">手機平板</a><a href="?p=shop&id=10" onclick="<?php $_SESSION['shopid']="10";?>">平板電腦</a></li>
                                        <li><a href="?p=shop&id=11" onclick="<?php $_SESSION['shopid']="11";?>">一般手機</a> <a href="?p=shop&id=12" onclick="<?php $_SESSION['shopid']="12";?>">充電</a> <a href="?p=shop&id=13" onclick="<?php $_SESSION['shopid']="13";?>">傳輸</a> <a href="?p=shop&id=14" onclick="<?php $_SESSION['shopid']="14";?>">手機線材</a></li>
                                        <li><a href="?p=shop&id=15" onclick="<?php $_SESSION['shopid']="15";?>">行動電源</a><a href="?p=shop&id=16" onclick="<?php $_SESSION['shopid']="16";?>">手機平板配件</a> <a href="?p=shop&id=17" onclick="<?php $_SESSION['shopid']="17";?>">藍牙耳機</a></li>
                                        <li><a href="?p=shop&id=18" onclick="<?php $_SESSION['shopid']="18";?>">智慧穿戴/錶</a><a href="?p=shop&id=19" onclick="<?php $_SESSION['shopid']="19";?>">自拍</a><a href="?p=shop&id=20" onclick="<?php $_SESSION['shopid']="20";?>">旅遊上網卡</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">電腦</a>.<a href="#">3C</a>.<a href="#">辦公用品</a>
                                    <ul class="dropdown_dd_li_right">
                                        <li><a href="?p=shop&id=21" onclick="<?php $_SESSION['shopid']="21";?>">滑鼠</a><a href="?p=shop&id=22" onclick="<?php $_SESSION['shopid']="22";?>">鍵盤</a><a href="?p=shop&id=23" onclick="<?php $_SESSION['shopid']="23";?>">喇叭</a><a href="?p=shop&id=24" onclick="<?php $_SESSION['shopid']="24";?>">耳機</a></li>
                                        <li><a href="?p=shop&id=25" onclick="<?php $_SESSION['shopid']="25";?>">麥克風</a><a href="?p=shop&id=26" onclick="<?php $_SESSION['shopid']="26";?>">線材</a><a href="?p=shop&id=27" onclick="<?php $_SESSION['shopid']="27";?>">延長線</a><a href="?p=shop&id=28" onclick="<?php $_SESSION['shopid']="28";?>">USB HUB </a></li>
                                        <li><a href="?p=shop&id=29" onclick="<?php $_SESSION['shopid']="29";?>">週邊</a><a href="?p=shop&id=30" onclick="<?php $_SESSION['shopid']="30";?>">充電</a><a href="?p=shop&id=31" onclick="<?php $_SESSION['shopid']="31";?>">電池</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">電玩</a>.<a href="#">玩具</a>
                                    <ul class="dropdown_dd_li_right">
                                        <li><a href="?p=shop&id=33" onclick="<?php $_SESSION['shopid']="33";?>">電玩遊戲</a><a href="?p=shop&id=34" onclick="<?php $_SESSION['shopid']="34";?>">Nintendo</a><a href="?p=shop&id=35" onclick="<?php $_SESSION['shopid']="35";?>">PlayStation</a>
                                        </li>
                                        <li> <a href="?p=shop&id=36" onclick="<?php $_SESSION['shopid']="36";?>">Xbox</a>
                                            <a href="?p=shop&id=37" onclick="<?php $_SESSION['shopid']="37";?>">遊戲週邊</a>
                                            <a href="?p=shop&id=38" onclick="<?php $_SESSION['shopid']="38";?>">攝影機</a>
                                            <a href="?p=shop&id=39" onclick="<?php $_SESSION['shopid']="39";?>">空拍機</a></li>

                                        <li>
                                            <a href="?p=shop&id=40" onclick="<?php $_SESSION['shopid']="40";?>">數位相機類單</a>
                                            <a href="?p=shop&id=41" onclick="<?php $_SESSION['shopid']="41";?>">相機鏡頭</a>
                                            <a href="?p=shop&id=42" onclick="<?php $_SESSION['shopid']="42";?>">微單眼</a>
                                        </li>

                                        <li> <a href="?p=shop&id=43" onclick="<?php $_SESSION['shopid']="43";?>">單眼相機</a>
                                            <a href="?p=shop&id=44" onclick="<?php $_SESSION['shopid']="44";?>">鏡頭濾鏡</a>
                                            <a href="?p=shop&id=45" onclick="<?php $_SESSION['shopid']="45";?>">防潮箱</a></li>
                                        <li> <a href="?p=shop&id=46" onclick="<?php $_SESSION['shopid']="46";?>">相機專業配件</a>
                                            <a href="?p=shop&id=47" onclick="<?php $_SESSION['shopid']="47";?>">專業攝影腳架</a>
                                    </ul>
                                    </li>
                                    <li><a href="#">生活</a>.<a href="#">寵物</a><a href="#">日用品</a>
                                        <ul class="dropdown_dd_li_right">
                                            <li><a href="?p=shop&id=48" onclick="<?php $_SESSION['shopid']="48";?>">家用清潔</a>
                                                <a href="?p=shop&id=49" onclick="<?php $_SESSION['shopid']="49";?>">臉部清潔</a>
                                                <a href="?p=shop&id=50" onclick="<?php $_SESSION['shopid']="50";?>">醫療用品</a></li>
                                            <li>
                                                <a href="?p=shop&id=51" onclick="<?php $_SESSION['shopid']="51";?>">寵物食品</a>
                                                <a href="?p=shop&id=52" onclick="<?php $_SESSION['shopid']="52";?>">貓狗罐頭</a>
                                                <a href="?p=shop&id=53" onclick="<?php $_SESSION['shopid']="53";?>">貓砂用品</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">休閒</a>.<a href="#">旅遊</a>
                                        <ul class="dropdown_dd_li_right">
                                            <li><a href="?p=shop&id=54" onclick="<?php $_SESSION['shopid']="54";?>">健身</a>
                                                <a href="?p=shop&id=55" onclick="<?php $_SESSION['shopid']="55";?>">智慧錶</a>
                                                <a href="?p=shop&id=56" onclick="<?php $_SESSION['shopid']="56";?>">護具球具</a>
                                            </li>
                                            <li>
                                                <a href="?p=shop&id=57" onclick="<?php $_SESSION['shopid']="57";?>">水上器材</a>
                                                <a href="?p=shop&id=58" onclick="<?php $_SESSION['shopid']="58";?>">露營野炊</a>
                                                <a href="?p=shop&id=59" onclick="<?php $_SESSION['shopid']="59";?>">登山戶外</a>
                                            </li>
                                            <li>
                                                <a href="?p=shop&id=60" onclick="<?php $_SESSION['shopid']="60";?>">雨具</a>
                                                <a href="?p=shop&id=61" onclick="<?php $_SESSION['shopid']="61";?>">票券</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">保養</a>.<a href="#">美妝</a>.<a href="#">洗沐</a>.<a href="#">香氛</a>
                                        <ul class="dropdown_dd_li_right">
                                            <li><a href="?p=shop&id=62" onclick="<?php $_SESSION['shopid']="62";?>">專櫃保養</a>
                                                <a href="?p=shop&id=63" onclick="<?php $_SESSION['shopid']="63";?>">專櫃彩妝</a>
                                                <a href="?p=shop&id=64" onclick="<?php $_SESSION['shopid']="64";?>">醫美保養</a></li>

                                            <li><a href="?p=shop&id=65" onclick="<?php $_SESSION['shopid']="65";?>">開架保養</a>
                                                <a href="?p=shop&id=66" onclick="<?php $_SESSION['shopid']="66";?>">彩妝美甲</a>
                                                <a href="?p=shop&id=67" onclick="<?php $_SESSION['shopid']="67";?>">日韓美妝</a></li>

                                            <li>
                                                <a href="?p=shop&id=68" onclick="<?php $_SESSION['shopid']="68";?>">美材工具</a>
                                                <a href="?p=shop&id=69" onclick="<?php $_SESSION['shopid']="69";?>">沙龍髮品</a>
                                                <a href="?p=shop&id=70" onclick="<?php $_SESSION['shopid']="70";?>">髮妝造型</a>
                                            </li>

                                            <li><a href="?p=shop&id=71" onclick="<?php $_SESSION['shopid']="71";?>">香水</a>
                                                <a href="?p=shop&id=72" onclick="<?php $_SESSION['shopid']="72";?>">香氛美體</a>
                                                <a href="?p=shop&id=73" onclick="<?php $_SESSION['shopid']="73";?>">草本品牌</a></li>

                                            <li>
                                                <a href="?p=shop&id=74" onclick="<?php $_SESSION['shopid']="74";?>">手工香氛皂</a>
                                                <a href="?p=shop&id=75" onclick="<?php $_SESSION['shopid']="75";?>">精油擴香</a>
                                                <a href="?p=shop&id=76" onclick="<?php $_SESSION['shopid']="76";?>">男士保養</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">食品</a>.<a href="#">酒類</a>.<a href="#">零食</a>.<a href="#">生鮮</a>
                                        <ul class="dropdown_dd_li_right">
                                            <li> <a href="?p=shop&id=77" onclick="<?php $_SESSION['shopid']="77";?>">飲料</a>
                                                <a href="?p=shop&id=78" onclick="<?php $_SESSION['shopid']="78";?>">礦泉水</a>
                                                <a href="?p=shop&id=79" onclick="<?php $_SESSION['shopid']="79";?>">零食</a>
                                                <a href="?p=shop&id=80" onclick="<?php $_SESSION['shopid']="80";?>">團購</a></li>
                                            <li> <a href="?p=shop&id=81" onclick="<?php $_SESSION['shopid']="81";?>">沖泡</a>
                                                <a href="?p=shop&id=82" onclick="<?php $_SESSION['shopid']="82";?>">咖啡</a>
                                                <a href="?p=shop&id=83" onclick="<?php $_SESSION['shopid']="83";?>">麥片</a>
                                                <a href="?p=shop&id=84" onclick="<?php $_SESSION['shopid']="84";?>">茶葉</a>
                                                <a href="?p=shop&id=85" onclick="<?php $_SESSION['shopid']="85";?>">奶粉</a></li>
                                            <li>
                                                <a href="?p=shop&id=86" onclick="<?php $_SESSION['shopid']="86";?>">甜點蔬果</a>
                                                <a href="?p=shop&id=87" onclick="<?php $_SESSION['shopid']="87";?>">生鮮</a>
                                                <a href="?p=shop&id=88" onclick="<?php $_SESSION['shopid']="88";?>">進口零食</a></li>
                                            <li><a href="?p=shop&id=89" onclick="<?php $_SESSION['shopid']="89";?>">進口飲料</a>
                                                <a href="?p=shop&id=90" onclick="<?php $_SESSION['shopid']="90";?>">進口沖調</a>
                                                <a href="?p=shop&id=91" onclick="<?php $_SESSION['shopid']="91";?>">進口食材</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">圖書</a>.<a href="#">音樂</a>.<a href="#">電子書</a>
                                        <ul class="dropdown_dd_li_right">
                                            <li><a href="?p=shop&id=92" onclick="<?php $_SESSION['shopid']="92";?>">中文書</a>
                                                <a href="?p=shop&id=93" onclick="<?php $_SESSION['shopid']="93";?>">簡體書</a>
                                                <a href="?p=shop&id=94" onclick="<?php $_SESSION['shopid']="94";?>">外文書</a>
                                                <a href="?p=shop&id=95" onclick="<?php $_SESSION['shopid']="95";?>">工具書</a></li>
                                            <li> <a href="?p=shop&id=96" onclick="<?php $_SESSION['shopid']="96";?>">雜誌</a>
                                                <a href="?p=shop&id=97" onclick="<?php $_SESSION['shopid']="97";?>">電子書</a>
                                                <a href="?p=shop&id=98" onclick="<?php $_SESSION['shopid']="98";?>">電子音樂</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">服飾</a>.<a href="#">運動服飾</a>.<a href="#">鞋子</a>
                                        <ul class="dropdown_dd_li_right">
                                            <li><a href="?p=shop&id=99" onclick="<?php $_SESSION['shopid']="99";?>">運動鞋</a>
                                                <a href="?p=shop&id=100" onclick="<?php $_SESSION['shopid']="100";?>">運動服</a>
                                                <a href="?p=shop&id=101" onclick="<?php $_SESSION['shopid']="101";?>">機能服</a>
                                                <a href="?p=shop&id=102" onclick="<?php $_SESSION['shopid']="102";?>">休閒服</a></li>
                                            <li><a href="?p=shop&id=103" onclick="<?php $_SESSION['shopid']="103";?>">服飾</a>
                                                <a href="?p=shop&id=104" onclick="<?php $_SESSION['shopid']="104";?>">電腦包</a>
                                                <a href="?p=shop&id=105" onclick="<?php $_SESSION['shopid']="105";?>">男包</a>
                                                <a href="?p=shop&id=106" onclick="<?php $_SESSION['shopid']="106";?>">女包</a>
                                                <a href="?p=shop&id=107" onclick="<?php $_SESSION['shopid']="107";?>">鞋款</a></li>
                                            <li> <a href="?p=shop&id=108" onclick="<?php $_SESSION['shopid']="108";?>">鞋材</a>
                                                <a href="?p=shop&id=109" onclick="<?php $_SESSION['shopid']="109";?>">內著</a>
                                        </ul>
                                        </li>
                                        <li><a href="#">票券</a>.<a href="#">加值</a>.<a href="#">軟體</a>
                                            <ul class="dropdown_dd_li_right">
                                                <li><a href="?p=shop&id=110" onclick="<?php $_SESSION['shopid']="110";?>">票証</a>
                                                    <a href="?p=shop&id=111" onclick="<?php $_SESSION['shopid']="111";?>">售票</a>
                                                    <a href="?p=shop&id=112" onclick="<?php $_SESSION['shopid']="112";?>">教學軟體</a>
                                                    <a href="?p=shop&id=113" onclick="<?php $_SESSION['shopid']="113";?>">文書軟體</a></li>
                                                <li>
                                                    <a href="?p=shop&id=114" onclick="<?php $_SESSION['shopid']="114";?>">各式字型</a>
                                                    <a href="?p=shop&id=115" onclick="<?php $_SESSION['shopid']="115";?>">防毒軟體</a>
                                                    <a href="?p=shop&id=116" onclick="<?php $_SESSION['shopid']="116";?>">繪圖軟體</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">戶外</a>.<a href="#">車類</a>.<a href='# '>修繕</a>
                                            <ul class="dropdown_dd_li_right">
                                                <li><a href="?p=shop&id=117" onclick="<?php $_SESSION['shopid']="117";?>">記錄器</a>
                                                    <a href="?p=shop&id=118" onclick="<?php $_SESSION['shopid']="118";?>">汽機車百貨</a>
                                                    <a href="?p=shop&id=119" onclick="<?php $_SESSION['shopid']="119";?>">單車百貨</a>
                                                </li>
                                                <li>
                                                    <a href="?p=shop&id=120" onclick="<?php $_SESSION['shopid']="120";?>">推車汽座</a>
                                                    <a href="?p=shop&id=121" onclick="<?php $_SESSION['shopid']="121";?>">車電</a>
                                                    <a href="?p=shop&id=122" onclick="<?php $_SESSION['shopid']="122";?>">輪胎</a>
                                                </li>
                                            </ul>
                                        </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- 中間列表 -->
                <div class="ListCategories">
                    <div class="tabsbox" id="tab">
                        <nav class="tab_menu">
                            <ul>
                                <li title="點我選擇頁面" class="liactive"><span style="cursor: pointer;">優惠活動</span><span class="iconfont icon-guanbi"></span></li>
                                <li title="點我選擇頁面"><span style="cursor: pointer;">假日特賣會</span><span class="iconfont icon-guanbi"></span></li>
                                <li title="點我選擇頁面"><span style="cursor: pointer;">精選好物</span><span class="iconfont icon-guanbi"></span></li>
                                <li title="點我選擇頁面"><span style="cursor: pointer;">時尚精品</span><span class="iconfont icon-guanbi"></span></li>
                                <li title="點我選擇頁面"><span style="cursor: pointer;">人氣美食</span><span class="iconfont icon-guanbi"></span></li>
                            </ul>
                            <!-- tabEdit -->
                            <!-- <div class="tabadd">
                    <span>+</span>
                </div> -->
                        </nav>
                        <!-- tab_menu -->
                        <div class="tabscon">
                            <section class="conactive">
                                <div>
                                <a href="?p=shop&id=201" onclick="<?php $_SESSION['shopid']="201";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>無線吸塵器</h6>
                                    <h6>輕量智能無線吸塵器</h6>
                                    <p>$1090</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=202" onclick="<?php $_SESSION['shopid']="202";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>竹炭衛生紙</h6>
                                    <h6>三層蓬厚，柔軟舒適</h6>
                                    <p>$129</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=203" onclick="<?php $_SESSION['shopid']="203";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>虛擬手環</h6>
                                    <h6>無限傳奇主題app</h6>
                                    <p>$2880</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=204" onclick="<?php $_SESSION['shopid']="204";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>JUICE果汁筆皮卡丘套裝</h6>
                                    <h6>正常色系顏色/柔色系顏色</h6>
                                    <p>$399</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=205" onclick="<?php $_SESSION['shopid']="205";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>A6隨手筆記本</h6>
                                    <h6>含觸控原子筆</h6>
                                    <p>$1480</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=206" onclick="<?php $_SESSION['shopid']="206";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>置物整理收納盒</h6>
                                    <h6>有上下兩層，可旋開使用</h6>
                                    <p>$408</p>
                                </a>
                                </div>
                            </section>
                            <section>
                                <div>
                                <a href="?p=shop&id=207" onclick="<?php $_SESSION['shopid']="207";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>500元禮券</h6>
                                    <h6>餘額型</h6>
                                    <p>$500</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=208" onclick="<?php $_SESSION['shopid']="208";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>小泡芙巧克力</h6>
                                    <h6>最暢銷泡芙系列</h6>
                                    <p>$105</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=209" onclick="<?php $_SESSION['shopid']="209";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>氣泡水</h6>
                                    <h6>礦泉水中的香檳</h6>
                                    <p>$599</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=210" onclick="<?php $_SESSION['shopid']="210";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>小精靈LED檯燈</h6>
                                    <h6>一鍵觸控三段調光設計</h6>
                                    <p>$990</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=211" onclick="<?php $_SESSION['shopid']="211";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>清爽洗髮露</h6>
                                    <h6>蘊含『維他命E、C、F與小麥蛋白』</h6>
                                    <p>2399</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=212" onclick="<?php $_SESSION['shopid']="212";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>小樹香片</h6>
                                    <h6>適用於車內、家庭、辦公室</h6>
                                    <p>$51</p>
                                </a>
                                </div>
                            </section>
                            <section>
                                <div>
                                <a href="?p=shop&id=213" onclick="<?php $_SESSION['shopid']="213";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>不鏽鋼雪平鍋專用鍋蓋</h6>
                                    <h6>木制旋鈕，隔離熱源，不易燙手</h6>
                                    <p>$600</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=214" onclick="<?php $_SESSION['shopid']="214";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>經典摩卡壺</h6>
                                    <h6>時代經典之作</h6>
                                    <p>$1600</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=215" onclick="<?php $_SESSION['shopid']="215";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>活性乾酵母</h6>
                                    <h6>內容氮氣環境中包裝填充， 品質好放心</h6>
                                    <p>$115</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=216" onclick="<?php $_SESSION['shopid']="216";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>MB-01 精靈球</h6>
                                    <h6>體驗精靈寶可夢樂趣</h6>
                                    <p>$180</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=217" onclick="<?php $_SESSION['shopid']="217";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>旋轉小屋投影音箱</h6>
                                    <h6>內容5款圖案膠片可隨心更換</h6>
                                    <p>$799</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=218" onclick="<?php $_SESSION['shopid']="218";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>翻轉筆記夾 </h6>
                                    <h6>資料量再大也是一本帶走。</h6>
                                    <p>$1299</p>
                                </a>
                                </div>
                            </section>
                            <section>
                                <div>
                                <a href="?p=shop&id=219" onclick="<?php $_SESSION['shopid']="219";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>飛行墨鏡</h6>
                                    <h6>太陽眼鏡/抗UV(T0811) </h6>
                                    <p>$599</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=220" onclick="<?php $_SESSION['shopid']="220";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>時尚卡夾</h6>
                                    <h6>超輕薄名片收納設計</h6>
                                    <p>$1230</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=221" onclick="<?php $_SESSION['shopid']="221";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>潛水瓶存錢筒</h6>
                                    <h6>出國潛水最佳的伴手禮。</h6>
                                    <p>$698</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=222" onclick="<?php $_SESSION['shopid']="222";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>貝殼包</h6>
                                    <h6>德國精緻工藝</h6>
                                    <p>$61500</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=223" onclick="<?php $_SESSION['shopid']="223";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>經典皮帶</h6>
                                    <h6>德國精緻工藝</h6>
                                    <p>$7790</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=224" onclick="<?php $_SESSION['shopid']="224";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>玫瑰金手鐲</h6>
                                    <h6>奧地利高雅水晶</h6>
                                    <p>$3122</p>
                                </a>
                                </div>
                            </section>
                            <section>
                                <div>
                                <a href="?p=shop&id=225" onclick="<?php $_SESSION['shopid']="225";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>義式咖啡豆</h6>
                                    <h6>800多種風味</h6>
                                    <p>$159</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=226" onclick="<?php $_SESSION['shopid']="226";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>草莓大福</h6>
                                    <h6>內容芋泥球4入X2盒+草莓大福X6入</h6>
                                    <p>$499</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=227" onclick="<?php $_SESSION['shopid']="227";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>冬筍烤麩</h6>
                                    <h6>必吃的家常名菜</h6>
                                    <p>$149</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=228" onclick="<?php $_SESSION['shopid']="228";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>麻油香菇松阪米糕</h6>
                                    <h6>嚴選松阪肉，搭配厚實乾香菇</h6>
                                    <p>$539</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=229" onclick="<?php $_SESSION['shopid']="229";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>阿珠嬤韓式柚子辣椒醬</h6>
                                    <h6>一瓶在手 人人都是神廚!!</h6>
                                    <p>$169</p>
                                </a>
                                </div>
                                <div>
                                <a href="?p=shop&id=230" onclick="<?php $_SESSION['shopid']="230";?>">
                                    <img src="images/商品圖df.png" alt="">
                                    <h6>椰子花蜜</h6>
                                    <h6>未經精製，含多種維生素礦物質，滿足身體所需營養</h6>
                                    <p>$296</p>
                                </a>
                                </div>
                            </section>
                        </div>

                    </div>

                </div>
                <div class="commodityright">
                    <div class="commodityright_list">
                        <div class="commodityright_list_top">
                            <h4>特賣商品推薦</h4><span class="more"><a href="#">更多>></a></span>
                        </div>
                        <div class="commodityright_list_button">
                            <ul>
                                <li><a href="?p=shop&id=301" onclick="<?php $_SESSION['shopid']="301";?>">
                                <span>[熱銷]</span><span title="來一客杯麵_鮮蝦魚板風味麵 (12杯/箱)">來一客杯麵_鮮蝦魚...</span></a></li>
                                <li><a href="?p=shop&id=302" onclick="<?php $_SESSION['shopid']="302";?>">
                                <span>[話題]</span><span title="超人氣報紅款毛巾蛋糕捲~">超人氣毛巾蛋糕捲~</span></a></li>
                                <li><a href="?p=shop&id=303" onclick="<?php $_SESSION['shopid']="303";?>">
                                <span>[推薦]</span><span title="老實農場 萊姆冰角 (28gx10顆)x6袋">老實農場 萊姆冰角</span></a></li>
                                <li><a href="?p=shop&id=304" onclick="<?php $_SESSION['shopid']="304";?>">
                                <span>[時尚]</span><span title="NOMAD全球限量鈦金屬錶帶2021新款">NOMAD全球限量鈦...</span></a></li>
                                <li><a href="?p=shop&id=305" onclick="<?php $_SESSION['shopid']="305";?>">
                                <span>[熱搜]</span><span title="熊大&兔兔 輕量不銹鋼保溫杯 保冷保溫 隨身杯 360ml(任選)">熊大&兔兔 輕量不銹...</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="commodityright_list">
                        <div>
                            <a href="#"><img src="images/side_list_img.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="images/side_list_img.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="images/side_list_img.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="images/side_list_img.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="images/side_list_img.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="images/side_list_img.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img src="images/side_list_img_2.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="clear_float"></div>
            </div>
            <footer>
                <div class="about">
                    <ul>
                        <li>
                            <dt>關於我們</dt>
                            <dd>公司資訊</dd>
                            <dd>人才招募</dd>
                            <dd>招商專區</dd>
                            <dd>服務公告</dd>
                        </li>
                        <li>
                            <dt>服務條款</dt>
                            <dd>隱私權保護</dd>
                            <dd>消費者保護</dd>
                            <dd>購物交易安全</dd>
                            <dd>其它規定</dd>
                        </li>
                        <li>
                            <dt>網站介紹</dt>
                            <dd>網站相關</dd>
                            <dd>網站導覽</dd>
                            <dd>搜尋小幫手</dd>
                        </li>
                        <li>
                            <dt>會員專區</dt>
                            <dd>購物流程</dd>
                            <dd>訂單查詢</dd>
                            <dd>退換貨須知</dd>
                            <dd>常見問題</dd>
                            <dd>聯絡客服</dd>
                        </li>
                        <li>
                            <dt>相關網站</dt>
                            <dd>FB粉絲團</dd>
                            <dd>IG粉絲團</dd>
                            <dd>twiter粉絲團</dd>
                            <dd>line粉絲團</dd>
                        </li>
                        <li>
                            <dt>行動購物</dt>
                            <dd>● &nbsp;QRApp</dd>
                            <dd class="QRcodePR"><img src="images/mikishopcar.png" alt="QRcode"></dd>

                        </li>
                    </ul>
                </div>
                <div class="w copyright">
                    <h6>公司資訊/公司地址 </h6>
                    &copy;2022.emmaLiu</div>
            </footer>

        </div>
        <?php endif;?>
        <?php $page=1;?>
        <?php if($p=="shop"):?>
        <div class="w box">
            <div class="left_img">
                <img src="images/mikannimg.png" alt="冰箱">
            </div>
            <div class="right_text">
                <!-- <?php foreach($datas as $datass):?> -->
                    <!-- <?php endforeach;?> -->
                <form id="form" action="./shopcar_php/pullshopcar.php" method="post">

                <h1 id="commodity_name"><?php echo $datass["commodityname"]?></h1>
                <input id="commodity_name1" type="hidden" name="buyname" value="<?php echo $datass["commodityname"]?>">

                <h1 id="commodity_Price">$<?php echo $datass["commodityPrice"]?><span></span></h1>
                <input id="commodity_Price1" type="hidden" name="buycount" value="$<?php echo $datass["commodityPrice"]?>">
                    
                <h5>數量</h5>
                <div class="right_text_list_inline_block">
                    <div onclick="add();">+</div>
                    <div><input id="commodity_quantity" type="text" name="buycommodity1" value="1"></div>
                    <input id="commodity_quantity1" type="hidden" name="buycommodity" value="1">
                    <div onclick="minus();">-</div>
                </div>
                <input id="inputswitch" type="hidden" name="switch" value="2">
                <button class="shopstyle" type="submit" style="margin-top:5px;display: inline;background-color: #fff;width: 110px;padding: 5px;margin-top: 35px;text-align: center;font-size:14px;" type="text" onclick="nowbuy1();">放入購物車</button>
                </form>

                <!-- form2 -->
                <form id="form" action="./shopcar_php/nowbuy.php" method="post">
                <input id="commodity_name2" type="hidden" name="buyname" value="<?php echo $datass["commodityname"]?>">
                <input id="commodity_Price2" type="hidden" name="buycount" value="$<?php echo $datass["commodityPrice"]?>">
                <input id="commodity_quantity2" type="hidden" name="buycommodity" value="1">
                <input id="inputswitch" type="hidden" name="switch" value="2">
                <button class="shopstyle" type="submit" onclick="nowbuy2();">立即購買</button>
                </from>
                
            </div>
        </div>
        <?php else:?>
            <!-- <h1>查無此網頁</h1> -->
        <?php endif;?>
        <script src="js/shopcar_tools.js"></script>
        <script src="js/animate.js"></script>
        <script src="js/tab.js"></script>
        <script src="js/shop_page_js.js"></script>

    </body>

    <script>

    //獲取全部
    var nav=document.querySelector(".commodity_list")
    //獲取小li
    var list=nav.children;
    for(var i=0;i<list.length;i++){
        //綁定事件
        list[i].onmouseover=function(){
            this.children[1].style.display='block';
        }
        list[i].onmouseout=function(){
            this.children[1].style.display='none';
        }
    }
        var out = true;

        // function out() {
        //     out = true;
        // }
        $(function() {
            (function() {
                $('.login_regi').show();
                $('.userarea').hide();
                $.getJSON("shopcar_php/getSession.php", function(data) {
                    // $data = JSON.stringify(data);
                    // $.each(data.items, function(i, item) {
                    // alert("jQuery拿到的:" + data);
                    //     console.log(data);
                    // });
                    if (data[0]) {
                        $('.userarea').show();
                        $('.login_regi').hide();
                    }
                    $('#username').text("歡迎:" + data[0]);
                })

            })();
        });

        // function loghide() {
        //     console.log('ok');
        //     alert("click_ok");
        //     document.getElementById("userarea").style.display = "none";
        //     document.getElementById("logout").style.display = "none";
        // }
        // var session_loggedin = document.cookie;

        // if (session_loggedin) {
        //     var logintrue = document.getElementById('userarea');
        //     logintrue.style.display = "block";
        //     var logout = document.getElementById('logout');
        //     logintrue.style.display = "block";
        //     var loginfasle = document.getElementById('loginfasle');
        //     loginfasle.style.display = "block";
        //     var registerfasle = document.getElementById('registerfasle');
        //     registerfasle.style.display = "block";
        // } else {
        //     var logintrue = document.getElementById('userarea');
        //     logintrue.style.display = "none";
        //     var logout = document.getElementById('logout');
        //     logintrue.style.display = "none";
        //     var loginfasle = document.getElementById('loginfasle');
        //     loginfasle.style.display = "block";
        //     var registerfasle = document.getElementById('registerfasle');
        //     registerfasle.style.display = "block";
        // }
    </script>

</html>