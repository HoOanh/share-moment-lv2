<?php
session_start();
require "../dao/pdo.php";

$output = ['res_status' => 'warning', 'msg' => '@@'];


$post_id  = $_POST['post_id'];
$post_role = $_POST['role'];
$post_caption = $_POST['caption'];

$resources_type = '';
$resources_value = '';

$includeResourceChanged = false;
$isImg = false;
$isVideo = false;
if (isset($_FILES['video'])) {
    if ($_FILES['video']['tmp_name'] != '') {
        $includeResourceChanged = true;
        $isVideo = true;
    }
}
if (isset($_FILES['img'])) {
    if ($_FILES['img']['tmp_name'] != '') {
        $includeResourceChanged = true;
        $isImg = true;
    }
}


if (!$includeResourceChanged) {
    $sql = "update post set post_role = ?, caption = ? where post_id = ?";
    pdo_execute($sql, $post_role, $post_caption, $post_id);
    $output['res_status'] = 'success';
    $output['msg'] = 'Chỉnh sửa bài viết thành công!';
} else {
    if ($isImg) {
        $img_name = $_FILES['img']['name']; //lấy tên ảnh
        $img_type = $_FILES['img']['type']; // lấy loại ảnh
        $img_tmp_name = $_FILES['img']['tmp_name']; // day la file de upload anh
        $img_size = $_FILES['img']['size']; // lấy dung lượng ảnh

        //  kiểm tra nhr có phù hợp hay ko
        $img_explode = explode('.', $img_name); // hàm explode trả về mảng ngăn cách bằng dấu chấm

        $img_ext = strtolower(end($img_explode)); // lay phan mo rong cua file upload

        $duoi_cua_anh = ['png', 'jpeg', 'jpg'];

        if (in_array($img_ext, $duoi_cua_anh) === true) {
            $time = time(); // ta
            $final_img = $time . $img_name;

            $final_img = str_replace(array(
                '\'', '"',
                ',', ';', '<', '>'
            ), '', $final_img);

            // Get old img name
            $sql = "select img_post from post where post_id = ?";
            $oldData = pdo_get_one_row($sql, $post_id);


            // (Nơi ở ban đầu, điểm đến, tên ảnh)
            if (move_uploaded_file($img_tmp_name, "../images/post/" . $final_img)) {

                $sql = "update post set post_role = ?, caption = ?, img_post = ? where post_id = ?";
                if (pdo_execute($sql, $post_role, $post_caption, $final_img, $post_id)) {
                    unlink("../images/post/{$oldData['img_post']}");
                };

                $output['res_status'] = 'success';
                $output['msg'] = 'Chỉnh sửa bài viết thành công!';
            } else {
                $output['msg'] = "Cập nhật ảnh không thành công!";
            }
        } else {
            $output['msg'] = "Ảnh phải thuộc kiểu: png - jpeg - jpg";
        }
    }
    if ($isVideo) {
        $img_name = $_FILES['video']['name']; //lấy tên file
        $img_type = $_FILES['video']['type']; // lấy loại file
        $video_tmp_name = $_FILES['video']['tmp_name']; // day la file de upload video
        $video_size = $_FILES['video']['size'];
        //  kiểm tra video có phù hợp hay ko
        $video_explode = explode('.', $img_name); // hàm explode trả về mảng ngăn cách bằng dấu chấm

        $video_ext = strtolower(end($video_explode)); // lay phan mo rong cua file upload
        $duoi_cua_video = ['mp4', 'mpeg', 'mpg', 'mov'];
        if ($video_size >= (1024 * 16000)) {

            $output["data"] = "Video chỉ được dưới 16MB";
        } else {
            if (in_array($video_ext, $duoi_cua_video) === true) {
                $time = time();
                $final_video = $time . $img_name;

                $final_video = str_replace(array(
                    '\'', '"',
                    ',', ';', '<', '>'
                ), '', $final_video);

                // Get old img name
                $sql = "select post_video from post where post_id = ?";
                $oldData = pdo_get_one_row($sql, $post_id);


                if (move_uploaded_file($video_tmp_name, "../video/post/" . $final_video)) {

                    $sql = "update post set post_role = ?, caption = ?, post_video = ? where post_id = ?";
                    if (pdo_execute($sql, $post_role, $post_caption, $final_video, $post_id)) {
                        unlink("../video/post/{$oldData['post_video']}");
                    };

                    $output['res_status'] = 'success';
                    $output['msg'] = 'Chỉnh sửa bài viết thành công!';
                } else {

                    $output["msg"] = "Đã xảy ra lỗi trong quá trình upload video!";
                }
            } else {

                $output["msg"] = "Video phải thuộc kiểu: mp4 - mpeg - mpg - mov";
            }
        }
    }
}


die(json_encode($output));
