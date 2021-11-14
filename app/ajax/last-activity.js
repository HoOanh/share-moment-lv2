setInterval(function() {

    let http = new XMLHttpRequest();

    http.open("post", "../../back-end/last-activity.php", true);
    http.onload = () => {
        if (http.readyState === XMLHttpRequest.DONE) {
            if (http.status === 200) {

            }
        }
    }
    http.send();
}, 30000);