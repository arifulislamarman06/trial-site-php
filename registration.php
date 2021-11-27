<?php session_start(); ?>
<?php include 'dbconfig.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="icon" href="https://iconarchive.com/download/i80766/custom-icon-design/flatastic-3/signup.ico">

    <title>SignUp Form</title>
  </head>
  <body>

    <section class="registration">
      <div class="container">
        <div class="col-lg-5 m-auto">
          <div class="design">
        <div class="col-lg m-auto">
          <div class="top-contents">
            <h2>Create Account</h2>
            <p>Get Started with Your Free Account</p>
            <a href="#" class="btn gmail">Login via Gmail</a>
            <a href="#" class="btn facebook">Login via Facebook</a>

            <b>OR</b>
            <p class="text-white bg-succeess"> <?php 
            if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
            }else{
              echo $_SESSION['msg'] = "Verification Unsuccessful. Please register again with valid data";
            }
            ?>
           </p>

          </div>
        </div>
        <div class="col-lg m-auto">
          <div class="form-input">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input name="name" value="" type="text" class="form-control" placeholder="Full Name" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                <input name="email" value="" type="email" class="form-control" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                <input name="number" value="" type="number" class="form-control" placeholder="Phone Number" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input name="password" value="" type="password" class="form-control" placeholder="Create Password" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input name="repeatpassword" value="" type="password" class="form-control" placeholder="Repeat Password" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div class="input-group mb-3">
                <input name="submit" value="SignUp" type="submit" class="form-control btn btn-custom">
              </div>

            </form>
          </div>
        </div>
        <div class="login2">
          <p>Have an Account? <a href="login.php">Log In</a></p>
        </div>
          </div>
        </div>
      </div>
    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

    <?php
      if (isset($_POST['submit'])) {
        $name           = mysqli_real_escape_string($connect,$_POST['name']);
        $email          = mysqli_real_escape_string($connect,$_POST['email']);
        $number         = mysqli_real_escape_string($connect,$_POST['number']);
        $password       = mysqli_real_escape_string($connect,$_POST['password']);
        $repeatpassword = mysqli_real_escape_string($connect,$_POST['repeatpassword']);

        $pass       = password_hash($password, PASSWORD_BCRYPT);
        $repeatpass = password_hash($repeatpassword, PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15));

        $emailQuery = "SELECT * FROM `signup` WHERE email='$email' ";
        $query      = mysqli_query($connect, $emailQuery);
        $emailCount = mysqli_num_rows($query);

        if ($emailCount>0) {
          ?>
          <script>
            alert('Email Already Exists');
          </script>
          <?php
        }else{
          if ($password === $repeatpassword) {
            $insert = "INSERT INTO `signup`(`name`, `email`, `number`, `password`, `repeatpassword`, `token`, `status`) VALUES ('$name', '$email', '$number', '$pass', '$repeatpass', '$token', 'inactive')";
            $inserted = mysqli_query($connect, $insert);
            if ($inserted) {

              $subject = "Email Verification";
              $body = "$name click here to activate your account 
              http://localhost/signup/activate.php?token=$token ";
              $headers = "From: publicmail420420@gmail.com";

              if (mail($email, $subject, $body, $headers)) {
                  header('location:login.php');
                  $_SESSION['msg'] = "Check your email for verify your account $email";
                  
              } else {
                  echo "Email sending failed...";
              }
            }else{
              ?>
              <script>
                alert('Registration Unsuccessfull');
              </script>
              <?php
            }
          }else{
            ?>
              <script>
                alert("password are not matching");
              </script>
            <?php
          }
        }

        
      }
    ?>