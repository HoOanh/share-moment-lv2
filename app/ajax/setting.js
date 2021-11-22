let form = document.querySelector('.form');
let changeBtn = document.querySelector('.change');

form.onsubmit = (e) => {
    e.preventDefault();
}

changeBtn.onclick = () => {
    var http = new XMLHttpRequest();
    http.open("post", "../../back-end/setting.php", true);

    http.onload = () => {
        if (http.readyState === XMLHttpRequest.DONE) {
            if (http.status === 200) {

                //   Chuyển JSON thành obj
                data = JSON.parse(http.response);
                if (data['status'] == 'success') {
                    let msg = data['data'];
                    document.querySelector('#show-msg').innerHTML += `
                    <div class='alert alert--success show'>
                    <i class='fas fa-check'></i>
                    <span class='msg'>${msg}</span>
                    <span class='close-btn'>
                    <span class='fas fa-times'></span>
                    </span>
                    </div>
                    `;
                }

                if (data['status'] == 'warning') {
                    let msg = data['data'];
                    document.querySelector('#show-msg').innerHTML += `
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
                            document.querySelector('#show-msg').innerHTML = '';
                        }, 1500);
                    }, 5000)
                    document.querySelector(".close-btn").addEventListener("click", function() {
                        document.querySelector(".alert").classList.remove("show");
                        document.querySelector(".alert").classList.add("hide");
                        setTimeout(function() {
                            document.querySelector('#show-msg').innerHTML = '';
                        }, 1500)
                    })
                })();

            }
        }
    };
    let formData = new FormData(form);
    http.send(formData); // gui form
};