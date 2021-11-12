var form = document.querySelector(".form2");
form.onsubmit = (e) => {
    e.preventDefault();
};

let submit = () => {
    var http = new XMLHttpRequest();
    http.open("post", "../../back-end/login.php", true);

    http.onload = () => {
        if (http.readyState === XMLHttpRequest.DONE) {
            if (http.status === 200) {
                var data = http.response;

                // Chuyển JSON thành obj
                data = JSON.parse(data);

                if (data["data"] !== "success") {
                    error.textContent = data["data"];
                    error.parentElement.style.display = "flex";
                } else {
                    if (data["role"] == "1") {
                        location.href = "../../admin";
                    } else {
                        error.parentElement.style.display = "none";
                        location.href = "../home";
                    }
                }
            }
        }
    };
    let formData = new FormData(form);
    http.send(formData); // gui form
};

let error = document.querySelector(".er");
var senBtn = document.querySelector(".btn-send");
senBtn.onclick = submit;

let inputList = document.querySelectorAll("input");

inputList.forEach((item) => {
    item.addEventListener("keydown", function(event) {
        if (event.keyCode == 13) {
            submit();
        }
    });
});