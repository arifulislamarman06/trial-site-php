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

    <title>Log In</title>
  </head>
  <body>



    <section class="login">
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

            <p class="text-white bg-dark"> <?php 
            if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
            }else{
              echo $_SESSION['msg'] = "You are logged out Please log in again";
            }
            ?>
           </p>
          </div>
        </div>
        <div class="col-lg-5 m-auto">
          <div class="design1">
        <div class="col-lg m-auto">
          <div class="form-input">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                <input name="email" value=" <?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; } ?> " type="email" class="form-control" placeholder="Email ID" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

    <?php
        if (isset($_POST['login'])) {
          $email = $_POST['email'];
          $password = $_POST['password'];

          $emailsearch = "SELECT * FROM `signup` WHERE email='$email' and status='active' ";
          $query = mysqli_query($connect, $emailsearch);
          $email_count = mysqli_num_rows($query);

          if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $_SESSION['name'] = $email_pass['name'];

            $pass_decode = password_verify($password, $db_pass);

            if ($pass_decode) {
              if (isset($_POST['rememberme'])) {
                setcookie('email', $email, time()+86400);
                setcookie('password', $password, time()+86400);

                header('Location:hompage.php');
              }else{
                header('Location:hompage.php');
              }
             
            }else{
              echo "password incorrect";
            }
          }else{
            echo "invalid email";
          }
        }
    ?>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input name="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>" type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div>
                <input type="checkbox" name="rememberme"> Remember Me
              </div>

              <div class="input-group mb-3">
                <input name="login" value="Log In" type="submit" class="form-control btn btn-custom">
              </div>

            </form>
          </div>
        </div>
        <div class="login2">
          <p style="margin: 0 auto;">Haven't create an account? <a href="registration.php">Register</a></p>
          <p>Recover your password <a href="recover_email.php">Here</a></p>
        </div>
          </div>
        </div>
      </div>

    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

