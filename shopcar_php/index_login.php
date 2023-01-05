<?php
// 判斷有沒有登入
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
//判斷有沒有值;是否true
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //setcokie一天
    setcookie("name",true,time()+60*60*24);
    header("location: ../index.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登入介面</title>
</head>
<script>
    function checkinput() {
        var registername = document.getElementById("registername1");
        var registername_vlaue = registername.value;
        if (registername_vlaue == "") {
            alert("註冊名字不能空白");
        }
        var reg = /[0-9]|[A-z]/i;

        if (!reg.test(registername_vlaue)) {
            alert("請輸入英文加數字的註冊名字")
            registername.value = "";
        }
    }
</script>
<body>
    <div class="wrap">
    <div class="wrap_flex">
            <h6>MKshopWeb</h6>
            <h2>登入頁面</h2>
        </div>
<form method="post" action="login.php">
<table>
  <tr>
    <td>帳號：</td>
    <td><input id="registername1" type="text" name="username" autocomplete="off"  onkeyup="checkinput()"></td>
  </tr>
  <tr>
    <td>密碼：</td>
    <td><input type="password" name="password" autocomplete="off"></td>
  </tr>
  <tr>
    <td></td>
    <td class="f_login_input_submit"><input type="submit" value="登入" name="submit"><br><br></td>
  </tr>
  <tr>
      <td><a href="register.html">註冊</a></td>
      <td><a href="../index.php">回首頁</a></td>
  </tr>
</table>
</form>
    </div>

</body>
<style>
    *{
        margin:0;
        padding:0;
        text-decoration:none;
    }
    a{
        color:orange;
    }
    .wrap{
        width: 300px;
        margin:0 auto;
        margin-top:50px;
    }
    .wrap_flex {
        display: flex;
    }
    
    .wrap h2 {
        display: inline-block;
        padding-left: 10px;
        margin-bottom: 50px;
    }
    
    .wrap h6 {
        display: inline;
        padding-bottom: 10px;
        padding-left: 10px;
        font-size: 5px;
        color: rgb(234, 126, 18);
    }
    input {
        outline: none;
    }
    input[type="submit"] {
        width: 75px;
        height: 35px;
}
    table,td {
         /* border: 1px solid; */
    }
    td{
        width:50px;
        height:50px;
    }
    .block{
        /* width:10px; */
    }
    .f_login_input_submit{
        text-align:right;
        height:60px;
    }
    .wrap tr:last-child{
        font-weight:900;
        /* padding-left:10px; */
    }
</style>
</html>
