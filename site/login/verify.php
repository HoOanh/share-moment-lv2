<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Favicon -->
     <link href="../../images/header/logo-mobile.png" rel="icon" type="image/png">

    <title>Sharemoment | Kích hoạt tài khoản</title>

    <!-- Font awesome cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom css file -->
    <link rel="stylesheet" href="../../app/css/login.css">
    <link rel="stylesheet" href="../../app/css/toast.css">

</head>

<body>

<!-- Toast -->
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

            <?php
                require "../../dao/pdo.php";
                $token = $_GET['token'];
                $sql = "Select email from users";

                $allMails = pdo_get_all_rows($sql);
                $check = false;
                foreach($allMails as $mail){
                    extract($mail);
                    if(sha1($email) === $token){
                        $sql = "update users set isVerify = 1 where email = ?";
                        pdo_execute($sql,$email);
                        $check = true;
                        break;
                    }
                }

                if($check){

                    $msg = 'Kích hoạt tài khoản thành công!';
                    echo "
                    <script>

                        document.querySelector('#show-msg').innerHTML += `
                        <div class='alert alert--success show'>
                        <i class='fas fa-check'></i>
                        <span class='msg'>${msg}</span>
                        <span class='close-btn'>
                        <span class='fas fa-times'></span>
                        </span>
                        </div>
                        `;

                    </script>
                    ";
                }else{
                    $msg = "Tụi em web sinh viên, anh hacker tha em";
                    echo "
                        <script>

                        document.querySelector('#show-msg').innerHTML += `
                        <div class='alert alert--error show'>
                        <i class='fas fa-exclamation-circle'></i>
                        <span class='msg'>${msg}</span>
                        <span class='close-btn'>
                        <span class='fas fa-times'></span>
                        </span>
                        </div>
                        `;

                        </script>
                    ";
                }

                echo "
                <script> ;
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

            ?>

            <div class="btn btn-signup">
                <a href="index.php">Đăng nhập</a>
            </div>

        </div>
    </div>

    <script src="../../app/js/pass-show-hide.js"></script>
    <script src="../../app/ajax/checkMail.js"></script>
</body>

</html>