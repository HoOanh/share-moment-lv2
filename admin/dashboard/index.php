<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: ../../site/login");
}


require '../../dao/pdo.php';

$sql = "select * from users where unique_id = ? and role =1 ";

$isAdmin = pdo_get_one_row($sql,$_SESSION['unique_id']);

if($isAdmin == []){
    header("location: ../../site/home");
}

$VIEW_NAME = 'dashboard/home.php';

require '../layout.php';
