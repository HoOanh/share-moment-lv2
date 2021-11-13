<?php
session_start();
require '../dao/pdo.php';

$post_id = $_POST['post_id'];
$cmt_content = $_POST['cmt_content'];
$cmt_time = date('Y/m/d H:i:s', time() + 3600 * 6);
$output = ['data'=>''];
$sql = "INSERT INTO cmt (content,unique_id,post_id,cmt_time)
        VALUES (?,?,?,?)";
$cmtSS = pdo_execute($sql,$cmt_content,$_SESSION['unique_id'],$post_id,$cmt_time);
if($cmtSS){

    $sql = "SELECT * FROM users where unique_id = ?";
    $getUserCmt = pdo_get_one_row($sql, $_SESSION['unique_id']);
    extract($getUserCmt);

    $output['data'] = "
    <div class='flex'>
        <div class='w-10 h-10 rounded-full relative flex-shrink-0'>
            <img src='../../images/user/{$img}' alt='' class='absolute h-full rounded-full w-full'>
        </div>
        <div>
            <div class='text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100'>
                <p class='leading-6'>{$cmt_content}
                   
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
die(json_encode($output)) ;



?>
