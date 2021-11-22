<?php
session_start();
require '../../dao/pdo_admin_account.php';

$VIEW_NAME = 'list.php';

extract($_REQUEST);

$page_size = 10;
$page_num = 1;
if (isset($_GET['page_num'])) $page_num = $_GET['page_num'] + 0;
if ($page_num <= 0) $page_num = 1;

$total_rows = countUsers();
$usersList = getUsers($page_num, $page_size);

// ======== thêm danh mục =========

if (exist_param("btn_add")) {
    $VIEW_NAME = "new.php";
} else if (exist_param("btn_edit")) {
    $box_id = $_REQUEST['box_id'];
    $sql = 'SELECT * FROM users where unique_id = ?';
    $user = pdo_get_one_row($sql, $box_id);
    extract($user);
    $VIEW_NAME = "edit.php";

    // update
} else if (exist_param("btn_ban")) {
    $box_id = $_GET['box_id'];
    $anhien = 0;
    $sql = "UPDATE users SET anhien = ? WHERE unique_id = ?";
    pdo_execute($sql, $anhien, $box_id);

    header('location:../account');
} else if (exist_param("btn_unban")) {
    $box_id = $_GET['box_id'];
    $anhien = 1;
    $sql = "UPDATE users SET anhien = ? WHERE unique_id = ?";
    pdo_execute($sql, $anhien, $box_id);

    header('location:../account');
    //======= xóa danh mục ============
} else if (exist_param("btn_del")) {
    $box_id = $_REQUEST['box_id'];
    $sql = "DELETE FROM users where unique_id = ?";
    pdo_execute($sql, $box_id);

    // hiển thị lại danh sách các danh mục
    $VIEW_NAME = "list.php";
    header('location: ../account/');

    // ========= Danh sách danh mục===========
} else if (exist_param("btn_viewAll")) {

    $VIEW_NAME = "list.php";


    // ========= Danh sách danh mục===========
} else {
    // Hiển thị theo số lượng yêu cầu

    $VIEW_NAME = 'list.php';
}

require '../layout.php';
