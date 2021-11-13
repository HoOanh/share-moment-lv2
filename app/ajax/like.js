const likeBtns = document.querySelectorAll(".like-btn");
likeBtns.forEach(btn => {

    btn.addEventListener("click", function() {
        let postId = btn.getAttribute('data');
        let likeContainer = btn.parentElement.parentElement.querySelector(".quantity-like");
        const http = new XMLHttpRequest();

        http.open("post", '../../back-end/like.php', true);

        http.onload = () => {
            if (http.readyState === XMLHttpRequest.DONE) {
                if (http.status === 200) {
                    let data = http.response;

                    if (data == 0) {
                        likeContainer.parentElement.innerHTML = "<span class='quantity-like'></span><strong>Hãy là người đầu tiên thích bài viết này </strong>";
                    } else {
                        likeContainer.parentElement.innerHTML = `<span class = 'quantity-like'> ${data} </span> <strong> lượt thích </strong>`;
                    }

                }
            }
        }

        http.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
        );
        http.send("post_id=" + postId);
    })
})