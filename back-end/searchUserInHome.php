<?php
session_start();
require "../dao/pdo.php";

$output = "";

$inputValue = $_POST['inputValue'];

$value = "%$inputValue%";

$sql = "SELECT * FROM users where (fname LIKE ? OR lname LIKE ?) and unique_id != ?";
$getUser = pdo_get_all_rows($sql, $value, $value, $_SESSION['unique_id']);

$result = "";

if ($getUser) {
    $result = "<h4 class='search_title'> Kết quả tìm kiếm </h4>";

    foreach ($getUser as $item) {
        $result .= "
                        <ul id='search-User-Container'>
                            <li>
                                <a href='../timeline/?timeline_id={$item['unique_id']}'>
                                    <img src='../../images/user/{$item['img']}' alt='' class='list-avatar'>
                                    <div class='list-name'>{$item['fname']} {$item['lname']}</div>
                                </a>
                            </li>
                        </ul>
                        ";
    }
} else {
    $result = "<h4 class='search_title'> Không tìm thấy ai cả </h4>";
}

$output = $result;

echo $output;
