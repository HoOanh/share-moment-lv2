(function () {
    let deleteBtn = document.querySelectorAll('.deleteBtn');

    deleteBtn.forEach(item => {

        if (item.getAttribute('listener') !== "true") {
            item.setAttribute('listener','true');

            item.addEventListener('click', function () {
                
                let post_id = item.getAttribute('post_id');
                let unique_id = item.getAttribute('unique_id');

                let check = confirm('Xóa bài viết này nhé ?');

                if (check) {
                    const http = new XMLHttpRequest();
                    http.open("post", "../../back-end/deletePost.php", true);

                    http.onload = () => {
                        if (http.readyState === XMLHttpRequest.DONE) {
                            if (http.status === 200) {
                                var data = http.response;

                                if (data == "Xóa thành công") {
                                    item.parentNode.parentNode.parentNode.parentNode.parentNode.remove(item);
                                }
                            }
                        }
                    };

                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    http.send('post_id=' + post_id + '&unique_id=' + unique_id);
                }

            })
            
        }
    })
})()

