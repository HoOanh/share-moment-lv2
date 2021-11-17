<?php
// session_start();
// require "../dao/pdo.php";
$receiver = $_GET['box_id'];
date_default_timezone_set('Asia/Ho_Chi_Minh');

$sql = "SELECT * FROM message left join users
            on users.unique_id = message.receive_id
           where ( send_id = ? and receive_id = ?) or (send_id = ? and receive_id = ?) order by time";

$allMess = pdo_get_all_rows($sql, $receiver, $_SESSION['unique_id'], $_SESSION['unique_id'], $receiver);

$sql = "SELECT * FROM users WHERE unique_id = ?";

$receiver_info = pdo_get_one_row($sql, $receiver);
?>


<div class='chat-name'>
    <div id="receiver_id" data="<?php echo $receiver_info['unique_id'] ?>" hidden></div>
    <div>
        <h2 class='chat-name--name'><?php echo $receiver_info['fname'] . " " . $receiver_info['lname'] ?>
            <span class='status'></span>
        </h2>
    </div>
    <div class='chat-name--delete'>
        <i class='far fa-trash-alt'></i>Xóa lịch sử cuộc hội thoại
    </div>
</div>
<div class='chat-content'>
    <?php

    if (!$allMess) {
        echo "<div class='content-date'>
                    <span>Hãy bắt đầu cuộc hội thoại</span>
                    </div>";
    } else {
        $checkDay = true;
        $count = 0;
        $temp = "";
        foreach ($allMess as $mess) {
            extract($mess);
            $content = nl2br($content);
            // set up ngày tháng

            $d =  explode("-", explode(" ", $mess['time'])[0])[2];  //Ngày tin nhắn
            $M =  explode("-", explode(" ", $mess['time'])[0])[1];  //Tháng tin nhắn
            $y =  explode("-", explode(" ", $mess['time'])[0])[0];  //Năm tin nhắn
            $h =  explode(":", explode(" ", $mess['time'])[1])[0];  //Giờ tin nhắn
            $m =  explode(":", explode(" ", $mess['time'])[1])[1];  //Phút tin nhắn

            $smallTime = $h . ":" . $m; //Thời gian tin nhắn (Rút gọn)


            $nowD = date('d', time());   //Ngày hiện tại
            $nowM = date('m', time());   //Tháng hiện tại
            $nowY = date('Y', time());   //Năm hiện tại


            $totalDate1 = $d + ($M * 30) + (($y) * 30 * 12);   //Tổng ngày tin nhắn
            $totalDate2 = $nowD + ($nowM * 30) + ($nowY * 30 * 12);    //Tổng ngày hiện tại
            $minus = $totalDate2 - $totalDate1; //Thời gian đã trôi qua


            $when = "";
            if ($minus < 1 && $nowD - $d == 0) {
                if ($checkDay) {

                    $when = "Hôm nay";
                    $checkDay = false;
                }
            } else if ($minus >= 1) {

                $tempTime = explode("-", explode(" ", $mess['time'])[0]);
                $tempTime = array_reverse(array_slice($tempTime, 1));
                $when = implode(" Tháng ", $tempTime);
                $count++;
            }

            // Biến check xem có lập không
            if ($count == 1) {

                $temp = $when;
            } else if ($count > 1) {

                if ($temp == $when) {

                    $when = "";
                } else {

                    $temp = $when;
                }
            }

            if ($send_id == $_SESSION['unique_id']) {
                echo "
                    <div class='content-date'>
                    <span>{$when}</span>
                    </div>
                <div class='content content-right'>
                    <span class='content-message'>$content</span>
                    <div class='small-time'>{$smallTime}</div>
                 </div>";
            } else {
                echo "
                    <div class='content-date'>
                    <span>{$when}</span>
                    </div>
                    <div class='content content-left'>
                    <div class='content-avatar'>
                        <img src='../../images/user/{$receiver_info['img']}' />
                    </div>
                        <span class='content-message'>$content</span>
                        <div class='small-time'>{$smallTime}</div>
                    </div>";
            }
        }
    }

    ?>
</div>
<div class='chat-write'>
    <textarea type='text' class='write-input' placeholder='Nhắn tin ở đây'></textarea>
    <div class='write-send-btn' data='$box_id'>
        <span><i class='fas fa-paper-plane'></i></span>
    </div>
</div>

<script>
    const chatContent = document.querySelector(".chat-content");
    const receiverId = document
        .querySelector("#receiver_id")
        .getAttribute("data");

    // <!-- Scroll To bottom -->
    function scrollToBottom() {
        chatContent.scrollTop = chatContent.scrollHeight;
    }

    chatContent.addEventListener("mouseenter", function() {
        chatContent.classList.add("active");
    });
    chatContent.addEventListener("mouseleave", function() {
        chatContent.classList.remove("active");
    });

    inter2 = setInterval(function() {
        const http = new XMLHttpRequest();

        http.open("post", "../../back-end/loadChatContent.php", true);
        http.onload = () => {
            if (http.readyState === XMLHttpRequest.DONE) {
                if (http.status === 200) {
                    let data = http.response;
                    data = JSON.parse(data);
                    chatContent.innerHTML = data['data'];

                    let statusUser = document.querySelector(".chat-name--name .status");

                    if (data["status"] == "Đang hoạt động") {
                        statusUser.innerText = `${data["status"]}`;
                        statusUser.classList.add("online");
                        statusUser.classList.remove("offline");
                    } else {
                        statusUser.innerText = `${data["status"]}`;
                        statusUser.classList.add("offline");
                        statusUser.classList.remove("online");
                    }

                    if (!chatContent.classList.contains("active")) {
                        scrollToBottom();
                    }
                }
            }
        };
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        http.send("receiver=" + receiverId);
    }, 500);

    //  Chạy ajax nhắn tin

    const messageInput = document.querySelector(".write-input");
    const sendBtn = document.querySelector(".write-send-btn");

    sendBtn.addEventListener("click", function() {
        let content = messageInput.value;
        const http = new XMLHttpRequest();

        http.open("post", "../../back-end/sendMessage.php", true);
        http.onload = () => {
            if (http.readyState === XMLHttpRequest.DONE) {
                if (http.status === 200) {
                    let data = http.response;
                    if (data == "success") {
                        messageInput.value = "";
                    }
                }
            }
        };
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("box_id=" + receiverId + "&content=" + content);
    });

    messageInput.addEventListener("keyup", function(event) {
        let content = messageInput.value;
        content = content.trim();
        if (event.keyCode == 13 && !event.shiftKey) {
            if (content.length > 0) {
                const http = new XMLHttpRequest();

                http.open("post", "../../back-end/sendMessage.php", true);
                http.onload = () => {
                    if (http.readyState === XMLHttpRequest.DONE) {
                        if (http.status === 200) {
                            let data = http.response;
                            if (data == "success") {
                                messageInput.value = "";
                                content = "";
                                sendBtn.classList.remove("active");
                            }
                        }
                    }
                };
                http.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );

                http.send("box_id=" + receiverId + "&content=" + content);
            } else {
                messageInput.value = "";
            }
        }

        if (content) {
            sendBtn.classList.add("active");
        } else {
            sendBtn.classList.remove("active");
        }
    });
</script>