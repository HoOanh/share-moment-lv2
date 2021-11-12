const form = document.querySelector("#form-upload");
const uploadBtn = document.querySelector("button");
const message = document.querySelector(".message");
const video = document.querySelector("video");
form.addEventListener("submit", function(event) {
    event.preventDefault();
})
uploadBtn.addEventListener("click", function() {
    message.innerText = 'Đang upload video';
    message.classList.add('success');

    const http = new XMLHttpRequest();

    http.open("post", "./upload.php", true);
    http.onload = () => {
        if (http.readyState === XMLHttpRequest.DONE) {
            if (http.status === 200) {
                let data = JSON.parse(http.response);

                if (data['status']) {
                    message.classList.remove('error');
                    message.classList.add('success');
                    message.innerText = data['data'];
                    video.src = './video/' + data['name'];
                    video.autoplay;
                    video.setAttribute('controls', true);
                    video.setAttribute('autoplay', true);

                } else {
                    message.classList.remove('success');
                    message.classList.add('error');
                    message.innerText = data['data'];
                }

            }
        }
    }
    let formData = new FormData(form);
    http.send(formData);
})