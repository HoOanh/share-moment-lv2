<!DOCTYPE html>
<html lang="en">
<script>
  let inter2=null;
</script>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Messenger</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom css -->
  <link rel="stylesheet" href="../../app/css/style.css" />
</head>

<body>
  <!-- header -->
  <header>
    <div class="header_wrap">
      <a href="../home/">
        <img class="header_wrap-logo" src="../../images/header/logo.png" alt="" />
      </a>
      <div class="header_user">
        <!-- User -->
        <img class="header_user-avatar header_user-icon" src="../../images/user/<?= $img ?>" alt="" />
        <div class="header_drop-user content-scrollbar" name="header_drop">
          <!-- headline -->
          <a href="">
            <div class="header_drop_headline">
              <div class="header_drop_headline-avatar">
                <img class="header_drop_content_avatar-images" src="../../images/user/<?= $img ?>" alt="" />
              </div>
              <div class="header_drop_headline-title-user">
                <p class="header_drop_headline-title-user-name">
                  <strong><?php echo $fname . " " . $lname ?></strong>
                </p>
                <p class="header_drop_headline-title-user-tag">@<?= $user_name ?></p>
              </div>
              <div class="header_drop_headline_utilities"></div>
            </div>
          </a>
          <!-- content -->
          <ul class="header_drop_content-user">
            <hr class="header_drop-hr-user" />
            <li>
              <a href="" class="">
                <i class="fas fa-cog"></i>
                <p>Tài Khoản</p>
              </a>
            </li>
            <li>
              <a href="" class="">
                <i class="fas fa-flag"></i>
                <p>Thiết Lập Trang</p>
              </a>
            </li>
            <!-- <li>
              <a href="" class="">
                <i class="fas fa-moon"></i>
                <p>Chế Độ Tối</p>
                <label class="header_drop_content-user-switch">
                  <input type="checkbox" />
                  <span class="header_drop_content-user-slider"></span>
                </label>
              </a>
            </li> -->
            <li>
              <a href="process.php?logout" class="">
                <i class="fas fa-sign-out-alt"></i>
                <p>Đăng Xuất</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div class="main">
    <!-- Section sidebar -->
    <div class="sideBar">
      <div class="toolList">
        <div class="tool tool-feed">
          <a href="../home/"> <i class="fas fa-home"></i></a>
          <div class="tool_popup">
            <span>Bảng Tin</span>
          </div>
        </div>

        <div class="tool tool-page">
          <a href="#"> <i class="fas fa-flag"></i> </a>
          <div class="tool_popup">
            <span>Trang</span>
          </div>
        </div>

        <div class="tool tool-video">
          <a href="#"> <i class="fas fa-film"></i> </a>
          <div class="tool_popup">
            <span>Videos</span>
          </div>
        </div>

        <div class="tool tool-photo">
          <a href="#"> <i class="fas fa-image"></i> </a>
          <div class="tool_popup">
            <span>Hình Ảnh</span>
          </div>
        </div>

        <div class="tool tool-blog">
          <a href="#"> <i class="fab fa-blogger"></i> </a>
          <div class="tool_popup">
            <span>Blog</span>
          </div>
        </div>

        <div class="tool tool-forum">
          <a href="#"> <i class="fas fa-comments"></i> </a>
          <div class="tool_popup">
            <span>Diễn Đàn</span>
          </div>
        </div>

      </div>
    </div>
    <!-- Section inbox -->
    <div class="messenger__inbox">
      <div class="messenger__inbox-headline">
        <h2>Tin nhắn</h2>
        <i class="fas fa-search"></i>
        <input type="text" name="search" class="inp-search" placeholder="Tìm kiếm" />
      </div>
      <div class="messenger__inbox-inner" id="inbox-inner">
        <div class="messenger__mark">
          <ul class="messenger__list">

          </ul>
        </div>
      </div>
    </div>
    <!-- Section chat -->
    <div class="section-chat">
      <?php
      $firstMess = '';
      if (isset($_GET['box_id'])) $firstMess = $_GET['box_id'];
      if ($firstMess) require "../../back-end/section-chat-first.php";
      ?>

    </div>

  </div>

  <!-- Custom JS -->
  <script src="../../app/js/script.js"></script>
  <script src="../../app/ajax/mess.js"></script>
  <script src="../../app/ajax/user.js"></script>
  <script src="../../app/ajax/last-activity.js"></script>


</body>

</html>