<?php
header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
session_start();
// $data=array("Name"=>$_SESSION['username'],"Age"=>$_SESSION["loggedin"];);
// $data=$_SESSION['username'];
// echo json_encode(array_values($data));
if(isset($_GET['id'])){
	$_SESSION['id']=$_GET['id'];
}
$json =$_SESSION['id'];
$data=json_encode($json);
echo $data;
//  echo ( json_encode($data));
// header("url=index.php");
?>