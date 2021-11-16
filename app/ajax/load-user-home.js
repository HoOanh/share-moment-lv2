let userContains = document.querySelector(".load-user-home");

setInterval(() => {
  var http = new XMLHttpRequest();
  http.open("post", "../../back-end/load-user-home.php", true);

  http.onload = () => {
    if (http.readyState === XMLHttpRequest.DONE) {
      if (http.status === 200) {
        var data = http.response;
        userContains.innerHTML = data;
      }
    }
  };
  http.send();
}, 500);
