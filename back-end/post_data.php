<?php 
    require "../dao/pdo.php";
    $output = [];
    function countPostByMonth($start, $end){
        global $output;
        $start .= " 00:00:00";
        $end .= " 23:59:59";
        $sql = "select count(*) as total from post where time  Between timestamp(?) and timestamp(?)";
        $res = pdo_get_one_row($sql,$start,$end);
        array_push($output,$res['total']);
    }

   $day = [
   ['2021-01-01','2021-01-31'],
   ['2021-02-01','2021-02-29'],
   ['2021-03-01','2021-03-31'],
   ['2021-04-01','2021-04-30'],
   ['2021-05-01','2021-05-31'],
   ['2021-06-01','2021-06-30'],
   ['2021-07-01','2021-07-31'],
   ['2021-08-01','2021-08-31'],
   ['2021-09-01','2021-09-30'],
   ['2021-10-01','2021-10-31'],
   ['2021-11-01','2021-11-30'],
   ['2021-12-01','2021-12-31']
];

    foreach($day as $d){
        countPostByMonth($d[0],$d[1]);
    }

    die(json_encode($output));
