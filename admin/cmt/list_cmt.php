<!-- oder details list -->
<div class="recentOrder">
    <div class="cardHeader">
        <h2>Chi tiết bình luận</h2>
        <div class="ctl">
            <a href="../cmt/" class="back">Trở về</a>
        </div>
    </div>

    <table>

        <?php
        $post_id = $_GET['post_id'];
        $sql = 'select * from cmt join users on (cmt.unique_id = users.unique_id) and (post_id = ?)';
        $listCmt = pdo_get_all_rows($sql, $post_id);
        if ($listCmt) {
            echo "
                <thead>
                    <tr>
                        <td>Nội Dung</td>
                        <td>Thời gian bình luận</td>
                        <td>Người bình luận</td>
                        <td>Lựa chọn</td>
                    </tr>
                </thead>
                <tbody>";
            foreach ($listCmt as $item) {
                extract($item);
                $time = date_format(date_create($cmt_time), 'H:i');
                $date = date_format(date_create($cmt_time), 'd-m-Y');
                if (!$showHide) $hide = "style= 'background: #00158782'";
                else $hide = '';
                if ($showHide) $btn_showHide = "<a href='?btn_hide&cmt_id={$item['cmt_id']}' class='status edit'> Ẩn </a>";
                else $btn_showHide = "<a href='?btn_show&cmt_id={$item['cmt_id']}' class='status edit'> Hiện </a>";
                echo " <tr $hide>
                                <td style='max-width:200px'> $content </td>
                                <td> $time ngày $date </td>
                                <td> $fname $lname </td>
                                <td>
                                    $btn_showHide
                                    <a href='?btn_delete&cmt_id={$item['cmt_id']}' class='status delete'> Xóa </a>
                                </td>
                            </tr>";
            }
        } else {
            echo " <td style='text-align: center'> Bài viết chưa có bình luận </td>";
        }
        ?>
        </tbody>
    </table>
</div>