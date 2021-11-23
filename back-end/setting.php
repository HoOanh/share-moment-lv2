<?php
session_start();

require '../dao/pdo.php';


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$phone =  $_POST['phone'];
$email = $_POST['email'];
$user_name = $_POST['user_name'];
$pass = $_POST['pass'];
$user_bd =  $_POST['user_bd'];
$user_from =  $_POST['user_from'];
$user_now =  $_POST['user_now'];
$user_job =  $_POST['user_job'];
$user_qh =  $_POST['user_qh'];
$user_about =  $_POST['about'];

$fname = trim(strip_tags($fname));
$lname = trim(strip_tags($lname));
$gender = trim(strip_tags($gender));
$phone = trim(strip_tags($phone));
$email = trim(strip_tags($email));
$user_name = trim(strip_tags($user_name));
$pass = trim(strip_tags($pass));
$user_from = trim(strip_tags($user_from));
$user_now = trim(strip_tags($user_now));
$user_job = trim(strip_tags($user_job));
$user_qh = trim(strip_tags($user_qh));
$user_about = nl2br(trim(strip_tags($user_about)));

$output = ["data" => "", "status" => ''];


if (!empty($fname) && !empty($lname)) {
    if (!empty($email)) {
        if (!empty($user_name)) {
            if (!empty($pass)) {
                $sql = "UPDATE users SET
                fname = ?,
                lname = ?,
                gender =?,
                phone =?,
                email =?,
                user_name =?,
                pass = ?,
                user_bd = ?,
                user_from = ?,
                user_now =?,
                user_job =?,
                user_qh = ?,
                user_about = ?
                 WHERE unique_id = ?";
                $done =  pdo_execute($sql, $fname, $lname, $gender, $phone, $email, $user_name, $pass, $user_bd, $user_from, $user_now, $user_job, $user_qh, $user_about, $_SESSION['unique_id']);
                if ($done) {
                    $output['data'] = 'Thay đổi thành công';
                    $output['status'] = 'success';
                } else {
                    $output['data'] = 'Thay đổi không thành công';
                    $output['status'] = 'warning';
                }
            } else {
                $output['data'] = 'Cần có mật khẩu';
                $output['status'] = 'warning';
            }
        } else {
            $output['data'] = 'Cần có tên đăng nhập';
            $output['status'] = 'warning';
        }
    } else {
        $output['data'] = 'Cần có email';
        $output['status'] = 'warning';
    }
} else {
    $output['data'] = 'Cần có họ và tên';
    $output['status'] = 'warning';
}
die(json_encode($output));
