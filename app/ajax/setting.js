let form = document.querySelector('.form');
let changeBtn = document.querySelector('.change');

form.onsubmit = (e)=>{
    e.preventDefault();
}

changeBtn.onclick = () => {
    var http = new XMLHttpRequest();
    http.open("post", "../../back-end/setting.php", true);
  
    http.onload = () => {
      if (http.readyState === XMLHttpRequest.DONE) {
        if (http.status === 200) {
          var data = http.response;
     
        //   Chuyển JSON thành obj
          data = JSON.parse(data);
          if(data['status'] == 'false'){
              alert(data['data']);
          }else{
            alert(data['data']);
          }
    
        }
      }
    };
    let formData = new FormData(form);
    http.send(formData); // gui form
  };