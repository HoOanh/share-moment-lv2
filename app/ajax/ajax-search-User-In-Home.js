let inputField = document.querySelector('#search-User-In-Home'); // đây là nơi user nhập tìm kiếm
let resultField = document.querySelector('#search-User-Container'); // đây là nơi hiện ra kết quả

(function () {

    inputField.onkeyup = () => {

        let inputValue = inputField.value; // lấy giá trị trong field input

        const http = new XMLHttpRequest();

        http.open("POST", "../../back-end/searchUserInHome.php", true);
        http.onload = () => {
            if (http.readyState == XMLHttpRequest.DONE) {
                if (http.status == 200) {
                    var data = http.response;

                    if(!inputValue){
                    resultField.innerHTML = "<h4 class='search_title'> Nhập để bắt đầu tìm kiếm </h4>"
                   }else{
                        resultField.innerHTML = data;
                    }
                    
                }
            }
        }

        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('inputValue=' + inputValue);
        
    }

})()