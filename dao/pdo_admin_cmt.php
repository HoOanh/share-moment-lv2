<?php


function countPost()
{
    $sql = "SELECT * FROM post";
    $total = pdo_get_all_rows($sql);
    return  count($total);
}

function getCmt($page_num = 1, $page_size = 5)
{
    $startRow = ($page_num - 1) * $page_size;
    $sql = "SELECT * from post LIMIT $startRow,$page_size";
    return pdo_get_all_rows($sql);
}



function buildLinkBreakPage($base_url, $total_rows, $page_num, $page_size = 5, $offset = 1)
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
    //aaa
    if ($page_num == 1) $to = $page_num + 2;
    else $to = $page_num + $offset;
    if ($page_num == $total_pages) $from = $page_num - 2;
    else $from = $page_num - $offset;

    if ($from < 1) $from = 1;
    if ($to > $total_pages) $to = $total_pages;
    for ($i = $from; $i <= $to; $i++) {
        if ($i == $page_num) $str = "<li class='active'><span>{$i}</span></li>";
        else $str = "<li><a href='{$base_url}&page_num={$i}'>{$i}</a></li>";
        $links .= $str;
    };
    if ($page_num < $total_pages) { //chỉ hiện link cuối, kế khi user kô ở trang cuối
        $page_next = $page_num + 1;
        $next = "<li><a href='{$base_url}&page_num={$page_next}'> > </a></li>";
        $last = "<li><a href='{$base_url}&page_num={$total_pages}'> >> </a></li>";
        $links .= $next . $last;
    }
    $links .= "</ul>";

    return $links;
}
