let http = new XMLHttpRequest();
http.open("post", "../../back-end/browser_data.php", true);
http.onload = () => {
    if (http.readyState === XMLHttpRequest.DONE) {
        if (http.status == 200) {
            let data = JSON.parse(http.response);

            let browerLabels = [];
            let browerData = [];
            for (const prop in data) {
                browerLabels.push(data[prop]['name']);
                browerData.push(data[prop]['total']);
            }

            var ctx = document.getElementById("myChart").getContext("2d");


            var myChart = new Chart(ctx, {
                type: "polarArea",
                data: {
                    labels: browerLabels,
                    datasets: [{
                        label: "# of Votes",
                        data: browerData,
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.8)",
                            "rgba(54, 162, 235, 0.8)",
                            "rgba(255, 206, 86, 0.8)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                    }, ],
                },
                options: {
                    responsive: true,
                },
            });


        }
    }
}
http.send();


let http2 = new XMLHttpRequest();
http2.open("post", "../../back-end/post_data.php", true);
http2.onload = () => {
    if (http.readyState === XMLHttpRequest.DONE) {
        if (http.status == 200) {
            let data = JSON.parse(http2.response);
            let intData = [];
            data.forEach(element => {
                intData.push(parseInt(element));
            });

            var earning = document.getElementById("earning").getContext("2d");
            var earning = new Chart(earning, {
                type: "bar",
                data: {
                    labels: [
                        "Th 1",
                        "Th 2",
                        "Th 3",
                        "Th 4",
                        "Th 5",
                        "Th 6",
                        "Th 7",
                        "Th 8",
                        "Th 9",
                        "Th 10",
                        "Th 11",
                        "Th 12"
                    ],
                    datasets: [{
                        label: "Số bài post",
                        data: intData,
                        backgroundColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                    }, ],
                },
                options: {
                    responsive: true,
                },
            });
        }
    }
}

http2.send();