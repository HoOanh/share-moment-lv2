let formPost = document.querySelector('#form-post');
let share = document.querySelector('.share-post');
formPost.onsubmit = (e) =>{
    e.preventDefault();
}
share.onclick = ()=>{
    let text = document.querySelector('.uk-textare');
    var http = new XMLHttpRequest();
    http.open('post', '../../back-end/create-post.php', true);

    http.onload = () => {
        if (http.readyState === XMLHttpRequest.DONE) {
            if (http.status === 200) {
                var data = http.response;
                let op =   document.querySelector('#create-post-modal');
                op.classList.remove('uk-open');
               
                formPost.reset();
                var img = document.querySelector('#myImg');
            
                img.src = ''; // set src to blob url
                let x = document.getElementsByClassName('add-img')[0].style.display = 'none';
            }
        }
    }
    let formData = new FormData(formPost);
    http.send(formData);
}