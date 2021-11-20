<section class="recentOrder">
    <div class="cardHeader">
        <h2>Chỉnh Sửa Vai Trò Người Dùng</h2>
    </div>
    <form method="POST" id="form-login">
        <div class="user-details">
            <div class="input-box readonly">
                <span class="details">Số Thứ Tự</span>
                <input type="text" name="STT" value="<?= $user_id ?>" readonly />
            </div>
            <div class="input-box readonly">
                <span class="details">ID Đặc Biệt</span>
                <input type="text" name="unique_id" value="<?= $unique_id ?>" readonly />
            </div>
            <div class="input-box readonly">
                <span class="details">Họ</span>
                <input type="text" name="fname" value="<?= $fname ?>" readonly />
            </div>
            <div class="input-box readonly">
                <span class="details">Tên</span>
                <input type="text" name="lname" value="<?= $lname ?>" readonly />
            </div>
            <div class="input-box readonly">
                <span class="details">Tên Tài Khoản</span>
                <input type="text" name="user_name" value="<?= $user_name ?>" readonly />
            </div>
            <div class="input-box field readonly">
                <span class="details">Mật Khẩu</span>
                <input type="password" name="pass" value="<?= $pass ?>" readonly />
                <i class="fas fa-eye"></i>
            </div>
            <div class="input-box readonly">
                <span class="details">Email</span>
                <input type="email" name="email" value="<?= $email ?>" readonly />
            </div>
            <div class="input-box readonly">
                <span class="details">Số Điện Thoại</span>
                <input type="text" name="phone" value="<?= $phone ?>" readonly />
            </div>


            <div class="gender-details input-box">
                <input type="radio" name="role" id="dot-1" value="0" <?php if ($role == 0) echo 'checked' ?> />
                <input type="radio" name="role" id="dot-2" value="1" <?php if ($role == 1) echo 'checked' ?> />
                <div class="category">
                    <span class="gender-title">Vai trò:</span>
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Người dùng</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Admin</span>
                    </label>
                </div>
            </div>

            <div class="gender-details input-box readonly">
                <input type="radio" name="gender" id="dot-3" value="0" <?php if ($gender == 0) echo 'checked' ?> />
                <input type="radio" name="gender" id="dot-4" value="1" <?php if ($gender == 1) echo 'checked' ?> />
                <input type="radio" name="gender" id="dot-5" value="2" <?php if ($gender == 2) echo 'checked' ?> />
                <div class="category readonly">
                    <span class="gender-title">Giới Tính:</span>
                    <label for="dot-3">
                        <span class="dot third"></span>
                        <span class="gender">Nữ</span>
                    </label>
                    <label for="dot-4">
                        <span class="dot fourth"></span>
                        <span class="gender">Nam</span>
                    </label>
                    <label for="dot-5">
                        <span class="dot fifth"></span>
                        <span class="gender">Khác</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="button">

            <button type="submit" id="user-button" class="btn sm-btn">Thay Đổi Vai Trò</button>
            <a href="?btn_ban&box_id=<?= $unique_id ?>" class="btn sm-btn">Ban</a>
            <a href="?btn_unban&box_id=<?= $unique_id ?>" class="btn sm-btn">Unban</a>
            <a href="../account/" class="btn sm-btn">Về Danh Sách</a>
        </div>
    </form>
</section>
<section>
    <div class="input-box-avatar">
        <span class="details">Ảnh Đại diện</span>
        <img src="../../images/user/<?= $img ?>" alt="">
    </div>
</section>

<script src="../../app/js/pass-show-hide.js"></script>
<script src="../../app/ajax/user_edit.js"></script>