<?php
session_start();
require "../../dao/pdo.php";
if (isset($_GET['logout'])) {

    unset($_SESSION['unique_id']);
    header("location: ../login");
}
