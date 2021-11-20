<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sharemoment || Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- style link -->
    <link rel="stylesheet" href="../../app/css/admin/style.css">
    <script src="../../app/js/js-admin/jQuery/jquery-3.6.0.min.js"></script>
    <style>
        .title-home {
            position: absolute;
            left: 40px;
            font-size: 20px;
            z-index: 100;
            top: 70px;
        }
    </style>
</head>

<body>
    <div class="admin">
        <div class="contain">
            <?php require 'nav.php' ?>
        </div>

        <div class="main_">
            <div class="topbar">
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>



                <!-- userImg -->
                <?php
                $sql = "select img from users where unique_id = ?";
                $admin = pdo_get_one_row($sql, $_SESSION['unique_id']);
                ?>
                <div class="user">
                    <img src="../../images/user/<?= $admin['img'] ?>" />
                </div>
            </div>
            <?php if ($VIEW_NAME == 'dashboard/home.php') { ?>
                <h2 class="title-home">Thống kê trong 24h</h2>
                <?php
                $sql = "select count(*) as user from users where TIMESTAMPDIFF(second, last_activity, now()) < 86400 ";
                $user = pdo_get_one_row($sql);

                $sql =  "select * from post where TIMESTAMPDIFF(second, time, now()) < 86400";
                $post = pdo_get_all_rows($sql);

                $like = 0;
                foreach ($post as $item) {
                    $sql = "select count(*) as sum from likes where post_id = ?";
                    $sum = pdo_get_one_row($sql, $item['post_id']);
                    $like += $sum['sum'];
                }

                $sql =  "select count(*) as cmt from cmt where TIMESTAMPDIFF(second, cmt_time, now()) < 86400";
                $cmt = pdo_get_one_row($sql);
                ?>
                <!-- cards -->
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers"><?= count($post) ?></div>
                            <div class="cardName">Bài viết</div>
                        </div>

                        <div class="iconBox">
                            <i class="fas fa-pen-alt"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?= $cmt['cmt'] ?></div>
                            <div class="cardName">Bình luận</div>
                        </div>

                        <div class="iconBox">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?= $like ?></div>
                            <div class="cardName">Lượt thích</div>
                        </div>

                        <div class="iconBox">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $user['user'] ?></div>
                            <div class="cardName">Người truy cập</div>
                        </div>

                        <div class="iconBox">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <!-- chart -->

                <div class="graphBox">

                    <div class="box">
                        <canvas id="myChart"></canvas>
                    </div>

                    <div class="box">
                        <canvas id="earning"></canvas>
                    </div>
                </div>
            <?php } ?>
            <div class="detail">
                <?php require $VIEW_NAME; ?>
            </div>
        </div>
    </div>
</body>

<script src="../../app/js/js-admin/admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script src="../../app/js/js-admin/my-chart.js"></script>

</html>