<?php
session_start();
require '../../dao/pdo.php';

$VIEW_NAME = 'list.php';

extract($_REQUEST);

$sql = "SELECT * from post";
$listPost = pdo_get_all_rows($sql);



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
