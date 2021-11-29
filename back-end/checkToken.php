<?php
require "../dao/pdo.php";
$pass = $_POST['pass'];

$token = $_POST['token'];

$sql = "SELECT email FROM users";

$allEmails = pdo_get_all_rows($sql);

$output = ['data' => 'Token không đúng'];

if (strlen($pass) < 8) {
    $output['data'] = 'Mật khẩu phải có ít nhất 8 ký tự!';
    die(json_encode($output));
}


foreach ($allEmails as $item) {
    extract($item);
    if (sha1($email) === $token) {
        $sql = "update users set pass = ? where email = ?";

        if (pdo_execute($sql, $pass, $email)) {
            $output['data'] = 'success';
        } else {
            $output['data'] = 'Lỗi không xác định!';
        }

        break;
    }
}

die(json_encode($output));
