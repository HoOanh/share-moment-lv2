    // them cmt
    (function() {
        let sendCmt = document.querySelectorAll('.add-cmt');

        // convert nodelist to array
        let arr = [];
        for (var i = sendCmt.length; i--; arr.unshift(sendCmt[i]));

        let count = -1 * soluong;


        arr = arr.slice(count);

        arr.forEach((item) => {

            item.addEventListener('keyup', (event) => {
                let cmt_content = item.value;
                cmt_content = cmt_content.trim();
                if (event.keyCode == 13 && !event.shiftKey && cmt_content != '') {

                    let postID = item.getAttribute("data");
                    const http = new XMLHttpRequest();

                    http.open("post", "../../back-end/add-cmt.php", true);
                    http.onload = () => {
                        if (http.readyState === XMLHttpRequest.DONE) {
                            if (http.status === 200) {
                                let data = http.response;
                                data = JSON.parse(data);
                                let boxCmt = item.parentElement.parentElement.children[2];
                                boxCmt.innerHTML += data['data'];
                                item.value = '';
                            }
                        }
                    };
                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    http.send("post_id=" + postID + "&cmt_content=" + cmt_content);
                }

            })
        })
    })();

    // load more cmt
    (function() {
        let moreCmt = document.querySelectorAll('.more-cmt');

        // convert nodelist to array
        let arr = [];
        for (var i = moreCmt.length; i--; arr.unshift(moreCmt[i]));

        let count = -1 * soluong;


        arr = arr.slice(count);

        arr.forEach((item) => {
            item.onclick = () => {
                const http = new XMLHttpRequest();
                let post_id = item.getAttribute("data")
                http.open("post", "../../back-end/loadMoreCmt.php", true);
                http.onload = () => {
                    if (http.readyState === XMLHttpRequest.DONE) {
                        if (http.status === 200) {
                            let data = http.response;
                            data = JSON.parse(data);
                            let boxCmt = item.previousElementSibling;
                            boxCmt.innerHTML = data['data'];
                            item.style.display = 'none';
                            item.nextElementSibling.children[0].focus();

                        }
                    }
                };
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.send("post_id=" + post_id);
            }
        })

        ;
    })();


    // like 
    (function() {
        let likeBtns = document.querySelectorAll('.like-btn');

        // convert nodelist to array
        let arr = [];
        for (var i = likeBtns.length; i--; arr.unshift(likeBtns[i]));

        let count = -1 * soluong;

        arr = arr.slice(count);

        arr.forEach((btn) => {
            btn.addEventListener('click', function() {
                let postId = btn.getAttribute('data');
                let likeContainer =
                    btn.parentElement.parentElement.querySelector('.quantity-like');
                const http = new XMLHttpRequest();

                http.open('post', '../../back-end/like.php', true);

                http.onload = () => {
                    if (http.readyState === XMLHttpRequest.DONE) {
                        if (http.status === 200) {
                            let data = http.response;

                            if (data == 0) {
                                likeContainer.parentElement.innerHTML =
                                    '<span class=\'quantity-like\'></span><strong>Hãy là người đầu tiên thích bài viết này </strong>';
                            } else {
                                likeContainer.parentElement.innerHTML = `
                                <div class='flex items-center' >
                                                <img src='../../images/post/like-icon.png' alt='' class='w-6 h-6 rounded-full border-2 border-white dark:border-gray-900'>
                                    <span class='quantity-like' style='margin-left: 0.15em;'> ${data}<strong> lượt thích </strong> </span>
                                    </div>
                              `;
                            }
                        }
                    }
                };

                http.setRequestHeader(
                    'Content-type',
                    'application/x-www-form-urlencoded'
                );
                http.send('post_id=' + postId);
            });
        });
    })();

    // Download image
    ;
    (function() {
        let downloadBtns = document.querySelectorAll('.ajax-download-btn');

        // convert nodelist to array
        let arr = [];
        for (var i = downloadBtns.length; i--; arr.unshift(downloadBtns[i]));

        let count = -1 * soluong;

        arr = arr.slice(count);

        arr.forEach((btn) => {

            btn.addEventListener("click", function() {

                const container = btn.parentElement.parentElement.parentElement.parentElement.parentElement;
                const img = container.querySelector(".ajax-image");

                const url = img.getAttribute("src");
                const imgName = url.substring(url.lastIndexOf("/") + 1);
                saveAs(url, imgName);
            })

        });
    })();