<?php
session_start();
require '../../dao/pdo.php';
require '../../dao/pdo_admin_post.php';

if (!isset($_SESSION['unique_id'])) {
    header("location: ../../site/login");
}

$sql = "select * from users where unique_id = ? and role =1 ";

$isAdmin = pdo_get_one_row($sql, $_SESSION['unique_id']);

if ($isAdmin == []) {
    header("location: ../../site/home");
}


$page_size = 5;
$page_num = 1;
if (isset($_GET['page_num'])) $page_num = $_GET['page_num'] + 0;
if ($page_num <= 0) $page_num = 1;

$list = getListPost($page_num, $page_size);
$total_rows = CountPost();

$VIEW_NAME = 'list.php';


// ======== thêm danh mục =========

if (exist_param("btn_add")) {
    $VIEW_NAME = "new.php";
} else if (exist_param("btn_hien")) {
    $post_id = $_GET['post_id'];
    updatePostHien($post_id);
    // Show danh sách các danh mục

    header('location: ../post/');
    $VIEW_NAME = "list.php";

    //======= xóa danh mục ============
} else if (exist_param("btn_an")) {
    $post_id = $_GET['post_id'];
    updatePostAn($post_id);
    // Show danh sách các danh mục
    header('location: ../post/');

    $VIEW_NAME = "list.php";

    //======= xóa danh mục ============
} else if (exist_param("btn_del")) {
    $post_id = $_GET['post_id'];
    dellPost($post_id);

    header('location: ../post/');
    // hiển thị lại danh sách các danh mục
    $VIEW_NAME = "list.php";


    // ========= Danh sách danh mục===========
} else {
    // Hiển thị theo số lượng yêu cầu

    $VIEW_NAME = 'list.php';
}

require '../layout.php';
