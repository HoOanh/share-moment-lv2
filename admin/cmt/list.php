<!-- oder details list -->
<div class="recentOrder">
    <div class="cardHeader">
        <h2>Tổng bình luận của các bài viết</h2>
    </div>

    <table>
        <thead>
            <tr>
                <td>Bài viết</td>
                <td>Ngày đăng</td>
                <td>Số bình luận</td>
                <td>Lựa chọn</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listPost as $item) {
                $sql = 'select * from cmt where post_id = ?';
                $getTotalCmt = pdo_get_all_rows($sql, $item['post_id']);
                $totalCmt = count($getTotalCmt);
                $time = date_format(date_create($item['time']), 'd-m-Y');
                if ($item['caption'] != '') $output = $item['caption'];
                else if ($item['post_video'] == '') $output = "<img src='../../images/post/{$item['img_post']}' height='100px'>";
                else $output = "<video src='../../video/post/{$item['post_video']}' height='100px'></video>";
                echo " <tr>
                            <td> $output </td>
                            <td> $time </td>
                            <td> $totalCmt </td>
                            <td>
                                <a href='?btn_list_cmt&post_id={$item['post_id']}' class='status edit'> Xem bình luận </a>
                            </td>
                        </tr>";
            }
            ?>


        </tbody>

    </table>
</div>


<!-- New Cmt -->
<div class="recentCustomers">
    <div class="cardHeader">
        <h2>Các bình luận mới nhất</h2>
    </div>
    <table>
        <?php
        $sql = 'select * from cmt join users on cmt.unique_id = users.unique_id order by cmt_time limit 10';
        $newCmt = pdo_get_all_rows($sql);
        foreach ($newCmt as $cmt) {
            $time = date_format(date_create($cmt['cmt_time']), 'H:i');
            echo "
                <tr>
                    <td width='180px'>

                    <a href='?btn_list_cmt&post_id={$cmt['post_id']}' >  {$cmt['content']} </a>
                    </td>
                    <td style = 'font-size:1.3rem'>
                        <h4>{$cmt['lname']}</h4> </br> đã bình luận lúc <span> $time </span>
                    </td>
                </tr>
                ";
        } ?>

    </table>
</div>