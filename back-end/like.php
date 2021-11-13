<?php 
session_start();
require "../dao/pdo.php";

$post_id = $_POST['post_id'];

$sql = "Select * from likes where unique_id = ? and post_id = ?";
$res = pdo_get_one_row($sql,$_SESSION['unique_id'],$post_id);

if($res == []){
    $sql = "insert into likes (unique_id,post_id) values(?,?)";
    $res = pdo_execute($sql,$_SESSION['unique_id'],$post_id);
}
else{
    $sql = "delete from likes where unique_id = ? and post_id = ?";
    $res = pdo_execute($sql,$_SESSION['unique_id'],$post_id);
}
$sql = "Select count(*) as total from likes where post_id = ?";
$res = pdo_get_one_row($sql,$post_id);


echo $res['total'];
?>