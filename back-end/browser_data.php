<?php 
    session_start();
    require"../dao/pdo.php";
    $ouput = [];

    $sql = "SELECT browser_name from browser GROUP by browser_name";
    $browser_name = pdo_get_all_rows($sql);
    
    $i=0;
    foreach($browser_name as $key => $value){
        
        $sql = "select count(*) as total from browser where browser_name = ?";
        $total = pdo_get_one_row($sql,$value['browser_name']);

        array_push($ouput,['name'=>$value['browser_name'],'total'=>$total['total']]);
    }

    die(json_encode($ouput));
?>