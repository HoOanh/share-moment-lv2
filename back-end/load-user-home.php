<?php
session_start();
require '../dao/pdo.php';

$sql = "SELECT * FROM users ORDER BY user_id desc";
$kq = pdo_get_all_rows($sql);

$output = "";


foreach ($kq as $item) {
    if ($item['unique_id'] == $_SESSION['unique_id']) {
        continue;
    }
    extract($item);
    if ($user_status == "Đang hoạt động") $status = "user_status status_online";
    else $status = "user_status";
    $output .= "

    <a href='../timeline/?timeline_id={$item['unique_id']}'>
    <div class='contact-avatar'>
        <img src='../../images/user/$img' >
        <span class='{$status}'></span>
    </div>
    <div class='contact-username'> $fname $lname </div>
    </a>
    <div uk-drop='pos: left-center ;animation: uk-animation-slide-left-small'>
    <div class='contact-list-box'>
        <div class='contact-avatar'>
            <img src='../../images/user/$img' >
            <span class='{$status}'></span>
        </div>
        <div class='contact-username'> $fname $lname</div>
        <p>
            <ion-icon name='people' class='text-lg mr-1'></ion-icon> Become friends with
            <strong> Stella Johnson </strong> and <strong> 14 Others</strong>
        </p>
        <div class='contact-list-box-btns'>
        <a href='../chat?box_id=$unique_id'>
            <button type='button' class='button primary flex-1 block mr-2'>
                <i class='uil-envelope mr-1'></i> Send message</button>
                </a>
        </div>
    </div>
    </div>



    ";
}

echo $output;
