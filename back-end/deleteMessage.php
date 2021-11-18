<?php
session_start();
require '../dao/pdo.php';

$box_id = $_POST['box_id']; // id của chat

$output = "";

$sql = "DELETE FROM message where (send_id = ? and receive_id = ?) or (send_id = ? and receive_id = ?)";
if(pdo_execute($sql,$_SESSION['unique_id'],$box_id,$box_id,$_SESSION['unique_id'])){
    $output = 1;
}

echo $output;