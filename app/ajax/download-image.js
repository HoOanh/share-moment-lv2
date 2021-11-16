// const { saveAs } = require("../../vendor/FileSaver.js/src/FileSaver");

;
(function() {
    const downloadBtns = document.querySelectorAll(".ajax-download-btn");

    downloadBtns.forEach(e => {
        e.addEventListener("click", function() {


            const container = e.parentElement.parentElement.parentElement.parentElement.parentElement;
            const img = container.querySelector(".ajax-image");

            const url = img.getAttribute("src");
            const imgName = url.substring(url.lastIndexOf("/") + 1);
            saveAs(url, imgName);
        })

    })

})()