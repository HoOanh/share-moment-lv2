<?php
require '../../dao/pdo.php';

$VIEW_NAME = 'list.php';

extract($_REQUEST);

$page_size = 10;

// ======== thêm danh mục =========

if (exist_param("btn_add")) {
    $VIEW_NAME = "new.php";
} else if (exist_param("btn_insert")) {
    //lấy dữ liệu
    $name = $_POST['fullName'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    //Thêm dữ liệu mới

    $VIEW_NAME = "list.php";

    // chỉnh sữa danh mục
} else if (exist_param("btn_edit")) {
    $idUser = $_REQUEST['idUs'];
    extract($userInfo);
    $VIEW_NAME = "edit.php";

    // update
} else if (exist_param("btn_update")) {
    $idUser = $_POST['idUser'];
    $name = $_POST['fullName'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];


    // Show danh sách các danh mục


    $VIEW_NAME = "list.php";

    //======= xóa danh mục ============
} else if (exist_param("btn_del")) {
    $idUser = $_REQUEST['idUs'];


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
