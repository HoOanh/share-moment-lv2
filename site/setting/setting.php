<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
     <link href="../../images/header/logo-mobile.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Socialite Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">

    
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="../../app/css/css-home/uikit.min.css">
    <link rel="stylesheet" href="../../app/css/css-home/style.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


</head>

<body>




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
                         $UserSet = pdo_get_one_row($sql, $_SESSION['unique_id']);
                         extract($UserSet);
                            ?>
                            <a href="#">
                                <img src="../../images/user/<?= $img ?>" class="is_avatar" alt="">
                            </a>
                            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                                <a href="../timeline/" class="user">
                                    <div class="user_avatar">
                                        <img src="../../images/user/<?= $img ?>" style="width:100%; height:100%">
                                    </div>
                                    <div class="user_name">
                                        <div> <?php echo $fname . " " . $lname ?> </div>
                                        <span> @<?= $user_name ?></span>
                                    </div>
                                </a>
                                <hr>

                                <a href="page-setting.html">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Tài khoản
                                </a>
                                <a href="groups.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                    </svg>
                                    Thiết lập trang
                                </a>
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
                    $sql="SELECT * FROM users WHERE role = 1";
                    $admin = pdo_get_all_rows($sql);

                    foreach ($admin as $item) {
                       extract($item);
                       if ($user_status == "Đang hoạt động") $status ="user_status status_online";
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

                <div class="mb-6">
                    <h2 class="text-2xl font-semibold"> Setting </h2>
                    <nav class="responsive-nav border-b md:m-0 -mx-4">
                        <ul uk-switcher="connect: #form-type; animation: uk-animation-fade">
                            <li><a href="#" class="lg:px-2"> Profile</a></li>

                        </ul>
                    </nav>
                </div>
                <form class="form" method="post" >
                <div class="grid lg:grid-cols-3 mt-12 gap-8">
                    <!-- <div>
                        <h3 class="text-xl mb-2 font-semibold"> Basic</h3>
                        <p> Lorem ipsum dolor sit amet nibh consectetuer adipiscing elit</p>
                    </div> -->

                    <div class="bg-white rounded-md lg:shadow-md shadow col-span-2 lg:mx-16">
                        <?php
                        $sql="SELECT * FROM users WHERE unique_id = ?";
                        $infor = pdo_get_one_row($sql, $_SESSION['unique_id']);
                        extract($infor);
                        ?>

                        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                            <div>
                                <label for=""> Họ</label>
                                <input type="text" placeholder="" class="shadow-none with-border" value="<?=$fname?>" name="fname">
                            </div>
                            <div>
                                <label for=""> Tên</label>
                                <input type="text" placeholder="" class="shadow-none with-border" value="<?=$lname?>" name="lname">
                            </div>
                            <div>
                                <label for=""> Giới Tính </label>
                                <select id="relationship" name="gender" class="shadow-none selectpicker with-border ">
                                <?php if($gender == 1){
                                echo '
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                        <option value="2">Khác</option>
                                        ';
                                 } else if($gender == 0){
                                    echo '
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>

                                    <option value="2">Khác</option>
                                    ';

                                }else{
                                    echo '
                                    <option value="2">Khác</option>
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>

                                    ';
                                }?>


                               </select>
                            </div>
                            <div class="col-span-2">
                                <label for="">Số điện thoại</label>
                                <input type="text" placeholder="" class="shadow-none with-border" value="<?=$phone?>" name="phone">
                            </div>
                            <div class="col-span-2">
                                <label for=""> Email</label>
                                <input type="text" placeholder="" class="shadow-none with-border" value="<?=$email?>" name="email" readonly>
                            </div>
                            <div class="col-span-2">
                                <label for="">Tên đăng nhập</label>
                                <input type="text" placeholder="" class="shadow-none with-border" value="<?=$user_name?>" name="user_name" readonly>
                            </div>
                            <div class="col-span-2">
                                <label for=""> Mật khẩu</label>
                                <input type="text" placeholder="" class="shadow-none with-border" value="<?=$pass?>" name="pass" >
                            </div>

                            <div class="col-span-2">
                                <label for="about">Ngày sinh của bạn</label>
                                <input type="date" placeholder="" class="shadow-none with-border" name="user_bd" value="<?=$user_bd?>">
                            </div>

                            <div class="col-span-2">
                                <label for="">Bạn đến từ đâu</label>
                                <input type="text" placeholder="" class="shadow-none with-border" name="user_from" value="<?=$user_from?>">
                            </div>
                            <div class="col-span-2">
                                <label for="about">Nơi ở hiện tại</label>
                                <input type="text" placeholder="" class="shadow-none with-border" name="user_now" value="<?=$user_now?>">
                            </div>

                            <div>
                                <label for=""> Bạn đang làm gì </label>
                                <select id="relationship"  class="shadow-none selectpicker with-border " name="user_job">

                                <?php if($user_job == "Học sinh"){
                                echo '
                                <option value="Học sinh">Học sinh</option>
                                <option value="Sinh viên">Sinh viên</option>
                                <option value="Công việc tự do">Công việc tự do</option>
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Khác">Khác</option>
                                        ';
                                 } else if($user_job == "Công việc tự do"){
                                    echo '
                                    <option value="Công việc tự do">Công việc tự do</option>
                                    <option value="Học sinh">Học sinh</option>
                                    <option value="Sinh viên">Sinh viên</option>

                                    <option value="Nhân viên">Nhân viên</option>
                                    <option value="Khác">Khác</option>
                                    ';

                                }else if($user_job == "Sinh viên"){
                                    echo '
                                    <option value="Sinh viên">Sinh viên</option>
                                    <option value="Học sinh">Học sinh</option>

                                 <option value="Công việc tự do">Công việc tự do</option>
                                 <option value="Nhân viên">Nhân viên</option>
                                 <option value="Khác">Khác</option>
                                    ';

                                }else if($user_job == "Nhân viên"){
                                    echo '
                                    <option value="Nhân viên">Nhân viên</option>
                                    <option value="Học sinh">Học sinh</option>
                                    <option value="Sinh viên">Sinh viên</option>
                                    <option value="Công việc tự do">Công việc tự do</option>

                                    <option value="Khác">Khác</option>
                                    ';

                                }else{
                                    echo '
                                    <option value="Khác">Khác</option>
                                    <option value="Học sinh">Học sinh</option>
                                    <option value="Sinh viên">Sinh viên</option>
                                    <option value="Công việc tự do">Công việc tự do</option>
                                    <option value="Nhân viên">Nhân viên</option>


                                    ';
                                }?>

                               </select>
                            </div>
                            <div>
                                <label for=""> Tình trạng quan hệ </label>
                                <select id="relationship"  class="shadow-none selectpicker with-border " name="user_qh">
                                <?php if($user_qh == "Độc thân"){
                                echo '
                                <option value="Độc thân">Độc thân</option>
                                <option value="Hẹn hò">Hẹn hò</option>
                                <option value="Phức tạp">Phức tạp</option>
                                <option value="Đã kết hôn">Đã kết hôn</option>
                                        ';
                                 } else if($user_qh == "Hẹn hò"){
                                    echo '
                                    <option value="Hẹn hò">Hẹn hò</option>
                                    <option value="Độc thân">Độc thân</option>

                                    <option value="Phức tạp">Phức tạp</option>
                                    <option value="Đã kết hôn">Đã kết hôn</option>
                                    ';

                                }else if($user_qh == "Phức tạp"){
                                    echo '
                                    <option value="Phức tạp">Phức tạp</option>
                                    <option value="Độc thân">Độc thân</option>
                                    <option value="Hẹn hò">Hẹn hò</option>

                                    <option value="Đã kết hôn">Đã kết hôn</option>
                                    ';

                                }else{
                                    echo '
                                    <option value="Đã kết hôn">Đã kết hôn</option>
                                    <option value="Độc thân">Độc thân</option>
                                    <option value="Hẹn hò">Hẹn hò</option>
                                    <option value="Phức tạp">Phức tạp</option>



                                    ';
                                }?>


                               </select>
                            </div>
                            <div class="col-span-2">
                                <label for="about">Giới thiệu về bạn</label>
                                <textarea id="about" name="about" rows="3" class="with-border" value=""><?=$user_about?></textarea>
                            </div>
                        </div>

                        <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                            <button class="p-2 px-4 rounded bg-gray-50 text-red-500"> Cancel </button>
                            <button type="submit" class="change button bg-blue-700"> Save </button>
                        </div>

                    </div>




                </div>
                </form>
            </div>
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


    <script src="../../app/ajax/ajax-search-User-In-Home.js"></script>
    <script src="../../app/ajax/loadMessUser.js"></script>
    <script src="../../app/ajax/setting.js"></script>


</body>

</html>