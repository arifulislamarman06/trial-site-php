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

    <title>Forgot Password</title>
  </head>
  <body>

    <section class="registration">
      <div class="container">
        <div class="col-lg-5 m-auto">
          <div class="design">
        <div class="col-lg m-auto">
          <div class="top-contents">
            <h2>Recover Your Password</h2>
          </div>
        </div>
        <div class="col-lg m-auto">
          <div class="form-input">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                <input name="email" value="" type="email" class="form-control" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              

              <div class="input-group mb-3">
                <input name="submit" value="Send Mail" type="submit" class="form-control btn btn-custom">
              </div>

            </form>
          </div>
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
        $email          = mysqli_real_escape_string($connect,$_POST['email']);

        $emailQuery = "SELECT * FROM `signup` WHERE email='$email' ";
        $query      = mysqli_query($connect, $emailQuery);
        $emailCount = mysqli_num_rows($query);

        if ($emailCount) {
          $userdata = mysqli_fetch_array($query);
          $username = $userdata['name'];
          $usertoken = $userdata['token'];
        
              $subject = "Reset Password";
              $body = "$username click here to reset your password
              http://localhost/signup/reset_password.php?token=$usertoken ";
              $headers = "From: publicmail420420@gmail.com";

              }if (mail($email, $subject, $body, $headers)) {
                  header('location:login.php');
                  $_SESSION['msg'] = "Check your email to reset your password $email";
                  
              } else {
                  echo "Email sending failed...";
              }
            }else{}
        

        
      
    ?>