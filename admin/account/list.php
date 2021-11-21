<style>
    .detail {
        overflow-x: scroll;
    }
</style>
<!-- oder details list -->
<div class="recentOrder list">
    <div class="cardHeader">
        <h2>Quản lý người dùng</h2>
        <div class="ctl">
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <td>STT</td>
                <td>ID Đặc Biệt</td>
                <td>Họ</td>
                <td>Tên</td>
                <td>Email</td>
                <td>Giới Tính</td>
                <td>Số Điện Thoại</td>
                <td>Ngày Gia Nhập</td>
                <td>Vai Trò</td>
                <td>Trạng Thái</td>
                <td>Lựa Chọn</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($usersList as $item) { ?>
                <tr>
                    <td><?= $item['user_id'] ?></td>
                    <td><?= $item['unique_id'] ?></td>
                    <td><?= $item['fname'] ?></td>
                    <td><?= $item['lname'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?php switch ($item['gender']) {
                            case '0':
                                echo "Nữ";
                                break;
                            case '1':
                                echo "Nam";
                                break;
                            case '2':
                                echo "Khác";
                                break;
                        } ?></td>
                    <td><?= $item['phone'] ?></td>
                    <td><?= $item['date_join'] == NULL ? 'Không Xác Định' : $item['date_join'] ?></td>
                    <td><?= $item['role'] == 0 ? 'Người Dùng' : 'Admin' ?></td>
                    <td><?= $item['anhien'] == 0 ? 'Bị Chặn' : 'Bình Thường' ?></td>
                    <td>
                        <a href="?btn_edit&box_id=<?= $item['unique_id'] ?>" class="status edit"> Sửa </a>
                        <a href="?btn_del&box_id=<?= $item['unique_id'] ?>" class="status delete" onclick="return confirm('Bạn đã chắc chắn muốn xóa chưa?')"> Xóa </a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>