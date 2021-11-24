<!-- post list -->
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
                else $output = "<video src='../../video/post/{$item['post_video']}' height='100px' controls></video>";
                echo " <tr>
                            <td style='max-width:200px'> $output </td>
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
    <?php
    $base_url = "?list";
    echo buildLinkBreakPage($base_url, $total_rows, $page_num, $page_size);
    ?>
</div>


<!-- New Cmt -->
<div class="recentCustomers">
    <div class="cardHeader">
        <h2>Các bình luận mới nhất</h2>
    </div>
    <table>
        <?php
        $sql = 'select * from cmt join users on cmt.unique_id = users.unique_id order by cmt_time desc limit 5';
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


<!-- oder details list -->
<div class="recentOrder">
    <div class="cardHeader">
        <h2>Các bình luận tiêu cực</h2>
    </div>

    <table>
        <thead>
            <tr>
                <td>Nội dung</td>
                <td>Ngày bình luận</td>
                <td>Người bình luận</td>
                <td>Lựa chọn</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from cmt join users on cmt.unique_id = users.unique_id order by cmt_time desc";
            $listAllCmt = pdo_get_all_rows($sql);
            $filterRegex = "(cặc|lồn|lozz|địt|đỉ|fuck)";
            foreach ($listAllCmt as $cmt) {
                extract($cmt);
                if (preg_match($filterRegex, mb_strtolower($content, 'UTF-8'), $masss)) {
                    $time = date_format(date_create($cmt_time), 'H:i');
                    $date = date_format(date_create($cmt_time), 'd-m-Y');
                    if (!$showHide) $hide = "style= 'background: #00158782'";
                    else $hide = '';
                    if ($showHide) $btn_showHide = "<a href='?btn_hide&cmt_id=$cmt_id' class='status edit'> Ẩn </a>";
                    else $btn_showHide = "<a href='?btn_show&cmt_id=$cmt_id' class='status edit'> Hiện </a>";
                    echo " <tr $hide>
                                    <td style='max-width:200px'> $content </td>
                                    <td> $time ngày $date </td>
                                    <td> $fname $lname </td>
                                    <td>
                                        $btn_showHide
                                        <a href='?btn_delete&cmt_id={$cmt_id}' class='status delete'> Xóa </a>
                                    </td>
                                </tr>";
                }
            }
            ?>


        </tbody>

    </table>
</div>