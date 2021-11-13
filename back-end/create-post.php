<?php
session_start();
require '../dao/pdo.php';

$output = ['data' => ['post_id' => '', 'caption' => '', 'post_img' => '', 'post_video' => '', 'post_time' => ''], 'status' => false, 'type' => '', 'user' => ['img' => '', 'fname' => '', 'lname' => '']];


$sql = 'Select * from users where unique_id = ?';

$newPostUserData = pdo_get_one_row($sql, $_SESSION['unique_id']);

$output['user']['img'] = $newPostUserData['img'];
$output['user']['fname'] = $newPostUserData['fname'];
$output['user']['lname'] = $newPostUserData['lname'];


// mac dinh
$imgCheck = '';
$caption = '';
$videoCheck = '';


$final_img = '';
$final_video = '';



// lay du lieu post
if (isset($_POST['caption'])) {
    $caption = $_POST['caption'];
}
if (isset($_FILES['img'])) {
    $imgCheck = $_FILES['img']['tmp_name'];
}
if (isset($_FILES['video'])) {
    $videoCheck = $_FILES['video']['tmp_name'];
}

$post_time = date('Y/m/d H:i:s', time() + 3600 * 6);

// TH0: không có gì hết

// TH1: chỉ có text
// TH2: có text và video
// TH3: có text và ảnh
// TH$: Chỉ có ảnh
// TH5: Chỉ có video

// Sửa logic
// $res = ['caption'=>$caption,'video'=>$videoCheck,'img'=>$imgCheck];
// die(json_encode($res));

if ($videoCheck == '' && $caption == '' && $imgCheck == '') {
    $output['data'] = 'Bài post ít nhất phải có chữ chứ !';
    $output['status'] = false;
    die(json_encode($output));
}

$check = true;

//  Nếu có video thì upload video và lấy tên video
if ($videoCheck) {
    $img_name = $_FILES['video']['name']; //lấy tên file
    $img_type = $_FILES['video']['type']; // lấy loại file
    $video_tmp_name = $_FILES['video']['tmp_name']; // day la file de upload video
    $video_size = $_FILES['video']['size'];
    //  kiểm tra video có phù hợp hay ko
    $video_explode = explode('.', $img_name); // hàm explode trả về mảng ngăn cách bằng dấu chấm

    $video_ext = strtolower(end($video_explode)); // lay phan mo rong cua file upload

    $duoi_cua_video = ['mp4', 'mpeg', 'mpg', 'mov'];
    if ($video_size >= (1024 * 30000)) {
        $check = false;
        $output["data"] = "Video chỉ được dưới 30MB";
    } else {
        if (in_array($video_ext, $duoi_cua_video) === true) {
            $time = time();
            $final_video = $time . $img_name;

            if (move_uploaded_file($video_tmp_name, "../video/post/" . $final_video)) {
                $output['type'] = 'video';
            } else {
                $check = false;
                $output["data"] = "Đã xảy ra lỗi trong quá trình upload video!";
            }
        } else {
            $check = false;
            $output["data"] = "Video phải thuộc kiểu: mp4 - mpeg - mpg - mov";
        }
    }
}
//  Nếu có ảnh thì upload ảnh và lấy tên ảnh
if ($imgCheck) {

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

        // (Nơi ở ban đầu, điểm đến, tên ảnh)
        if (move_uploaded_file($img_tmp_name, "../images/post/" . $final_img)) {
            $output['type'] = 'img';
        } else {
            $output['data'] = "Hãy chọn lại ảnh!";
            $check = false;
        }
    } else {
        $output['data'] = "Ảnh phải thuộc kiểu: png - jpeg - jpg";
        $check = false;
    }
}

// Nếu không có lỗi thì thêm vào db
if ($check) {
    $sql = "INSERT INTO post (caption,time,img_post,post_video,unique_id)  VALUES (?,?,?,?,?)";
    if (pdo_execute($sql, $caption, $post_time, $final_img, $final_video, $_SESSION['unique_id'])) {
        $output['status'] = true;
        $output['data']['caption'] = $caption;
        $output['data']['post_img'] = $final_img;
        $output['data']['post_video'] = $final_video;
        $output['data']['post_time'] = $post_time;
    }
}

$sql = 'SELECT * FROM post WHERE time = ?';
$post_inf = pdo_get_one_row($sql, $post_time);

$output['data']['post_id'] = $post_inf['post_id'];

die(json_encode($output));
