<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: ../login");
}

$VIEW_NAME = "feed.php";

// if(isset($_GET['action'])){

//     if($_GET['action'] == "inputEmail"){

//         $VIEW_NAME = "inputEmail.php";
//     }
//     if($_GET['action'] == "inputPass"){

//         $VIEW_NAME = "inputPass.php";
//     }
// }

include "../index.php";
