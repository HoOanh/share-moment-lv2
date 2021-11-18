<?php
session_start();
require '../dao/pdo.php';

$post_id = $_POST['post_id'];
$output = ['data' => ''];


$sql2 = "Select * from cmt where post_id = ?  order by cmt_id desc";
$res2 = pdo_get_all_rows($sql2, $post_id);

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
                <a href='#' class='text-red-600'> <i class='uil-heart'></i> Love </a>
                <a href='#'> Replay </a>
                <span> {$cmt_time} </span>
            </div>
        </div>
    </div>
        ";
}

$output['data'] = $allCmt;
die(json_encode($output));
