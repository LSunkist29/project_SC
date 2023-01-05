<?php
session_start();
// $data=array("Name"=>$_SESSION['username'],"Age"=>$_SESSION["loggedin"];);
$data=[$_SESSION['username'],$_SESSION['loggedin']];
// echo json_encode(array_values($data));
// $json={"name":$_SESSION['username'],"age":$_SESSION['loggedin']};
// $data=json_encode($json);
// $data=JSON.stringify($data);
// echo $data;
 echo ( json_encode($data));
?>