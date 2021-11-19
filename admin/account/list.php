<!-- oder details list -->
<div class="recentOrder">
    <div class="cardHeader">
        <h2>Manage Users</h2>
        <div class="ctl">
            <a href="?btn_add" class="ad-btn">Add new Type</a>
            <a href="?btn_viewAll" class="ad-btn">View All</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>Control</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($userList as $item) { ?>
                <tr>
                    <td><?= $item['fullName'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['role'] == 0 ? 'Client' : 'Admin' ?></td>
                    <td>
                        <a href="?btn_edit&idUs=<?= $item['idUser'] ?>" class="status edit"> Edit </a>
                        <a href="?btn_del&idUs=<?= $item['idUser'] ?>" class="status delete" onclick="return confirm('Bạn đã chắc chắn muốn xóa chưa?')"> Delete </a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>