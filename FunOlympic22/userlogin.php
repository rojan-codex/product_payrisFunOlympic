
<?php
session_start();
?>
<!doctype html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login to Fun Olympic Games</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #1a202c;
            color: #fff;
        }

        .form-container {
            background-color: rgb(30, 32, 34);
            border-radius: 10px;
            padding: 50px;
        }

        .form-control {
            background-color: #495057;
            color: #fff;
            border-color: #6c757d;
        }

        .form-control:focus {
            background-color: #495057;
            color: #fff;
            border-color: #6c757d;
            box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
        }

        .input-group-text {
            background-color: #495057;
            color: #fff;
            border-color: #6c757d;
        }

        .input-group-text:hover {
            cursor: pointer;
        }

        .btn {
            background-color: rgb(82, 97, 107);
            color: #212529;
            border-color: rgb(82, 97, 107);
            font-weight: bold;
        }

        .btn:hover {
            background-color: rgb(201, 220, 230);
            color: #212529;

        }

        .btn:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
        }

        .btn-cancel {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-cancel:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <h2 class="display-4">Login to Fun Olympic Games</h2>
                    <h4>Get the Olympic Highlights for free</h4>
                    <img src="assets/img/slide2.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="col-md-6 mt-lg-5 form-container">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="showPasswordToggle">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6Leei2AoAAAAAFcQOfwIcx4kCHg8FbHdMOKexmZB"></div>
                        <br>


                        <button type="submit" class="btn btn-block" name="submit">Login</button>

                        <button type="reset" class="btn btn-cancel btn-block">Cancel</button>
                        <div class="form-group mt-3 text-center">
                            <a href="forgot-password.php" class="text-primary">Forgot Password?</a>
                        </div>
                        <div class="form-group text-center">
                            <a href="usersignup.php" class="text-success">Create new account</a>
                        </div>
                    </form>
                    <?php


                    // connecting database  with file name 'connection.php'
                    include "connection.php";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['g-recaptcha-response'])) {
                        $secretkey = "6Leei2AoAAAAAIhxCM6r-o5TquBrZyHWQyLYAQtg";
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $response = $_POST['g-recaptcha-response'];
                        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
                        $request = file_get_contents($url);
                        $data = json_decode($request);
                        $a = $_POST['username'];
                        $b = md5($_POST['password']);
                        if ($a == '' || $b == '') {
                            echo "<div class='alert alert-warning'> some fields are empty! </div>";
                        } else {
                            $query = "select * from users where username='$a' and password='$b'";
                            $run = mysqli_query($conn, $query);
                            if (mysqli_num_rows($run) > 0) {
                                $_SESSION['username'] = $a;
                                echo "<script>window.open('userindex.php','_self') </script>";
                            } else {
                                echo "<div class='alert alert-danger'> Invalid User! </div>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- Password Toggle Script -->
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordToggle = document.getElementById('showPasswordToggle');

        showPasswordToggle.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                showPasswordToggle.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
</body>

</html>