<?php 
session_start();
require "../dao/pdo.php";

$last_activity = date('Y/m/d H:i:s', time() + 3600 * 6);
$sql = "update users set last_activity = ? where unique_id = ?";
pdo_execute($sql, $last_activity, $_SESSION['unique_id']);

$status = "Offline";
$time_now = date('Y/m/d H:i:s', time() + 3600 * 6);
$sql = "update users set user_status = ? where TIMESTAMPDIFF ( second,last_activity, now() ) > 60 ";
pdo_execute($sql,$status);

$status = "Đang hoạt động";
$sql = "update users set user_status = ? where TIMESTAMPDIFF ( second,last_activity, now() ) <= 60 ";
pdo_execute($sql,$status);



?>