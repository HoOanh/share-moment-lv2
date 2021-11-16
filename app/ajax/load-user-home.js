let userContains = document.querySelector(".load-user-home");

setInterval(() => {
  userContains.onmouseover = () => {
    userContains.classList.add("active");
  };

  userContains.onmouseout = () => {
    userContains.classList.remove("active");
  };
}, 500);

setInterval(() => {
  var http = new XMLHttpRequest();
  http.open("post", "../../back-end/load-user-home.php", true);

  http.onload = () => {
    if (http.readyState === XMLHttpRequest.DONE) {
      if (http.status === 200) {
        var data = http.response;
        if (!userContains.classList.contains("active")) {
          userContains.innerHTML = data;
        }
      }
    }
  };
  http.send();
}, 500);
