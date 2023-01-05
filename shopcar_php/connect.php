<?php
// 連資料庫是否成功2
$server="localhost";//主機
$db_username="";//你的資料庫使用者名稱
$db_password="";//你的資料庫密碼
//sql
$con = mysql_connect($server,$db_username,$db_password);//連結資料庫
if(!$con){//false
die("can't connect".mysql_error());//如果連結失敗輸出錯誤
}
mysql_select_db('shopcar01',$con);//選擇資料庫（我的是test）
?>