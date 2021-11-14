// them cmt
(function() {
    let sendCmt = document.querySelectorAll('.add-cmt');
    sendCmt.forEach((item) => {

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

// load more
(function() {
    let moreCmt = document.querySelectorAll('.more-cmt');
    moreCmt.forEach((item) => {
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