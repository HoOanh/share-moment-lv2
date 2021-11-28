<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: ../login");
}
if (!isset($_GET['post_id'])) {
    header("location: ../home/");
}
require "../../dao/pdo.php";

// set last active

$sql = "update users set last_activity = now() where unique_id = ?";
pdo_execute($sql,$_SESSION['unique_id']);

$status = "Offline";
$sql = "update users set user_status = ? where TIMESTAMPDIFF ( second,last_activity, now() ) > 60 ";
pdo_execute($sql,$status);

$status = "Đang hoạt động";
$sql = "update users set user_status = ? where TIMESTAMPDIFF ( second,last_activity, now() ) <= 60 ";
pdo_execute($sql,$status);




$VIEW_NAME = "edit.php";


include "../index.php";
