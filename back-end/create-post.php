<?php
session_start();
require '../dao/pdo.php';

// mac dinh
$img = '';
$caption = '';
$output ='';
$final_img = '';
// lay du lieu post
if(isset($_POST['caption'])){
    $caption = $_POST['caption'];
}
if(isset($_FILES['img'])){
    $img = $_FILES['img'];
}

$post_time = date('Y/m/d H:i:s', time()+3600*6);

if($img == '' && $caption ==''){
    $output ='false';
}else{
   $check = true;
    if ($_FILES['img']['tmp_name']) {
        $img_name = $_FILES['img']['name']; //lấy tên ảnh
        $img_type = $_FILES['img']['type']; // lấy loại ảnh
        $img_tmp_name = $_FILES['img']['tmp_name']; // day la file de upload anh
        $img_size = $_FILES['img']['size']; // lấy dung lượng ảnh
    
        //  kiểm tra nhr có phù hợp hay ko
        $img_explode = explode('.', $img_name); // hàm explode trả về mảng ngăn cách bằng dấu chấm
    
        $img_ext = strtolower(end($img_explode)); // lay phan mo rong cua file upload
    
        $duoi_cua_anh = ['png', 'jpeg', 'jpg'];
        $duoi_cua_video = ['mp4','mov','wmv','flv','avi','avchd','webm','mkv'];
        
        if (in_array($img_ext, $duoi_cua_anh) === true) {
            $time = time(); // ta
            $final_img = $time . $img_name;
    
            // (Nơi ở ban đầu, điểm đến, tên ảnh)
            if (!move_uploaded_file($img_tmp_name, "../images/post/" . $final_img)) {   
                $output = "Hãy chọn lại ảnh!";
                $check =false;
            } 
        } else {
            $output= "Ảnh phải thuộc kiểu: png - jpeg - jpg";
            $check =false;
        }
    } 
    if($check){
        $sql = "INSERT INTO post (caption,time,img_post,unique_id)  VALUES (?,?,?,?)";
            if( pdo_execute($sql,$caption,$post_time,$final_img,$_SESSION['unique_id'])){
                $output = 'success';
        }
    }
}
echo $output;










