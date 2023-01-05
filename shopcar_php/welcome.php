<!doctype html>
<html lang="en">
<style>
    a {
        text-decoration: none;
    }
    
    a:hover {
        color: blueviolet;
        font-size: 30px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>登陸成功</title>
</head>

<body>
    <h1>歡迎光臨</h1>
    <?php
    header("refresh:32;url=../index.html");
    ?>

        <div><a href="logout.php">登出</a></div>

</body>


</html>