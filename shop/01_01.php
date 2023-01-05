<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../css/shop_page_style.css">
    <script src="../js/shop_page_js.js"></script>
</head>
<script>
    app.all('*', function(req, res, next) {
        res.header("Access-Control-Allow-Origin", "*");
        res.header("Access-Control-Allow-Headers", "X-Requested-With");
        res.header("Access-Control-Allow-Methods", "PUT,POST,GET,DELETE,OPTIONS");
        res.header("X-Powered-By", '3.2.1');
        res.header("Content-Type", "application/json;charset=utf-8");
        next();
    });
</script>

<body>
    <!-- 1 -->

    <body>
        <!-- 2 -->
        <div class="w box">
            <div class="left_img">
                <img src="images/mikannimg.png" alt="餐邊櫃 ">
            </div>
            <div class="right_text">
                
                <form action="shopcar_php/nowbuy.php" method="post">
                <h1 id="commodity_name">餐邊櫃 </h1>
                <input id="commodity_name1" type="hidden" name="buyname" value="餐邊櫃 ">

                <h1 id="commodity_Price">$1999</h1>
                <input id="commodity_Price1" type="hidden" name="buycount" value="$1999">

                <h5>數量</h5>
                <div class="right_text_list_inline_block">
                    <div onclick="add();">+</div>

                    <div><input id="commodity_quantity" type="text" value="1"></div>
                    <input id="commodity_quantity1" type="hidden" name="buycommodity" value="">

                    <div onclick="minus();">-</div>
                </div>
                <div class="shopstyle" style="display: inline;background-color: #fff;width: 110px;padding: 5px;margin-top: 35px;text-align: center;font-size:14px;" onclick="pull_in_shopcar();">放入購物車</div><button type="submit" onclick="nowbuy();">立即購買</button>
                </form>
            </div>
        </div>
    </body>

</html>