let formPost = document.querySelector("#form-post");
let share = document.querySelector(".share-post");

formPost.onsubmit = (e) => {
    e.preventDefault();
};
share.onclick = () => {
    var http = new XMLHttpRequest();
    http.open("post", "../../back-end/create-post.php", true);

    http.onload = () => {
        if (http.readyState === XMLHttpRequest.DONE) {
            if (http.status === 200) {
                document.querySelector("html").classList.remove("uk-modal-page");

                let op = document.querySelector("#create-post-modal");
                op.classList.remove("uk-open");
                op.classList.remove("uk-flex");

                formPost.reset();

                var img = document.querySelector("#myImg");
                img.src = "";
                document.getElementsByClassName("add-img")[0].style.display = "none";

                const video = document.querySelector(".video-preview");
                video.src = "";
                document.getElementsByClassName("add-video")[0].style.display = "none";

                let data = JSON.parse(http.response);
                const newPostContainer = document.querySelector("#new-post");
                let newPost = "";
                let temp = newPostContainer.innerHTML;
                if (data["status"]) {
                    if (data["type"] == "video") {
                        newPost += `<div class='card lg:mx-0 uk-animation-slide-bottom-small'><div class='flex justify-between items-center lg:p-4 p-2.5'>
                        <div class='flex flex-1 items-center space-x-4'>
                            <a href='#'>
                                <img src=\"../../images/user/${data["user"]["img"]}\" class='bg-gray-200 border border-white rounded-full w-10 h-10'>
                            </a>
                            <div class='flex-1 font-semibold capitalize'>
                                <a href='#' class='text-black dark:text-gray-100'>${data["user"]["fname"]} ${data["user"]["lname"]}</a>
                                <div class='text-gray-700 flex items-center space-x-2'> V???a xong
                               ${data["data"]["post_role"]}
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href='#'> <i class='fas fa-ellipsis-h'></i> </a>
                            <div class='bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700' uk-drop='mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small'>

                                <ul class='space-y-1'>
                                    <li>
                                        <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                            <i class='fas fa-share-alt mr-1'></i> Chia s???
                                        </a>
                                    </li>
                                    <li>
                                        <a href='../edit/?post_id=${data["data"]["post_id"]}' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                            <i class='far fa-edit mr-1'></i> Ch???nh s???a
                                        </a>
                                    </li>
                                    <li>
                                        <hr class='-mx-2 my-2 dark:border-gray-800'>
                                    </li>
                                    <li post_id='${data["data"]["post_id"]}' unique_id='${data["user"]["unique_id"]}' listener='false' class='deleteBtn' >
                                        <a class='flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600'>
                                            <i class='far fa-trash-alt mr-1'></i> X??a b??i vi???t
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class='p-5 pt-0 border-b dark:border-gray-700'>
                        ${data["data"]["caption"]}
                    </div>


                    <div class='w-full h-full'>
                        <video muted src=\ "../../video/post/${data["data"]["post_video"]}\"  controls  frameborder='0' allowfullscreen uk-responsive class='w-full lg:h-64 h-40'>


                        </video>
                    </div>


                    <div class='p-4 space-y-3'>

                        <div class='flex space-x-4 lg:font-bold'>
                            <a data='${data["data"]["post_id"]}' class='flex items-center space-x-2 like-btn' >
                                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                        <path d='M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z' />
                                    </svg>
                                </div>
                                <div> Th??ch</div>
                            </a>
                            <a href='#' class='flex items-center space-x-2'>
                                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                        <path fill-rule='evenodd' d='M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z' clip-rule='evenodd' />
                                    </svg>
                                </div>
                                <div> B??nh lu???n</div>
                            </a>
                            <a href='#' class='flex items-center space-x-2 flex-1 justify-end'>
                                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                        <path d='M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z' />
                                    </svg>
                                </div>
                                <div> Chia s???</div>
                            </a>
                        </div>
                        <div class='flex items-center space-x-3 pt-2'>
                            <div class='dark:text-gray-100'>
                            <span class='quantity-like'></span><strong>H??y l?? ng?????i ?????u ti??n th??ch b??i vi???t n??y </strong>
                            </div>
                        </div>

                        <div class='border-t py-4 space-y-4 dark:border-gray-600 box-comment'>



                        </div>



                        <div class='bg-gray-100 rounded-full relative dark:bg-gray-800 border-t'>
                            <input data='${data["data"]["post_id"]}' placeholder='Add your Comment..' class='bg-transparent max-h-10 shadow-none px-5 add-cmt'>
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

                    </div></div> `;
                    }
                    if (data["type"] == "img" || data["type"] == "") {
                        let saveImg = "";
                        if (data["type"] == "img") {
                            saveImg = `<li class='ajax-download-btn'>
                                    <a class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                        <i class='fas fa-download mr-1'></i> T???i ???nh
                                    </a>
                                </li>`;
                        }
                        newPost += `<div class='card lg:mx-0 uk-animation-slide-bottom-small'>

                        <div class='flex justify-between items-center lg:p-4 p-2.5'>
                        <div class='flex flex-1 items-center space-x-4'>
                            <a href='#'>
                                <img src='../../images/user/${data["user"]["img"]}' class='bg-gray-200 border border-white rounded-full w-10 h-10'>
                            </a>
                            <div class='flex-1 font-semibold capitalize'>
                                <a href='#' class='text-black dark:text-gray-100'>${data["user"]["fname"]} ${data["user"]["lname"]}</a>
                                <div class='text-gray-700 flex items-center space-x-2'> V???a xong
                                ${data["data"]["post_role"]}
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href='#'> <i class='fas fa-ellipsis-h'></i> </a>
                            <div class='bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700' uk-drop='mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small'>

                                <ul class='space-y-1'>
                                ${saveImg}
                                    <li>
                                        <a href='#' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                            <i class='fas fa-share-alt mr-1'></i> Chia s???
                                        </a>
                                    </li>
                                    <li>
                                        <a href='../edit/?post_id=${data["data"]["post_id"]}' class='flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800'>
                                            <i class='far fa-edit mr-1'></i> Ch???nh s???a
                                        </a>
                                    </li>
                                    <li>
                                        <hr class='-mx-2 my-2 dark:border-gray-800'>
                                    </li>
                                    <li post_id='${data["data"]["post_id"]}' unique_id='${data["user"]["unique_id"]}' listener='false' class='deleteBtn'>
                                        <a class='flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600'>
                                            <i class='far fa-trash-alt mr-1'></i> X??a b??i vi???t
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class='p-5 pt-0 border-b dark:border-gray-700'>
                    ${data["data"]["caption"]}
                    </div>

                    <div uk-lightbox>
                        <a href=\"../../images/post/${data["data"]["post_img"]}\">
                            <img src=\"../../images/post/${data["data"]["post_img"]}\" alt='' class='max-h-96 w-full object-cover ajax-image'>
                        </a>
                    </div>

                    <div class='p-4 space-y-3'>

                        <div class='flex space-x-4 lg:font-bold'>
                            <a data='${data["data"]["post_id"]}' class='flex items-center space-x-2 like-btn'>
                                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                        <path d='M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z' />
                                    </svg>
                                </div>
                                <div> Th??ch</div>
                            </a>
                            <a href='#' class='flex items-center space-x-2'>
                                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                        <path fill-rule='evenodd' d='M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z' clip-rule='evenodd' />
                                    </svg>
                                </div>
                                <div> B??nh lu???n</div>
                            </a>
                            <a href='#' class='flex items-center space-x-2 flex-1 justify-end'>
                                <div class='p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' width='22' height='22' class='dark:text-gray-100'>
                                        <path d='M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z' />
                                    </svg>
                                </div>
                                <div> Chia s???</div>
                            </a>
                        </div>
                        <div class='flex items-center space-x-3 pt-2'>
                            <div class='dark:text-gray-100'>
                            <span class='quantity-like'></span><strong>H??y l?? ng?????i ?????u ti??n th??ch b??i vi???t n??y </strong>
                            </div>
                        </div>

                        <div class='border-t py-4 space-y-4 dark:border-gray-600 box-comment'>



                        </div>



                        <div class='bg-gray-100 rounded-full relative dark:bg-gray-800 border-t'>
                            <input data='${data["data"]["post_id"]}' placeholder='Add your Comment..' class='bg-transparent max-h-10 shadow-none px-5 add-cmt'>
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
                    </div>
                        `;
                    }

                    newPost = newPost + temp;
                    newPostContainer.innerHTML = newPost;
                    start += 1;

                    //   ajax n??t like nha
                    //   ================================================================

                    (function() {
                        const allContainer = document.querySelectorAll("#new-post>div");

                        allContainer.forEach((e) => {
                            const likeBtns = e.querySelector(".like-btn");
                            likeBtns.addEventListener("click", function() {
                                likeBtns.classList.toggle("active");
                                let postId = likeBtns.getAttribute("data");
                                let likeContainer =
                                    likeBtns.parentElement.parentElement.querySelector(
                                        ".quantity-like"
                                    );
                                const http = new XMLHttpRequest();

                                http.open("post", "../../back-end/like.php", true);

                                http.onload = () => {
                                    if (http.readyState === XMLHttpRequest.DONE) {
                                        if (http.status === 200) {
                                            let data = http.response;

                                            if (data == 0) {
                                                likeContainer.parentElement.innerHTML =
                                                    "<span class='quantity-like'></span><strong>H??y l?? ng?????i ?????u ti??n th??ch b??i vi???t n??y </strong>";
                                            } else {
                                                likeContainer.parentElement.innerHTML = `
                                                      <div class='flex items-center' >
                                                                      <img src='../../images/post/like-icon.png' alt='' class='w-6 h-6 rounded-full border-2 border-white dark:border-gray-900'>
                                                          <span class='quantity-like' style='margin-left: 0.15em;'> ${data}<strong> l?????t th??ch </strong> </span>
                                                          </div>
                                                    `;
                                            }
                                        }
                                    }
                                };

                                http.setRequestHeader(
                                    "Content-type",
                                    "application/x-www-form-urlencoded"
                                );
                                http.send("post_id=" + postId);
                            });
                        });
                    })();

                    // ajax com men
                    (function() {
                        const allContainer = document.querySelectorAll("#new-post>div");

                        allContainer.forEach((e) => {
                            let sendCmt = e.querySelector(".add-cmt");

                            sendCmt.addEventListener("keyup", (event) => {
                                let cmt_content = sendCmt.value;
                                cmt_content = cmt_content.trim();
                                if (
                                    event.keyCode == 13 &&
                                    !event.shiftKey &&
                                    cmt_content != ""
                                ) {
                                    let postID = sendCmt.getAttribute("data");
                                    const http = new XMLHttpRequest();

                                    http.open("post", "../../back-end/add-cmt.php", true);
                                    http.onload = () => {
                                        if (http.readyState === XMLHttpRequest.DONE) {
                                            if (http.status === 200) {
                                                let data = http.response;
                                                data = JSON.parse(data);
                                                let boxCmt =
                                                    sendCmt.parentElement.parentElement.children[2];
                                                boxCmt.innerHTML += data["data"];
                                                sendCmt.value = "";
                                            }
                                        }
                                    };
                                    http.setRequestHeader(
                                        "Content-type",
                                        "application/x-www-form-urlencoded"
                                    );
                                    http.send(
                                        "post_id=" + postID + "&cmt_content=" + cmt_content
                                    );
                                }
                            });
                        });
                    })();

                    // T???i ???nh
                    (function() {
                        const allContainer = document.querySelectorAll("#new-post>div");

                        allContainer.forEach((e) => {
                            const downloadBtn = e.querySelector(".ajax-download-btn");
                            if (downloadBtn) {
                                downloadBtn.addEventListener("click", function() {
                                    const img = e.querySelector(".ajax-image");

                                    let imgUrl = img.getAttribute("src");
                                    const imgName = imgUrl.substring(imgUrl.lastIndexOf("/") + 1);
                                    saveAs(imgUrl, imgName);
                                });
                            }
                        });
                    })();

                    // X??a ???nh
                    (function() {
                        let deleteBtn = document.querySelectorAll(".deleteBtn");

                        deleteBtn.forEach((item) => {
                            if (item.getAttribute("listener") !== "true") {
                                item.setAttribute("listener", "true");

                                item.addEventListener("click", function() {
                                    let post_id = item.getAttribute("post_id"); //Data bao g???m post_id v?? unique_id ng?????i ????ng
                                    let unique_id = item.getAttribute("unique_id");

                                    let check = confirm("X??a b??i vi???t n??y nh?? ?");

                                    if (check) {
                                        const http = new XMLHttpRequest();
                                        http.open("post", "../../back-end/deletePost.php", true);

                                        http.onload = () => {
                                            if (http.readyState === XMLHttpRequest.DONE) {
                                                if (http.status === 200) {
                                                    var data = http.response;

                                                    if (data == "X??a th??nh c??ng") {
                                                        item.parentNode.parentNode.parentNode.parentNode.parentNode.remove(
                                                            item
                                                        );
                                                    }
                                                }
                                            }
                                        };

                                        http.setRequestHeader(
                                            "Content-type",
                                            "application/x-www-form-urlencoded"
                                        );

                                        http.send("post_id=" + post_id + "&unique_id=" + unique_id);
                                    }
                                });
                            }
                        });
                    })();
                }

                if (data["res_status"] === "success") {
                    let msg = data["msg"];
                    document.querySelector("#show-msg").innerHTML += `
                    <div class='alert alert--success show'>
                    <i class='fas fa-check'></i>
                    <span class='msg'>${msg}</span>
                    <span class='close-btn'>
                    <span class='fas fa-times'></span>
                    </span>
                    </div>
                    `;
                }

                if (data["res_status"] === "warning") {
                    let msg = data["data"];
                    document.querySelector("#show-msg").innerHTML += `
                    <div class='alert alert--warning show'>
                    <i class='fas fa-exclamation-circle'></i>
                    <span class='msg'>${msg}</span>
                    <span class='close-btn'>
                    <span class='fas fa-times'></span>
                    </span>
                    </div>
                    `;
                }

                (function() {
                    setTimeout(function() {
                        document.querySelector(".alert").classList.remove("show");
                        document.querySelector(".alert").classList.add("hide");

                        setTimeout(function() {
                            document.querySelector("#show-msg").innerHTML = "";
                        }, 1500);
                    }, 5000);
                    document
                        .querySelector(".close-btn")
                        .addEventListener("click", function() {
                            document.querySelector(".alert").classList.remove("show");
                            document.querySelector(".alert").classList.add("hide");
                            setTimeout(function() {
                                document.querySelector("#show-msg").innerHTML = "";
                            }, 1500);
                        });
                })();
            }
        }
    };
    let formData = new FormData(formPost);
    http.send(formData);
};