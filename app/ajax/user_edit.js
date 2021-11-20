button = document.querySelector('#user-button');

form = document.querySelector("#form-login");

form.onsubmit = (e) => {
    e.preventDefault();
}

(function () {
    button.onclick = () => {
        var http = new XMLHttpRequest();
        http.open("POST", "../../back-end/user_edit.php", true);

        http.onload = () => {
            if (http.readyState === XMLHttpRequest.DONE) {
                if (http.status === 200) {
                    var data = http.response;
                    location.href = "../account";
                }
            }
        };
        let formData = new FormData(form);
        http.send(formData); // gui form
    }
})()