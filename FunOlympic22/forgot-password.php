<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Log in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
  </head>
  <body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Recover Account</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            
        </div>
    </nav>
    <!-- navbar end -->
    <!-- login form start-->
    <div class="container" style="padding:40px">
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          <h2 class="display-4">If you forgot your password. Enter your valid mail id to reset your password.</h2>
          <form action="" method="post">
            <div class="form-group">
              <label for="email">Your Email:</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="sample@mail.com" aria-describedby="helpId" required autofocus>
            </div>

            <button type="submit" class="btn btn-dark btn" name="submit">Send Code</button>
            <button type="reset" class="btn btn-danger btn">Cancel</button>
            <a href="usersignup.php" class="btn btn-primary btn btn-block" style="margin:10px 0px">Create New Account</a>
            

          </form>
          
          <?php
          if(isset($_POST['submit']))  
          { 
            include 'connection.php';       
            $to=$_POST['email'];
            $subject='New Messsage';
            $x=rand(1,9);
            $y=rand(2,8);
            $z=rand(3,7);
            $OTP=$x.$y.$z;
            $headers="From:info@hoteltreeland.com.np"."Do not reply";
            $query="insert into otp (otp)values('$OTP')";
            mysqli_query($conn,$query);
            if(mail($to, $subject, $OTP, $headers))
                echo "<script>window.alert('Sent mail Successfully!');</script>";
                header("location:verify-otp.php");
        }
      
          ?>
        </div>
        </div>
        <div class="col-md-1">
        </div>
      </div>
    </div>
    <!-- login form end -->
  </body>

</html>

