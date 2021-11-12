<?php 

    $output=['data'=>'','status'=>false,'name'=>''];
    if (isset($_FILES['video'])) {
        $img_name = $_FILES['video']['name']; //lấy tên file 
        $img_type = $_FILES['video']['type']; // lấy loại file
        $img_tmp_name = $_FILES['video']['tmp_name']; // day la file de upload video
        //  kiểm tra video có phù hợp hay ko
        $video_explode = explode('.', $img_name); // hàm explode trả về mảng ngăn cách bằng dấu chấm

        $video_ext = strtolower(end($video_explode)); // lay phan mo rong cua file upload

        $duoi_cua_video = ['mp4'];
        if (in_array($video_ext, $duoi_cua_video) === true) {
            $time = time(); // ta
            $final_video = $time . $img_name;

            if (move_uploaded_file($img_tmp_name, "video/" . $final_video)) {
                $output['data'] = "success";
                $output['status'] = true;
                $output['name'] = $final_video;
                
            } else {
                $output["data"] = "Đã xảy ra lỗi trong quá trình upload video!";
            }
        } else {
            $output["data"] = "Video phải thuộc kiểu: mp4";
        }
    }

    die(json_encode($output)) ;

?>