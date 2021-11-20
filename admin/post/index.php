<?php
require '../../dao/admin_post.php';
// $page_size = 5;
// $page_num = 1;
// if (isset($_GET['page_num'])) $page_num = $_GET['page_num'] + 0;
// if ($page_num <= 0) $page_num = 1;
// $list = getAll( $page_num, $page_size);
// $total_rows = CountPost();

$list = getAll();
// $list = get();

$VIEW_NAME = 'list.php';



// ======== thêm danh mục =========

if (exist_param("btn_add")) {
    $VIEW_NAME = "new.php";
} else if (exist_param("btn_hien")) {
    $post_id = $_GET['post_id'];
  updatePostHien( $post_id);
    // Show danh sách các danh mục

    header('location: ../post/');
    $VIEW_NAME = "list.php";

    //======= xóa danh mục ============
}else if (exist_param("btn_an")) {
    $post_id = $_GET['post_id'];
  updatePostAn( $post_id);
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
