<?php
session_start();
require '../../dao/pdo.php';
require '../../dao/pdo_admin_cmt.php';

if (!isset($_SESSION['unique_id'])) {
    header("location: ../../site/login");
}

$sql = "select * from users where unique_id = ? and role =1 ";

$isAdmin = pdo_get_one_row($sql, $_SESSION['unique_id']);

if ($isAdmin == []) {
    header("location: ../../site/home");
}


$VIEW_NAME = 'list.php';

extract($_REQUEST);

$page_size = 5;
$page_num = 1;
if (isset($_GET['page_num'])) $page_num = $_GET['page_num'] + 0;
if ($page_num <= 0) $page_num = 1;

$listPost = getCmt($page_num, $page_size);
$total_rows = countPost();

if (exist_param("btn_list_cmt")) { // danh sách cmt
    $VIEW_NAME = "list_cmt.php";
} else if (exist_param("btn_hide")) { //ẩn cmt
    $cmt_id = $_GET['cmt_id'];

    $sql = "UPDATE cmt SET showHide = 0 WHERE cmt_id = $cmt_id";;
    pdo_execute($sql);

    // request lại trình duyệt
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else if (exist_param("btn_show")) { // hiện cmt
    $cmt_id = $_GET['cmt_id'];

    $sql = "UPDATE cmt SET showHide = 1 WHERE cmt_id = $cmt_id";;
    pdo_execute($sql);

    // request lại trình duyệt
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else if (exist_param("btn_delete")) { // xóa cmt
    $cmt_id = $_GET['cmt_id'];

    $sql = "DELETE from cmt where cmt_id = $cmt_id";;
    pdo_execute($sql);

    // request lại trình duyệt
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else { // danh sách các bài post


    $VIEW_NAME = 'list.php';
}

require '../layout.php';
