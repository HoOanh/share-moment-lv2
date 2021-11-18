<?php
session_start();
require "../dao/pdo.php";

$output = ['data' => '', 'status' => true, 'soluong' => 0];

$start = intval($_GET['start']);
$quantity = intval($_GET['quantity']);

$sql2 = "Select * FROM post INNER JOIN users ON (users.unique_id = post.unique_id) and (post.post_role = 1)ORDER BY post_id DESC LIMIT {$start},{$quantity}";
$feedList = pdo_get_all_rows($sql2);
$output['soluong'] = count($feedList);
if (count($feedList) == 0) {
    $output['status'] = false;
    die(json_encode($output));
}

foreach ($feedList as $item) {
    extract($item);

    $sql = "Select count(*) as total from likes where post_id = ? ";
    $res = pdo_get_one_row($sql, $post_id);

    $sql2 = "Select * from cmt where post_id = ?  order by cmt_id desc limit 2";
    $res2 = pdo_get_all_rows($sql2, $post_id);

    $sql3 = "Select * from likes where unique_id = ? and post_id = ?";
    $checkLike = pdo_get_one_row($sql3, $_SESSION['unique_id'], $post_id);
    if ($checkLike == []) $liked = '';
    else $liked = 'active';

    $allCmt = '';
    foreach ($res2 as $cmt) {

        extract($cmt);

        $sql = "SELECT * FROM users WHERE unique_id = ?";
        $getUserCmt = pdo_get_one_row($sql, $unique_id);


        $allCmt .= "
        <div class='flex'>
        <div class='w-10 h-10 rounded-full relative flex-shrink-0'>
            <img src='../../images/user/{$getUserCmt['img']}' alt='' class='absolute h-full rounded-full w-full'>
        </div>
        <div>
            <div class='text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100'>
                <p class='leading-6'>{$content}

                </p>
                <div class='absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800'></div>
            </div>
            <div class='text-sm flex items-center space-x-3 mt-2 ml-5'>
                <a href='#' class='text-red-600'> <i class='uil-heart'></i> Love </a>
                <a href='#'> Replay </a>
                <span> {$cmt_time} </span>
            </div>
        </div>
    </div>
        ";
    }

    $sql3 = "Select * from cmt where post_id = ?  order by cmt_id desc";
    $res3 = pdo_get_all_rows($sql3, $post_id);
    $moreCmt = "";
    if (count($res3) > 2) {
        $moreCmt = "  <a data='{$post_id}' class='hover:text-blue-600 hover:underline more-cmt'> Xem thêm bình luận</a>";
    }


    $message = "
    <div class='flex items-center' >
                <img src='../../images/post/like-icon.png' alt='' class='w-6 h-6 rounded-full border-2 border-white dark:border-gray-900'>
    <span class='quantity-like' style='margin-left: 0.15em;'>{$res['total']} <strong> lượt thích </strong> </span>
    </div>";
    if ($res['total'] == 0) {
        $message = "<span class='quantity-like'></span><strong>Hãy là người đầu tiên thích bài viết này </strong>";
    }

    if ($post_video != '') {
        $output['data'] .=  "
        <div class='card lg:mx-0 uk-animation-slide-bottom-small'>
        <div class='flex justify-between items-center lg:p-4 p-2.5'>
            <div class='flex flex-1 items-center space-x-4'>
                <a href='#'>
                    <img src='../../images/user/$img' class='bg-gray-200 border border-white rounded-full w-10 h-10'>
                </a>
                <div class='flex-1 font-semibold capitalize'>
                    <a href='../timeline/?timeline_id=$unique_id' class='text-black dark:text-gray-100'> $fname $lname </a>
                    <div class='text-gray-700 flex items-center space-x-2'> $time
                    <i class='fas fa-user-friends'></i>
                    </div>
                </div>
            </div>
            <div>
                <a href='#'><i class='fas fa-ellipsis-h'></i>  </a>
                <div class='bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700' uk-drop='mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small'>

                <ul class='space-y-1'>
                <li class='ajax-download-btn'>
                    <a class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                        <i class='fas fa-download mr-1'></i> Tải ảnh
                    </a>
                </li>
                <li>
                    <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                          <i class='fas fa-share-alt mr-1'></i> Chia sẽ
                    </a>
                </li>
                <li>
                    <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                        <i class='far fa-edit mr-1'></i> Chỉnh sữa
                    </a>
                </li>
                <li>
                    <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                        <i class='uil-comment-slash mr-1'></i> Disable comments
                    </a>
                </li>
                <li>
                    <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                        <i class='uil-favorite mr-1'></i> Add favorites
                    </a>
                </li>
                <li>
                    <hr class='-mx-2 my-2 dark:border-gray-800'>
                </li>
                <li>
                    <a href='#' class='flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600'>
                        <i class='far fa-trash-alt mr-1'></i> Delete
                    </a>
                </li>
            </ul>

                </div>
            </div>
        </div>
        <div class='p-5 pt-0 border-b dark:border-gray-700'>
        $caption
        </div>
        <div class='w-full h-full'>
        <video controls src=\"../../video/post/{$post_video}\"  frameborder='0' allowfullscreen uk-responsive class='w-full lg:h-64 h-40'></vid>
    </div>
        <div class='p-4 space-y-3'>
            <div class='flex space-x-4 lg:font-bold'>
                <a data='{$post_id}'class='flex items-center space-x-2 like-btn $liked'>
                    <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                            <path d='M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z' />
                        </svg>
                    </div>
                    <div> Thích</div>
                </a>
                <a href='#' class='flex items-center space-x-2'>
                    <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                            <path fill-rule='evenodd' d='M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z' clip-rule='evenodd' />
                        </svg>
                    </div>
                    <div> Bình luận</div>
                </a>
                <a href='#' class='flex items-center space-x-2 flex-1 justify-end'>
                    <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                            <path d='M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z' />
                        </svg>
                    </div>
                    <div> Chia sẻ</div>
                </a>
            </div>
            <div class='flex items-center space-x-3 pt-2'>
                <div class='dark:text-gray-100'>
                    {$message}
                </div>
            </div>




            <div class='border-t py-4 space-y-4 dark:border-gray-600 box-comment'>
                {$allCmt}

            </div>

           {$moreCmt}

            <div class='bg-gray-100 rounded-full relative dark:bg-gray-800 border-t'>
                <input data='{$post_id}'  placeholder='Add your Comment..' class='  bg-transparent max-h-10 shadow-none px-5 add-cmt'>
                <div class='-m-0.5 absolute bottom-0 flex items-center right-3 text-xl'>
                <a href='#'>
                    <i class='far fa-smile write__input-more'></i>
                </a>
                <a href='#'>
                    <i class='far fa-image write__input-more'></i>
                </a>
                <a href='#'>
                    <i class='fas fa-paperclip write__input-more'></i>
                </a>
                </div>
            </div>

        </div>

    </div>";
    } else {
        $output['data'] .= "
    <div class='card lg:mx-0 uk-animation-slide-bottom-small'>


    <div class='flex justify-between items-center lg:p-4 p-2.5'>
        <div class='flex flex-1 items-center space-x-4'>
            <a href='#'>
                <img src='../../images/user/$img' class='bg-gray-200 border border-white rounded-full w-10 h-10'>
            </a>
            <div class='flex-1 font-semibold capitalize'>
                <a href='../timeline/?timeline_id=$unique_id' class='text-black dark:text-gray-100'> $fname $lname </a>
                <div class='text-gray-700 flex items-center space-x-2'> $time
                <i class='fas fa-user-friends'></i>
                </div>
            </div>
        </div>
        <div>
            <a href='#'> <i class='fas fa-ellipsis-h'></i>  </a>
            <div class='bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700' uk-drop='mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small'>

            <ul class='space-y-1'>
            <li class='ajax-download-btn'>
                <a class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                    <i class='fas fa-download mr-1'></i> Tải ảnh
                </a>
            </li>
            <li>
                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                      <i class='fas fa-share-alt mr-1'></i> Chia sẽ
                </a>
            </li>
            <li>
                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                    <i class='far fa-edit mr-1'></i> Chỉnh sữa
                </a>
            </li>
            <li>
                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                    <i class='uil-comment-slash mr-1'></i> Disable comments
                </a>
            </li>
            <li>
                <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                    <i class='uil-favorite mr-1'></i> Add favorites
                </a>
            </li>
            <li>
                <hr class='-mx-2 my-2 dark:border-gray-800'>
            </li>
            <li>
                <a href='#' class='flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600'>
                    <i class='far fa-trash-alt mr-1'></i> Delete
                </a>
            </li>
        </ul>

            </div>
        </div>
    </div>

    <div class='p-5 pt-0 border-b dark:border-gray-700'>
    $caption
    </div>

    <div uk-lightbox>
        <a href='../../images/post/$img_post'>
            <img src='../../images/post/$img_post' alt='' class='max-h-96 w-full object-cover ajax-image'>
        </a>
    </div>


    <div class='p-4 space-y-3'>

        <div class='flex space-x-4 lg:font-bold'>
            <a data = '{$post_id}'  class='flex items-center space-x-2 like-btn $liked'>
                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                        <path d='M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z' />
                    </svg>
                </div>
                <div> Thích</div>
            </a>
            <a href='#' class='flex items-center space-x-2'>
                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                        <path fill-rule='evenodd' d='M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z' clip-rule='evenodd' />
                    </svg>
                </div>
                <div> Bình luận</div>
            </a>
            <a href='#' class='flex items-center space-x-2 flex-1 justify-end'>
                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                        <path d='M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z' />
                    </svg>
                </div>
                <div> Chia sẻ</div>
            </a>
        </div>
        <div class='flex items-center space-x-3 pt-2'>

            <div class='dark:text-gray-100'>
            {$message}
            </div>
        </div>
        <!-- box comment   -->
        <div class='border-t py-4 space-y-4 dark:border-gray-600 box-comment'>
                {$allCmt}

        </div>

       {$moreCmt}

        <div class='bg-gray-100 rounded-full relative dark:bg-gray-800 border-t'>
            <input  data='{$post_id}'  placeholder='Add your Comment..' class='bg-transparent max-h-10 shadow-none px-5 add-cmt'>
            <div class='-m-0.5 absolute bottom-0 flex items-center right-3 text-xl'>
                <a href='#'>
                    <i class='far fa-smile write__input-more'></i>
                </a>
                <a href='#'>
                    <i class='far fa-image write__input-more'></i>
                </a>
                <a href='#'>
                    <i class='fas fa-paperclip write__input-more'></i>
                </a>
            </div>
        </div>

    </div>

</div>";
    }
}

$output['data'] .= "<script src='../../app/ajax/ajax-cmt-like-for-load-more-post.js'></script>";


die(json_encode($output));
