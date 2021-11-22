<!-- oder details list -->
<link rel="stylesheet" href="../../app/css/admin/post.css">
<div class="recentOrder list">
    <div class="cardHeader">
        <h2>Quản lý bài viết</h2>
        <!-- <div class="ctl">
            <a href="?btn_add" class="ad-btn">Add new Type</a>

        </div> -->
    </div>

    <table>
        <thead>
            <tr class="tr-post">
                <td>Id bài viết</td>
                <td>Người đăng</td>
                <td>Nội dung</td>
                <td colspan="2">Hình ảnh/Video</td>
                <td>Trạng Thái</td>
                <td>Lựa chọn</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $item) { ?>
                <tr>

                    <td><?= $item['post_id'] ?></td>
                    <td><?= $item['fname'] ?> <?= $item['lname'] ?></td>
                    
                    <td class="post-capton">
                        <?php
                        if($item['caption']== null){
                            echo "Trống";
                        }else{
                            echo  $item['caption'];
                        }
                        ?>    
                   </td>
                    <td class="post-img" colspan="2">
                    <?php
                     $rt ='';
                        if($item['img_post']== null && $item['post_video']== null){
                            echo  $rt.="Trống";
                        }else if($item['img_post'] != null){
                            echo   $rt.="
                            <img src='../../images/post/$item[img_post]' />
                            ";
                        }else if($item['post_video'] != null){
                            echo   $rt.="
                            <video controls src='../../video/post/$item[post_video]'></video>
                            ";
                        }
                        ?> 
                        
                    </td>
                  
                    <td class="post-video">
                        <?php if ($item['post_status'] == 1) {
                            echo "Hiện";
                        } else {
                            echo "Ẩn";
                        }
                        ?>
                    </td>
                    <td class="post-control">
                        <a href="?btn_an&post_id=<?= $item['post_id'] ?>" onclick="return An('<?php echo $item['post_id']; ?>')">Ẩn</a>
                        <a href="?btn_hien&post_id=<?= $item['post_id'] ?>" onclick="return Hien('<?php echo $item['post_id']; ?>')">Hiện</a>
                        <a href="?btn_del&post_id=<?= $item['post_id'] ?>" onclick="return Del('<?php echo $item['post_id']; ?>')">Xóa</a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>




    </table>
    <script>
        function Del(name) {
            return confirm("Bạn có chắc chắn muốn xóa bài viết có id là: " + name + " ?");
        }

        function An(name) {
            return confirm("Bạn có chắc chắn muốn Ẩn bài viết có id là: " + name + " ?");
        }

        function Hien(name) {
            return confirm("Bạn có chắc chắn muốn Hiện bài viết có id là: " + name + " ?");
        }
    </script>
</div>
