<?php
session_start();
require "../dao/pdo.php";
require "../dao/pdo_setting.php";

$output = ["res_status" => false, "msg" => '','newAvatar' =>''];
if (isset($_FILES["img-bg"])) {


    $img_name = $_FILES['img-bg']['name']; //lấy tên ảnh
    $img_type = $_FILES['img-bg']['type']; // lấy loại ảnh
    $img_tmp_name = $_FILES['img-bg']['tmp_name']; // day la file de upload anh

    //  kiểm tra nhr có phù hợp hay ko
    $img_explode = explode('.', $img_name); // hàm explode trả về mảng ngăn cách bằng dấu chấm

    $img_ext = strtolower(end($img_explode)); // lay phan mo rong cua file upload

    $duoi_cua_anh = ['png', 'jpeg', 'jpg'];
    if (in_array($img_ext, $duoi_cua_anh) === true) {
        $time = time(); // ta
        $final_img = $time . $img_name;

        // Get old avatar
        $sql = "select bg_user from users where unique_id = ?";
        $oldAvatar = pdo_get_one_row($sql,$_SESSION['unique_id']);
        $oldAvatarUrl = "../images/background/" . $oldAvatar['bg_user'];


        if (move_uploaded_file($img_tmp_name, "../images/background/" . $final_img)) {
            
            $changeAvatar = changeBg($final_img,$_SESSION['unique_id']);
            if ($changeAvatar) {
                if($oldAvatar['bg_user'] != 'non-bg.jpg'){
                    unlink($oldAvatarUrl);
                }
                $output["res_status"] = "success";
                $output["msg"] = "Chỉnh sửa ảnh bìa thành công !";
                $output['newAvatar'] = $final_img;
            }
            else {
                $output["msg"] = "Cập nhật ảnh không thành công !";
                $output["res_status"] = "error";
            }
        
        } else {
            $output["msg"] = "Cập nhật ảnh không thành công!";
            $output["res_status"] = "error";
        }

    } else {
        $output["msg"] = "Ảnh phải thuộc kiểu: png - jpeg - jpg";
        $output["res_status"] = "error";
    }
}

die(json_encode($output));
