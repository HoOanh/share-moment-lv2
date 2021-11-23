<?php 

function changeAvatar($newAvatar, $unique_id){
    $sql = "update users set img = ? where unique_id = ?";
    return pdo_execute($sql,$newAvatar,$unique_id);
}
function changeBg($newAvatar, $unique_id){
    $sql = "update users set bg_user = ? where unique_id = ?";
    return pdo_execute($sql,$newAvatar,$unique_id);
}



?>