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
        require_once('config.php');
        $postdata=0;
        if(isset($_POST["iddata"])){
            $postdata=$POST["iddata"];
        }
        $sql="SELECT * FROM `commoditys` WHERE `id` = '$postdata'";
        $result = mysqli_query($link,$sql);
        return json_encode($result);
    ?>
</body>
</html>