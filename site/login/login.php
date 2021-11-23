<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="../../images/header/logo-mobile.png" rel="icon" type="image/png">

    <title>Sharemoment | Đăng Nhập</title>

    <!-- Font awesome cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom css file -->
    <link rel="stylesheet" href="../../app/css/login.css">
    <link rel="stylesheet" href="../../app/css/toast.css">
</head>

<body>
    <!--  Toast  -->
    <div id="show-msg"></div>
    <!-- left content -->
    <div class="left">
        <div class="left-container">

            <div class="left-logo">
                <img src="../../images/header/logo.png" alt="logo">
            </div>
            <p>Kết nối đến những người bạn và vòng quanh thế giới với Sharemoment</p>
        </div>
    </div>
    <div class="right">
        <div class="right-contaner">
            <form class="form2">
                <div class="error">
                    <span class="er"></span>
                </div>
                <div class="field">
                    <input type="text" placeholder="Tên đăng nhập" autocapitalize="off" name="user_name">
                </div>
                <div class="field">
                    <input type="password" placeholder="Mật khẩu" name="pass">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="btn btn-send">Bắt đầu</div>
            </form>
            <div class="forgot-link">
                <a href="?action=inputEmail">Quên mật khẩu?</a>
            </div>
            <div class="btn btn-signup">
                <a href="../sign-up">Tạo tài khoản mới</a>
            </div>

        </div>
    </div>

    <script src="../../app/js/pass-show-hide.js"></script>


    <script src="../../app/ajax/login.js"></script>
    
    <?php
    
        if(isset($_GET['status'])){
            $msg = $_GET['msg'];
            if($_GET['status'] == 'success'){
                echo "<script>
             
                  
                    document.querySelector('#show-msg').innerHTML += `
                                                                    <div class='alert alert--success show'>
                                                                    <i class='fas fa-check'></i>
                                                                    <span class='msg'>{$msg}</span>
                                                                    <span class='close-btn'>
                                                                    <span class='fas fa-times'></span>
                                                                    </span>
                                                                    </div>
                                                                    `;
                (function() {
                    setTimeout(function() {
                        document.querySelector('.alert').classList.remove('show');
                        document.querySelector('.alert').classList.add('hide');
        
                        setTimeout(function() {
                            document.querySelector('#show-msg').innerHTML = '';
                        }, 1500);
                    }, 5000)
                    document.querySelector('.close-btn').addEventListener('click', function() {
                        document.querySelector('.alert').classList.remove('show');
                        document.querySelector('.alert').classList.add('hide');
                        setTimeout(function() {
                            document.querySelector('#show-msg').innerHTML = '';
                        }, 1500)
                    })
                })();
            </script>";
            }
        }
    
    
    
    ?>
    
</body>

</html>