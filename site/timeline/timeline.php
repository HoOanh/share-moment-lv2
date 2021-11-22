<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="../../images/header/logo-mobile.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Sharemoment | <?= $timeline_user['fname'] . " " . $timeline_user['lname'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">

    <!-- FONT AWESOME CDNJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="../../app/css/css-home/uikit.min.css">
    <link rel="stylesheet" href="../../app/css/css-home/style.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../app/css/toast.css">

</head>


<style>
    .hidden {
        display: hidden;
    }

    #new-post>div:not(:last-child) {
        margin-bottom: 40px;
    }
</style>


<body>

    <div id="show-msg"></div>
    <div id="wrapper">

        <!-- Header -->
        <header>
            <div class="header_wrap">
                <div class="header_inner mcontainer">
                    <div class="left_side">

                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path>
                            </svg>
                        </span>

                        <div id="logo">
                            <a href="../home/">
                                <img src="../../images/header/logo.png" alt="">
                                <img src="../../images/header/logo-mobile.png" class="logo_mobile" alt="">
                            </a>
                        </div>
                    </div>

                    <!--  icon for mobile -->
                    <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
                    <div class="header_search"><i class="fas fa-search"></i>
                        <input value="" id="search-User-In-Home" type="text" class="form-control" placeholder="Tìm kiếm người dùng, video và ..." autocomplete="off">
                        <div uk-drop="mode: click" class="header_search_dropdown" id="search-User-Container">

                            <h4 class='search_title'> Nhập để bắt đầu tìm kiếm </h4>

                        </div>
                    </div>

                    <div class="right_side">

                        <div class="header_widgets">

                            <!-- Message -->
                            <a href="#" class="is_icon" uk-tooltip="title: Tin nhắn">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                </svg>
                                <!-- <span>4</span> -->
                            </a>
                            <div uk-drop="mode: click" class="header_dropdown is_message">
                                <div class="dropdown_scrollbar" data-simplebar>
                                    <div class="drop_headline">
                                        <h4>Tin nhắn </h4>
                                        <div class="btn_action">
                                            <a href="#" data-tippy-placement="left" title="Notifications">
                                                <ion-icon name="settings-outline" uk-tooltip="title: Message settings ; pos: left"></ion-icon>
                                            </a>
                                            <a href="#" data-tippy-placement="left" title="Mark as read all">
                                                <ion-icon name="checkbox-outline"></ion-icon>
                                            </a>
                                        </div>
                                    </div>
                                    <input type="text" class="uk-input" placeholder="Tìm kiếm trong tin nhắn">
                                    <ul id="messageUserContainer">
                                    </ul>
                                </div>
                                <a href="../chat/" class="see-all">Xem tất cả tin nhắn</a>
                            </div>

                            <!-- avatar -->
                            <?php
                            $sql = "SELECT * from users where unique_id = ?";
                            $userMain = pdo_get_one_row($sql, $_SESSION['unique_id']);
                            extract($userMain);
                            ?>
                            <a href="#">
                                <img src="../../images/user/<?= $img ?>" class="is_avatar oldAvatar" alt="">
                            </a>
                            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                                <a href="../timeline/" class="user">
                                    <div class="user_avatar">
                                        <img src="../../images/user/<?= $img ?>" style="width:100%; height:100%" class="oldAvatar">
                                    </div>
                                    <div class="user_name">
                                        <div> <?php echo $fname . " " . $lname ?> </div>
                                        <span> @<?= $user_name ?></span>
                                    </div>
                                </a>
                                <hr>

                                <a href="../setting/">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Tài khoản
                                </a>
                                <?php

                                $sql = "select * from users where unique_id = ? and role =1 ";

                                $isAdmin = pdo_get_one_row($sql, $_SESSION['unique_id']);

                                if ($isAdmin != []) {
                                    echo "<a href='../../admin/'>
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor'>
                                            <path fill-rule='evenodd' d='M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z' clip-rule='evenodd' />
                                        </svg>
                                        Thiết lập trang
                                    </a>";
                                }

                                ?>
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                    </svg>
                                    Chế độ tối
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                                <a href="../chat/process.php?logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Đăng xuất
                                </a>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </header>

        <!-- sidebar -->
        <div class="sidebar">

            <div class="sidebar_inner" data-simplebar>

                <ul>
                    <li class="active"><a href="../home/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span> Bảng tin </span> </a>
                    </li>
                    <li><a href="pages.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Trang </span> </a>
                    </li>
                    <li><a href="../chat/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                            </svg>
                            <span> Tin Nhắn </span> </a>
                    </li>
                    <li><a href="videos.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-red-500">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 2h6v4H7V5zm8 8v2h1v-2h-1zm-2-2H7v4h6v-4zm2 0h1V9h-1v2zm1-4V5h-1v2h1zM5 5v2H4V5h1zm0 4H4v2h1V9zm-1 4h1v2H4v-2z" clip-rule="evenodd" />
                            </svg>
                            <span> Video</span></a>
                    </li>
                    <li><a href="groups.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg><span> Nhóm </span></a>
                    </li>
                    <li id="more-veiw" hidden><a href="blogs.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span> Blog</span></a>
                    </li>
                    <li id="more-veiw" hidden><a href="forums.html">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                            </svg>
                            <span> Diễn đàn</span> </a>
                    </li>

                </ul>

                <a href="#" class="see-mover h-10 flex my-1 pl-2 rounded-xl text-gray-600" uk-toggle="target: #more-veiw; animation: uk-animation-fade">
                    <span class="w-full flex items-center" id="more-veiw">
                        <svg class="  bg-gray-100 mr-2 p-0.5 rounded-full text-lg w-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Xem Thêm
                    </span>
                    <span class="w-full flex items-center" id="more-veiw" hidden>
                        <svg class="bg-gray-100 mr-2 p-0.5 rounded-full text-lg w-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Ẩn bớt
                    </span>
                </a>

                <h3 class="side-title"> Liên Hệ </h3>
                <div class="contact-list my-2 ml-1">
                    <?php
                    $sql = "SELECT * FROM users WHERE role = 1";
                    $admin = pdo_get_all_rows($sql);

                    foreach ($admin as $item) {
                        extract($item);
                        if ($user_status == "Đang hoạt động") $status = "user_status status_online";
                        echo "
                      <a href='?timeline_id={$unique_id}'>
                        <div class='contact-avatar'>
                            <img src='../../images/user/$img' >
                            <span class='user_status $status '></span>
                        </div>
                        <div class='contact-username'>$fname $lname </div>
                    </a>
                      ";
                    }
                    ?>
                </div>

                <div class="footer-links">
                    <a href="#">About</a>
                    <a href="#">Blog </a>
                    <a href="#">Careers</a>
                    <a href="#">Support</a>
                    <a href="#">Contact Us </a>
                    <a href="#">Developer</a>
                    <a href="#">Terms of service</a>
                </div>

            </div>

            <!-- sidebar overly for mobile -->
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>

        <!-- Main Contents -->
        <div class="main_content">
            <div class="mcontainer">

                <!-- Profile cover -->
                <div class="profile user-profile">

                    <div class="profiles_banner">
                        <img src="../../images/background/<?= $timeline_user['bg_user'] ?>" class="oldBg">
                        <!-- <div class="profile_action absolute bottom-0 right-0 space-x-1.5 p-3 text-sm z-50 hidden lg:flex">
                            <a href="#" class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                                <i class="far fa-edit"></i>
                                <span> Chỉnh sửa </span>
                            </a>
                        </div> -->
                    </div>
                    <div class="profiles_content">

                        <div class="profile_avatar">
                            <div class="profile_avatar_holder">
                                <img src="../../images/user/<?= $timeline_user['img'] ?>" alt="" class='oldAvatar'>
                            </div>
                            <div class="user_status <?php if ($timeline_user['user_status'] != 'Offline') echo 'status_online' ?>"></div>
                            <div class="icon_change_photo" hidden>
                                <ion-icon name="camera" class="text-xl"></ion-icon>
                            </div>
                        </div>

                        <div class="profile_info">
                            <h1> <?= $timeline_user['fname'] . " " . $timeline_user['lname'] ?> </h1>
                            <p> <?= $timeline_user['user_about'] ?></p>
                        </div>

                    </div>

                    <div class="flex justify-between lg:border-t border-gray-100 flex-col-reverse lg:flex-row pt-2">
                        <nav class="responsive-nav pl-3">
                            <ul uk-switcher="connect: #timeline-tab; animation: uk-animation-fade">
                                <li><a href="">Dòng thời gian</a></li>
                                <li><a href="">Hình ảnh </a></li>
                                <li><a href="">Video</a></li>

                            </ul>
                        </nav>

                        <!-- button actions -->
                        <div class="flex items-center space-x-1.5 flex-shrink-0 pr-4 mb-2 justify-center order-1 relative">

                            <!-- add story -->
                            <?php if (!isset($_GET['timeline_id'])) {
                                echo "
                                    <a href='#' class='flex items-center justify-center h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white' uk-toggle='target: #create-post-modal'>
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' class='w-5'>
                                            <path fill-rule='evenodd' d='M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z' clip-rule='evenodd'></path>
                                        </svg>
                                        <span> Thêm bài viết </span>
                                    </a>
                               ";
                            } ?>

                            <!-- more icon -->
                            <a href="#" class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100">
                                <i class="fas fa-ellipsis-h"></i>
                            </a>
                            <!-- more drowpdown -->
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700" uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small; offset:5">
                                <ul class="space-y-1">
                                    <?php 
                                    
                                    if(!isset($_GET['timeline_id'])){
                                        echo " <li>
                                        <form enctype='multipart/form-data' id='form-change-avatar'>
                                            <input type='file' id='change-avatar' name='img'>
                                        </form>
                                    </li>
                                    <li>
                                        <form enctype='multipart/form-data' id='form-change-bg'>
                                            <input type='file' id='change-bg' name='img-bg'>
                                        </form>
                                    </li>
";
                                    }
                                    
                                    ?>
                                   
                                    <script>
                                        const changeAvatarBtn = document.querySelector("#change-avatar");
                                        const formChangeAvatar = document.querySelector("#form-change-avatar");
                                        changeAvatarBtn.addEventListener('change', function() {
                                            let http = new XMLHttpRequest();

                                            http.open("post", "../../back-end/change-avatar.php");

                                            http.onload = function() {
                                                if (http.readyState === XMLHttpRequest.DONE) {
                                                    if (http.status === 200) {
                                                        // Add toast
                                                        let data = JSON.parse(http.response);
                                                        


                                                        if (data['res_status'] === 'success') {
                                                            let msg = data['msg'];
                                                            document.querySelector('#show-msg').innerHTML += `
                                                            <div class='alert alert--success show'>
                                                            <i class='fas fa-check'></i>
                                                            <span class='msg'>${msg}</span>
                                                            <span class='close-btn'>
                                                            <span class='fas fa-times'></span>
                                                            </span>
                                                            </div>
                                                            `;
                                                            document.querySelectorAll(".oldAvatar").forEach(e=>{
                                                                e.setAttribute("src","../../images/user/" + data['newAvatar']);
                                                            });

                                                        };

                                                        if (data['res_status'] === 'error') {
                                                            let msg = data['data'];
                                                            document.querySelector('#show-msg').innerHTML += `
                                                            <div class='alert alert--error show'>
                                                            <i class='fas fa-exclamation-circle'></i>
                                                            <span class='msg'>${msg}</span>
                                                            <span class='close-btn'>
                                                            <span class='fas fa-times'></span>
                                                            </span>
                                                            </div>
                                                            `;
                                                        }

                                                        (function() {
                                                            setTimeout(function() {
                                                                document.querySelector(".alert").classList.remove("show");
                                                                document.querySelector(".alert").classList.add("hide");

                                                                setTimeout(function() {
                                                                    document.querySelector('#show-msg').innerHTML = '';
                                                                }, 1500);
                                                            }, 5000)
                                                            document.querySelector(".close-btn").addEventListener("click", function() {
                                                                document.querySelector(".alert").classList.remove("show");
                                                                document.querySelector(".alert").classList.add("hide");
                                                                setTimeout(function() {
                                                                    document.querySelector('#show-msg').innerHTML = '';
                                                                }, 1500)
                                                            })
                                                        })();
                                                    }
                                                }
                                            }


                                            let formData = new FormData(formChangeAvatar);
                                            console.log(formData);
                                            http.send(formData);
                                        })
                                        const changeBgBtn = document.querySelector("#change-bg");
                                        const formChangeBg = document.querySelector("#form-change-bg");
                                        changeBgBtn.addEventListener('change', function() {
                                            let http = new XMLHttpRequest();

                                            http.open("post", "../../back-end/change-bg.php");

                                            http.onload = function() {
                                                if (http.readyState === XMLHttpRequest.DONE) {
                                                    if (http.status === 200) {
                                                        // Add toast
                                                        let data = JSON.parse(http.response);
                                                        


                                                        if (data['res_status'] === 'success') {
                                                            let msg = data['msg'];
                                                            document.querySelector('#show-msg').innerHTML += `
                                                            <div class='alert alert--success show'>
                                                            <i class='fas fa-check'></i>
                                                            <span class='msg'>${msg}</span>
                                                            <span class='close-btn'>
                                                            <span class='fas fa-times'></span>
                                                            </span>
                                                            </div>
                                                            `;
                                                            document.querySelectorAll(".oldBg").forEach(e=>{
                                                                e.setAttribute("src","../../images/background/" + data['newAvatar']);
                                                            });

                                                        };

                                                        if (data['res_status'] === 'error') {
                                                            let msg = data['data'];
                                                            document.querySelector('#show-msg').innerHTML += `
                                                            <div class='alert alert--error show'>
                                                            <i class='fas fa-exclamation-circle'></i>
                                                            <span class='msg'>${msg}</span>
                                                            <span class='close-btn'>
                                                            <span class='fas fa-times'></span>
                                                            </span>
                                                            </div>
                                                            `;
                                                        }

                                                        (function() {
                                                            setTimeout(function() {
                                                                document.querySelector(".alert").classList.remove("show");
                                                                document.querySelector(".alert").classList.add("hide");

                                                                setTimeout(function() {
                                                                    document.querySelector('#show-msg').innerHTML = '';
                                                                }, 1500);
                                                            }, 5000)
                                                            document.querySelector(".close-btn").addEventListener("click", function() {
                                                                document.querySelector(".alert").classList.remove("show");
                                                                document.querySelector(".alert").classList.add("hide");
                                                                setTimeout(function() {
                                                                    document.querySelector('#show-msg').innerHTML = '';
                                                                }, 1500)
                                                            })
                                                        })();
                                                    }
                                                }
                                            }


                                            let formData = new FormData(formChangeBg);
                                          
                                            http.send(formData);
                                        })
                                    </script>


                                    <li>
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="far fa-bell-slash mr-1"></i> Ẩn thông báo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="far fa-star mr-1"></i> Thêm vào yêu thích
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-50 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <i class="fas fa-stop-circle mr-1"></i> Hủy kết bạn
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="uk-switcher lg:mt-8 mt-4" id="timeline-tab">

                    <!-- Timeline -->
                    <div class="md:flex md:space-x-6 lg:mx-16">
                        <!-- <div class="space-y-5 flex-shrink-0 md:w-7/12"> </div> -->
                        <div class="space-y-5 flex-shrink-0 md:w-7/12 " id="container-feed-content">

                            <!-- create post -->
                            <?php
                            if (!isset($_GET['timeline_id'])) {
                                echo "
                                        <div class='card lg:mx-0 p-4' uk-toggle='target: #create-post-modal'>
                                            <div class='flex space-x-3'>
                                                <img src='../../images/user/$img' class='w-10 h-10 rounded-full'>
                                                <input placeholder='Bạn đang nghĩ gì vậy? $lname!' class='bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full'>
                                            </div>
                                            <div class='grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm'>
                                                <div class='hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer'>
                                                    <svg class='bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block' data-tippy-placement='top' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
                                                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'></path>
                                                    </svg> Ảnh/Video
                                                </div>
                                                <div class='hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer'>
                                                    <svg class='bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' title='' aria-expanded='false'>
                                                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'></path>
                                                    </svg> Gắn thẻ
                                                </div>
                                                <div class='hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer'>
                                                    <svg class='bg-red-100 h-9 mr-2 p-1.5 rounded-full text-red-600 w-9 -my-0.5 hidden lg:block' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
                                                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                                                    </svg> Cảm thấy/Hoạt động
                                                </div>
                                            </div>
                                        </div>
                                    ";
                            }

                            ?>

                            <div id='new-post'>
                            </div>
                            <?php
                            if (isset($_GET['timeline_id'])) $sql2 = "Select * FROM post INNER JOIN users ON (users.unique_id = post.unique_id) and (post.unique_id = ?) and (post.post_role = 1) and (post.post_status = 1)  ORDER BY post_id DESC LIMIT 5 ";
                            else $sql2 = "Select * FROM post INNER JOIN users ON (users.unique_id = post.unique_id) and (post.unique_id = ?) and (post.post_status = 1) ORDER BY post_id DESC LIMIT 5 ";
                            $feedList = pdo_get_all_rows($sql2, $timeline_id);
                            foreach ($feedList as $item) {
                                extract($item);

                                $sql = "Select count(*) as total from likes where post_id = ?";
                                $res = pdo_get_one_row($sql, $post_id);

                                $sql2 = "Select * from cmt where post_id = ? and showHide = 1 order by cmt_id desc limit 2";
                                $res2 = pdo_get_all_rows($sql2, $post_id);


                                $sql3 = "Select * from likes where unique_id = ? and post_id = ?";
                                $checkLike = pdo_get_one_row($sql3, $_SESSION['unique_id'], $post_id);
                                if ($checkLike == []) $liked = '';
                                else $liked = 'active';

                                $allCmt = '';
                                foreach ($res2 as $cmt) {

                                    extract($cmt);

                                    $sql = "SELECT * FROM users WHERE unique_id = ?";
                                    $getUserCmt = pdo_get_one_row($sql, $unique_id);
                                    $allCmt .= "
                                        <div class='flex'>
                                            <div class='w-10 h-10 rounded-full relative flex-shrink-0'>
                                                <img src='../../images/user/{$getUserCmt['img']}' alt='' class='absolute h-full rounded-full w-full'>
                                            </div>
                                            <div>
                                                <div class='text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100'>
                                                    <p class='leading-6'>{$content}

                                                    </p>
                                                    <div class='absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800'></div>
                                                </div>
                                                <div class='text-sm flex items-center space-x-3 mt-2 ml-5'>
                                                    <a href='#' class='text-red-600'> <i class='far fa-heart mr-1'></i>Love </a>
                                                    <a href='#'> Replay </a>
                                                    <span> {$cmt_time} </span>
                                                </div>
                                            </div>
                                        </div>";
                                }
                                $sql3 = "Select * from cmt where post_id = ? and showHide = 1 order by cmt_id desc";
                                $res3 = pdo_get_all_rows($sql3, $post_id);
                                $moreCmt = "";
                                if (count($res3) > 2) {
                                    $moreCmt = "  <a data='{$post_id}' class='hover:text-blue-600 hover:underline more-cmt'> Xem thêm bình luận</a>";
                                }

                                $message = "
                                            <div class='flex items-center' >
                                                        <img src='../../images/post/like-icon.png' alt='' class='w-6 h-6 rounded-full border-2 border-white dark:border-gray-900'>
                                            <span class='quantity-like' style='margin-left: 0.15em;'>{$res['total']} <strong> lượt thích </strong> </span>
                                            </div>";
                                if ($res['total'] == 0) {
                                    $message = "<span class='quantity-like'></span><strong>Hãy là người đầu tiên thích bài viết này </strong>";
                                }


                                if ($post_role) $role = "<i class='fas fa-user-friends ml-1'></i>";
                                else $role = "<i class='fas fa-user-lock ml-1'></i>";

                                if ($post_video != '') {
                                    echo "
                                            <div class='card lg:mx-0 uk-animation-slide-bottom-small'>
                                            <div class='flex justify-between items-center lg:p-4 p-2.5'>
                                                <div class='flex flex-1 items-center space-x-4'>
                                                    <a href='#'>
                                                        <img src='../../images/user/$img' class='bg-gray-200 border border-white rounded-full w-10 h-10'>
                                                    </a>
                                                    <div class='flex-1 font-semibold capitalize'>
                                                        <a href='?timeline_id=$unique_id' class='text-black dark:text-gray-100'> $fname $lname </a>
                                                        <div class='text-gray-700 flex items-center space-x-2'> $time
                                                            $role
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href='#'> <i class='fas fa-ellipsis-h'></i>
                                                    <div class='bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700' uk-drop='mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small'>

                                                        <ul class='space-y-1'>

                                                            <li>
                                                                <a class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                <i class='fas fa-share-alt mr-1'></i> Chia sẻ
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='far fa-edit mr-1'></i> Chỉnh sửa
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='uil-comment-slash mr-1'></i> Tắt bình luận
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='uil-favorite mr-1'></i> Thêm vào yêu thích
                                                                </a>
                                                                </li>";

                                    if ($unique_id === $_SESSION['unique_id']) {
                                        echo "
                                                            <li>
                                                                <hr class='-mx-2 my-2 dark:border-gray-800'>
                                                            </li>
                                                            <li post_id='$post_id' unique_id='$unique_id' listener='false' class='deleteBtn'>
                                                                <a class='flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600'>
                                                                    <i class='far fa-trash-alt mr-1'></i> Xóa bài viết
                                                                </a>
                                                            </li>";
                                    }

                                    echo "
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='p-5 pt-0 border-b dark:border-gray-700'>
                                            $caption
                                            </div>

                                            <div class='w-full h-full'>
                                            <video controls src=\"../../video/post/{$post_video}\"  frameborder='0' allowfullscreen uk-responsive class='w-full lg:h-64 h-40'></vid>
                                        </div>
                                            <div class='p-4 space-y-3'>
                                                <div class='flex space-x-4 lg:font-bold'>
                                                    <a data='{$post_id}'class='flex items-center space-x-2 like-btn $liked'>
                                                        <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                                                <path d='M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z' />
                                                            </svg>
                                                        </div>
                                                        <div> Thích</div>
                                                    </a>
                                                    <a href='#' class='flex items-center space-x-2'>
                                                        <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                                                <path fill-rule='evenodd' d='M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z' clip-rule='evenodd' />
                                                            </svg>
                                                        </div>
                                                        <div> Bình luận</div>
                                                    </a>
                                                    <a href='#' class='flex items-center space-x-2 flex-1 justify-end'>
                                                        <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                                                <path d='M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z' />
                                                            </svg>
                                                        </div>
                                                        <div> Chia sẻ</div>
                                                    </a>
                                                </div>
                                                <div class='flex items-center space-x-3 pt-2'>
                                                    <div class='dark:text-gray-100'>
                                                        {$message}
                                                    </div>
                                                </div>




                                                <div class='border-t py-4 space-y-4 dark:border-gray-600 box-comment'>
                                                    {$allCmt}

                                                </div>

                                            {$moreCmt}

                                                <div class='bg-gray-100 rounded-full relative dark:bg-gray-800 border-t'>
                                                    <input data='{$post_id}'  placeholder='Add your Comment..' class='  bg-transparent max-h-10 shadow-none px-5 add-cmt'>
                                                    <div class='-m-0.5 absolute bottom-0 flex items-center right-3 text-xl'>
                                                        <a href='#'>
                                                            <i class='far fa-smile write__input-more'></i>
                                                        </a>
                                                        <a href='#'>
                                                            <i class='far fa-image write__input-more'></i>
                                                        </a>
                                                        <a href='#'>
                                                            <i class='fas fa-paperclip write__input-more'></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>";
                                } else {
                                    echo "
                                            <div class='card lg:mx-0 uk-animation-slide-bottom-small'>

                                            <div class='flex justify-between items-center lg:p-4 p-2.5'>
                                                <div class='flex flex-1 items-center space-x-4'>
                                                    <a href='#'>
                                                        <img src='../../images/user/$img' class='bg-gray-200 border border-white rounded-full w-10 h-10'>
                                                    </a>
                                                    <div class='flex-1 font-semibold capitalize'>
                                                        <a href='?timeline_id=$unique_id' class='text-black dark:text-gray-100'> $fname $lname </a>
                                                        <div class='text-gray-700 flex items-center space-x-2'> $time
                                                        $role
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href='#'> <i class='fas fa-ellipsis-h'></i> </a>
                                                    <div class='bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700' uk-drop='mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small'>

                                                        <ul class='space-y-1'>
                                                            <li class='ajax-download-btn'>
                                                                <a class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='fas fa-download mr-1'></i> Tải ảnh
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='fas fa-share-alt mr-1'></i> Chia sẻ
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='far fa-edit mr-1'></i> Chỉnh sửa
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='uil-comment-slash mr-1'></i> Tắt bình luận
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                                                    <i class='uil-favorite mr-1'></i> Thêm vào yêu thích
                                                                </a>
                                                                </li>";

                                    if ($unique_id === $_SESSION['unique_id']) {
                                        echo "
                                                            <li>
                                                                <hr class='-mx-2 my-2 dark:border-gray-800'>
                                                            </li>
                                                            <li post_id='$post_id' unique_id='$unique_id' listener='false' class='deleteBtn'>
                                                                <a class='flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600'>
                                                                    <i class='far fa-trash-alt mr-1'></i> Xóa bài viết
                                                                </a>
                                                            </li>";
                                    }

                                    echo "
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='p-5 pt-0 border-b dark:border-gray-700'>
                                            $caption
                                            </div>

                                            <div uk-lightbox>
                                                <a href='../../images/post/$img_post'>
                                                    <img src='../../images/post/$img_post' alt='' class='max-h-96 w-full object-cover ajax-image'>
                                                </a>
                                            </div>


                                            <div class='p-4 space-y-3'>

                                                <div class='flex space-x-4 lg:font-bold'>
                                                    <a data = '{$post_id}'  class='flex items-center space-x-2 like-btn $liked'>
                                                        <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                                                <path d='M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z' />
                                                            </svg>
                                                        </div>
                                                        <div> Thích</div>
                                                    </a>
                                                    <a href='#' class='flex items-center space-x-2'>
                                                        <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                                                <path fill-rule='evenodd' d='M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z' clip-rule='evenodd' />
                                                            </svg>
                                                        </div>
                                                        <div> Bình luận</div>
                                                    </a>
                                                    <a href='#' class='flex items-center space-x-2 flex-1 justify-end'>
                                                        <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                                                <path d='M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z' />
                                                            </svg>
                                                        </div>
                                                        <div> Chia sẻ</div>
                                                    </a>
                                                </div>
                                                <div class='flex items-center space-x-3 pt-2'>

                                                    <div class='dark:text-gray-100'>
                                                    {$message}
                                                    </div>
                                                </div>
                                                <!-- box comment   -->
                                                <div class='border-t py-4 space-y-4 dark:border-gray-600 box-comment'>
                                                        {$allCmt}

                                                </div>

                                            {$moreCmt}

                                                <div class='bg-gray-100 rounded-full relative dark:bg-gray-800 border-t'>
                                                    <input  data='{$post_id}'  placeholder='Add your Comment..' class='bg-transparent max-h-10 shadow-none px-5 add-cmt'>
                                                    <div class='-m-0.5 absolute bottom-0 flex items-center right-3 text-xl'>
                                                        <a href='#'>
                                                            <i class='far fa-smile write__input-more'></i>
                                                        </a>
                                                        <a href='#'>
                                                            <i class='far fa-image write__input-more'></i>
                                                        </a>
                                                        <a href='#'>
                                                            <i class='fas fa-paperclip write__input-more'></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>";
                                }
                            }
                            echo "<script src='../../app/ajax/add-cmt.js'></script>";
                            echo "<script src='../../app/ajax/like.js'></script>";
                            echo "<script src='../../app/ajax/download-image.js'></script>";

                            ?>

                            <!-- end -->

                        </div>


                        <!-- Sidebar -->
                        <div class="w-full space-y-6">

                            <div class="widget card p-5">
                                <h4 class="text-lg font-semibold"> Giới thiệu </h4>
                                <ul class="text-gray-600 space-y-3 mt-3">
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-globe-europe rounded-full bg-gray-200 p-1 mr-3 md hydrated"></i>
                                        Đến Từ: <strong> <?php if ($timeline_user['user_from']) echo $timeline_user['user_from'];
                                                            else echo 'Chưa cập nhật';  ?> </strong>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-home rounded-full bg-gray-200 p-1 mr-3 md hydrated"></i>
                                        Đang sống ở: <strong> <?php if ($timeline_user['user_now']) echo $timeline_user['user_now'];
                                                                else echo 'Chưa cập nhật'; ?> </strong>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-envelope rounded-full bg-gray-200 p-1 mr-3 md hydrated"></i>
                                        Email: <strong> <?= $timeline_user['email'] ?> </strong>
                                    </li>
                                    <?php if ($timeline_user['user_qh']) echo "<li class=\"flex items-center space-x-2\">
                                        <i class=\"fas  fa-heart rounded-full bg-gray-200 p-1 mr-3 md hydrated\"></i>
                                        <strong> {$timeline_user['user_qh']}</strong>
                                    </li>" ?>
                                    <?php if ($timeline_user['user_job']) echo "<li class=\"flex items-center space-x-2\">
                                        <i class=\"fas fa-briefcase rounded-full bg-gray-200 p-1 mr-3 md hydrated\"></i>
                                        Nghề nghiệp: <strong> {$timeline_user['user_job']}</strong>
                                    </li>" ?>
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-birthday-cake rounded-full bg-gray-200 p-1 mr-3 md hydrated"></i>
                                        Sinh Nhật: <strong> <?php if (!$timeline_user['user_bd']) echo  "Chưa cập nhật";
                                                            else  echo implode("-", array_reverse(explode("-", $timeline_user['user_bd']))); ?> </strong>
                                    </li>

                                </ul>
                                <div class="gap-3 grid grid-cols-3 mt-4">
                                    <img src="../../images/user/<?= $timeline_user['img'] ?>" alt="" class="object-cover rounded-lg col-span-full">
                                </div>

                            </div>

                            <?php
                            // Đếm tổng số bạn bè
                            $sql = "select * from users where unique_id != $timeline_id";
                            $getAllFriend = pdo_get_all_rows($sql);



                            // lấy thông tin bạn bè
                            $sql = 'select * from users where unique_id != ? order by unique_id limit 6';
                            $getInfoFriend = pdo_get_all_rows($sql, $timeline_id);

                            ?>

                            <div class="widget card p-5 border-t">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold"> Bạn bè </h4>
                                        <p class="text-sm"> <?php echo count($getAllFriend) . ' ' . 'Bạn'; ?></p>
                                    </div>
                                    <a href="#" class="text-blue-600 ">Xem tất cả</a>
                                </div>
                                <div class="grid grid-cols-3 gap-3 text-gray-600 font-semibold">
                                    <?php
                                    foreach ($getInfoFriend as $friend) {
                                        extract($friend);
                                        echo "
                                            <a href='?timeline_id={$unique_id}'>
                                                <div class='avatar relative rounded-md overflow-hidden w-full h-24 mb-2'>
                                                    <img src='../../images/user/$img' alt='' class='w-full h-full object-cover absolute'>
                                                </div>
                                                <div class='text-sm truncate'> $fname $lname </div>
                                            </a>
                                            ";
                                    }

                                    ?>



                                </div>
                                <a href="#" class="button gray mt-3 w-full"> Xem tất cả </a>
                            </div>
                        </div>
                    </div>

                    <!-- Photos  -->
                    <?php

                    $sql = "select * from post where unique_id = ? and img_post != ''";
                    $unique_id = $_SESSION['unique_id'];
                    if (isset($_GET['timeline_id'])) {
                        $unique_id = $_GET['timeline_id'];
                    }

                    $allImages = pdo_get_all_rows($sql, $unique_id); ?>



                    <div class="card md:p-6 p-2 max-w-3xl mx-auto">

                        <div class="flex justify-between items-start relative md:mb-4 mb-3">
                            <div class="flex-1">
                                <h2 class="text-xl font-bold"> Hình ảnh </h2>
                                <nav class="responsive-nav style-2 md:m-0 -mx-4">
                                    <ul>
                                        <li class="active"><a href="#"><span><?php echo count($allImages) ?></span> bức ảnh</a></li>
                                    </ul>
                                </nav>
                            </div>

                        </div>

                        <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-3 mt-5">

                            <?php
                            foreach ($allImages as $img) {
                                echo " <div>
                                    <div class='bg-green-400 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle'>
                                       <img src='../../images/post/{$img['img_post']}' class='w-full h-full absolute object-cover inset-0'>
                                        <!-- overly-->
                                        <div class='-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full'></div>

                                    </div>
                                </div>";
                            }

                            ?>


                        </div>


                    </div>



                    <!-- Videos -->
                    <?php

                    $sql = "select * from post where unique_id = ? and post_video != ''";
                    $unique_id = $_SESSION['unique_id'];
                    if (isset($_GET['timeline_id'])) {
                        $unique_id = $_GET['timeline_id'];
                    }

                    $allVideos = pdo_get_all_rows($sql, $unique_id); ?>



                    <div class="card md:p-6 p-2 max-w-3xl mx-auto">

                        <h2 class="text-xl font-semibold"> Video</h2>
                        <nav class="responsive-nav border-b">
                            <ul>
                                <li class="active"><a href="#" class="lg:px-2"> Có <span><?php echo count($allVideos) ?> videos</span> </a></li>
                            </ul>
                        </nav>

                        <div class='grid md:grid-cols-3 grid-cols-2  gap-x-2 gap-y-4 mt-3'>
                            <?php

                            foreach ($allVideos as $video) {
                                echo " <div>
                                <!-- <a href='video-watch.html' class='w-full h-36 overflow-hidden rounded-lg relative block'>
                                    <img src='assets/images/video/img-1.png'  class='w-full h-full absolute inset-0 object-cover'>
                                    <span class='absolute bg-black bg-opacity-60 bottom-1 font-semibold px-1.5 py-0.5 right-1 rounded text-white text-xs'> 12:21</span>
                                    <img src='assets/images/icon-play.svg' class='w-12 h-12 uk-position-center'>
                                </a> -->
                                <video controls src=\"../../video/post/{$video['post_video']}\"></video>
                            </div>";
                            }

                            ?>


                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- Create post modal -->
        <div id="create-post-modal" class="create-post is-story" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">
                <form id="form-post" enctype="multipart/form-data" method="post">
                    <div class="text-center py-3 border-b">
                        <h3 class="text-lg font-semibold"> Tạo bài viết </h3>
                        <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
                    </div>
                    <div class="flex flex-1 items-start space-x-4 p-5">
                        <img src="../../images/user/<?= $userMain['img']; ?>" class="bg-gray-200 border border-white rounded-full w-11 h-11">
                        <div class="flex-1 pt-2">

                            <textarea name="caption" class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none" rows="5" placeholder="Bạn đang nghĩ gì ? <?= $userMain['lname']; ?> !"></textarea>

                            <!-- them anh -->
                            <div class="add-img" style="display: none;">
                                <img id="myImg" src="">
                                <input class="file_img" type='file' name="img" />
                            </div>

                            <!-- them video -->
                            <div class="add-video" style="display: none;">
                                <div style="display: none;" class='video-prev' class="pull-right">
                                    <video class="video-preview" controls="controls" />
                                </div>

                                <input class="upload-video-file" type='file' name="video" />
                            </div>
                        </div>

                    </div>

                    <div class="bsolute bottom-0 p-4 space-x-4 w-full">
                        <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                            <div class="lg:block hidden ml-1"> Thêm vào bài viết </div>
                            <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">

                                <svg class="add-img-post bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <svg class="add-video-post text-red-600 h-9 p-1.5 rounded-full bg-red-100 w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"> </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center w-full justify-between border-t p-3">

                        <select class="selectpicker mt-2 story" name="post_role">
                            <option value="1">Mọi người</option>
                            <option value="0">Chỉ mình tôi</option>
                        </select>

                        <div class="flex space-x-2">
                            <button type="submit" class="share-post bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                                Đăng </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>



        <!-- For Night mode -->
        <script>
            (function(window, document, undefined) {
                'use strict';
                if (!('localStorage' in window)) return;
                var nightMode = localStorage.getItem('gmtNightMode');
                if (nightMode) {
                    document.documentElement.className += ' night-mode';
                }
            })(window, document);

            (function(window, document, undefined) {

                'use strict';

                // Feature test
                if (!('localStorage' in window)) return;

                // Get our newly insert toggle
                var nightMode = document.querySelector('#night-mode');
                if (!nightMode) return;

                // When clicked, toggle night mode on or off
                nightMode.addEventListener('click', function(event) {
                    event.preventDefault();
                    document.documentElement.classList.toggle('dark');
                    if (document.documentElement.classList.contains('dark')) {
                        localStorage.setItem('gmtNightMode', true);
                        return;
                    }
                    localStorage.removeItem('gmtNightMode');
                }, false);

            })(window, document);
        </script>

        <!-- Javascript
    ================================================== -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="../../app/js/js-home/tippy.all.min.js"></script>
        <script src="../../app/js/js-home/uikit.min.js"></script>
        <script src="../../app/js/js-home/simplebar.min.js"></script>
        <script src="../../app/js/js-home/custom.min.js"></script>
        <script src="../../app/js/js-home/bootstrap-select.min.js"></script>
        <script src="../../app/ajax/create-post.js"></script>
        <script src="../../app/ajax/ajax-search-User-In-Home.js"></script>
        <script src="../../app/ajax/delete-post.js"></script>

        <!-- Ajax load
    ============================================= -->
        <script src="../../app/ajax/loadMessUser.js"></script>

        <!-- script them video -->
        <script>
            $(function() {
                $('.upload-video-file').on('change', function() {
                    if (isVideo($(this).val())) {
                        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
                        $('.video-prev').show();
                    } else {
                        $('.upload-video-file').val('');
                        $('.video-prev').hide();
                    }
                });
            });

            // If user tries to upload videos other than these extension , it will throw error.
            function isVideo(filename) {
                var ext = getExtension(filename);
                switch (ext.toLowerCase()) {
                    case 'm4v':
                    case 'avi':
                    case 'mp4':
                    case 'mov':
                    case 'mpg':
                    case 'mpeg':
                        // etc
                        return true;
                }
                return false;
            }

            function getExtension(filename) {
                var parts = filename.split('.');
                return parts[parts.length - 1];
            }
        </script>

        <!-- them anh  -->
        <script>
            document.getElementsByClassName('add-img-post')[0].onclick = () => {
                document.getElementsByClassName('add-img')[0].style.display = 'block';
                document.getElementsByClassName('add-video')[0].style.display = 'none';
                document.querySelector('.upload-video-file').value = '';

            }
            document.getElementsByClassName('add-video-post')[0].onclick = () => {
                document.getElementsByClassName('add-video')[0].style.display = 'block';
                document.getElementsByClassName('add-img')[0].style.display = 'none';

                var img = document.querySelector('#myImg');
                img.src = '';
                let inputImg = document.querySelector(".file_img");
                inputImg.value = '';

            }
            window.addEventListener('load', function() {
                document.querySelector('input[type="file"]').addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        var img = document.querySelector('#myImg');
                        img.onload = () => {
                            URL.revokeObjectURL(img.src); // no longer needed, free memory
                        };

                        img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                    };
                });
            });
        </script>

        <script src="../../app/ajax/last-activity.js"></script>
        <!-- FILE SAVER -->
        <script src="../../vendor/FileSaver/FileSaver.js"></script>

        <script>
            let start = 5;
            let soluong = 0;
            (function() {
                // Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
                var is_busy = false;

                // Biến lưu trữ trang hiện tại

                let quantity = 5;

                let check = true;
                $(document).ready(function() {
                    // Khi kéo scroll thì xử lý
                    if (check) {

                        $(window).scroll(function() {
                            // Element append nội dung
                            $element = $('#container-feed-content');

                            // ELement hiển thị chữ loadding


                            // Nếu màn hình đang ở dưới cuối thẻ thì thực hiện ajax
                            if ($(window).scrollTop() + $(window).height() >= $element.height()) {
                                // Nếu đang gửi ajax thì ngưng
                                if (is_busy == true) {
                                    return false;
                                }



                                // Thiết lập đang gửi ajax
                                is_busy = true;


                                // Hiển thị loadding


                                // Gửi Ajax
                                if (!check) {
                                    return;
                                }
                                $.ajax({
                                        type: 'get',
                                        dataType: 'json',
                                        url: '../../back-end/load-post-timeline.php',
                                        data: {
                                            start: start,
                                            quantity: quantity,
                                            timeline_id: <?= $timeline_id ?>
                                        },
                                        success: function(result) {

                                            if (result['status']) {
                                                soluong = result['soluong'];
                                                $element.append(result['data']);
                                                start += 5;
                                            } else {
                                                let runOutOfPost = `<div class='flex justify-center mt-6'>
                                                                        <a id='loading-content' class='bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white'>
                                                                            Không còn bài viết nữa</a>
                                                                    </div>`;
                                                $element.append(runOutOfPost);
                                                check = false;
                                            }

                                        }
                                    })
                                    .always(function() {
                                        // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false

                                        is_busy = false;
                                    });
                                return false;
                            }
                        });
                    }
                });
            })()
        </script>

</body>

</html>