function sendMail() {

    ;
    (function() {


        const error = document.querySelector(".er");
        error.parentElement.style.backgroundColor = '#10b981';
        error.textContent = "Đang gửi link đến mail của bạn";
        error.parentElement.style.display = 'flex';

        let http2 = new XMLHttpRequest();
        http2.open('post', '../../back-end/send-mail-verif.php', true);

        http2.onload = () => {
            if (http2.readyState === XMLHttpRequest.DONE) {
                if (http2.status === 200) {
                    let data = JSON.parse(http2.response);
                    if (data['data'] !== 'success') {
                        error.textContent = data['data'];
                        error.parentElement.style.display = 'flex';
                    } else {
                        error.parentElement.style.backgroundColor = '#10b981';
                        error.textContent = 'Mail đã được gửi';
                        error.parentElement.style.display = 'flex';

                        setTimeout(function() {
                            for (let i = 3; i >= 0; i--) {
                                let time = (3 - i) * 1000;
                                setTimeout(function() {
                                    error.textContent = `Sẽ trở về trang đăng nhập trong ${i} s`;
                                    if (i == 0) {
                                        location.href = "../login?status=success&msg=Vui lòng kiểm tra mail để kích hoạt tài khoản!";
                                    }
                                }, time);
                            }
                        }, 1000)
                    }
                }
            }
        }

        let email = document.querySelector("input[type='email']").value;
        http2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http2.send("email=" + email);

    })();
}