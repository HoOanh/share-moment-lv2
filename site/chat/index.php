<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: ../login");
}

require "../../dao/pdo.php";


// set last active
$last_activity = date('Y/m/d H:i:s', time() + 3600 * 6);
$sql = "update users set last_activity = ? where unique_id = ?";
pdo_execute($sql, $last_activity, $_SESSION['unique_id']);

$status = "Offline";

$sql = "update users set user_status = ? where TIMESTAMPDIFF ( second,last_activity, now() ) > 60 ";
pdo_execute($sql,$status);

$status = "Đang hoạt động";
$sql = "update users set user_status = ? where TIMESTAMPDIFF ( second,last_activity, now() ) <= 60 ";
pdo_execute($sql,$status);






$sql = "SELECT * FROM users WHERE unique_id = ?";
$user = pdo_get_one_row($sql, $_SESSION['unique_id']);
extract($user);

$VIEW_NAME = "chat.php";

include "../index.php";
