<?php
session_start();
require '../dao/pdo.php';


$output = "";

$post_id = $_POST['post_id']; //post_id của post
$unique_id = $_POST['unique_id']; //unique_id của post

if($unique_id == $_SESSION['unique_id']){
    $sql = "DELETE FROM post WHERE post_id = ? and unique_id = ?";
    if(pdo_execute($sql,$post_id,$unique_id)){
        $output = "Xóa thành công";
    }
}else{
    $output = "Không xóa bài người khác được !";
}


echo $output;