<?php
session_start();
require '../dao/pdo.php';

$output = "";
$role = $_POST['role'];
$box_id = $_POST['unique_id'];
$sql = "UPDATE users SET role = ? where unique_id = ?";
if(pdo_execute($sql, $role, $box_id)){
    $output="success";
}
echo $output;
