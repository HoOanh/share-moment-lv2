<?php
require 'pdo.php';

function getPost($id){
    $sql = "SELECT * FROM post INNER JOIN users ON post.unique_id = users.unique_id AND post_id = $id ";
    $kq = pdo_get_one_row($sql);
    return $kq;
}

function updatePostAn($id){
  $sql="UPDATE post SET post_status = 0 where post_id = $id";
  pdo_execute($sql);
}
function updatePostHien($id){
    $sql="UPDATE post SET post_status = 1 where post_id = $id";
    pdo_execute($sql);
  }


function getAll(){
    $sql = "SELECT * FROM post INNER JOIN users ON post.unique_id = users.unique_id ORDER BY post_id DESC ";
    $kq = pdo_get_all_rows($sql);
    return $kq;
}
function CountPost(){
    $sql="SELECT count(*) FROM post";
    $kq = pdo_get_value($sql);
    return $kq;
}

function dellPost($post_id){
    $sql = "DELETE FROM post where post_id = $post_id";
    $kq = pdo_get_all_rows($sql);
}

function getAll2( $page_num = 1, $page_size = 5){
    $starrow = ($page_num - 1) * $page_size;
    $sql = "SELECT * FROM post INNER JOIN users ON post.unique_id = users.unique_id ORDER BY post_id DESC LIMIT $starrow, $page_size";
    $kq = pdo_get_all_rows($sql);
    return $kq;
}

function pt($base_url, $total_rows, $page_num, $page_size = 8, $offset = 3)
{
    if ($page_num <= 0) return "";
    $total_pages = ceil($total_rows / $page_size); //tính tổng số trang
    if ($total_pages <= 1) return "";
    $links = "<ul class='pagination'>";
    if ($page_num > 1) { //chỉ hiện 2 link đầu, trước khi user từ trang 2 trở đi
        $first = "<li><a href='{$base_url}'> << </a></li>";
        $page_prev = $page_num - 1;
        $prev = "<li><a href='{$base_url}&page_num={$page_prev}'> < </a></li>";
        $links .= $first . $prev;
    }
    
    $from = $page_num - $offset;
    $to = $page_num + $offset;
    if($from < 1 ) $from =1;
    if($to > $total_pages)$to = $total_pages;
    for($i = $from; $i < $to; $i++){
       if($i==$page_num) $str = "<li><span>{$i}</span></li>";
       else  $str = "<li><a href='{$base_url}&page_num={$i}'> {$i}</a></li>";
       $links .= $str;
    }
    //aaa
    if ($page_num < $total_pages) { //chỉ hiện link cuối, kế khi user kô ở trang cuối
        $page_next = $page_num + 1;
        $next = "<li><a href='{$base_url}&page_num={$page_next}'> > </a></li>";
        $last = "<li><a href='{$base_url}&page_num={$total_pages}'> >> </a></li>";
        $links .= $next . $last;
    }
    $links .= "</ul>";
    return $links;
}