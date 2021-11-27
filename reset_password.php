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

    <title>Reset Password</title>
  </head>
  <body>

    <section class="registration">
      <div class="container">
        <div class="col-lg-5 m-auto">
          <p> <?php if (isset($_SESSION['passmsg'])) {
            echo $_SESSION['passmsg'];
          }else{
            echo $_SESSION['passmsg'] = '';
          }  ?> </p>
          <div class="design">
        <div class="col-lg m-auto">
          <div class="form-input">
            <form method="POST" action="">




              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input name="password" value="" type="password" class="form-control" placeholder="New Password" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input name="repeatpassword" value="" type="password" class="form-control" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>

              <div class="input-group mb-3">
                <input name="submit" value="Update Password" type="submit" class="form-control btn btn-custom">
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

        if (isset($_GET['token'])) {
          $token = $_GET['token'];

        $newpassword       = mysqli_real_escape_string($connect,$_POST['password']);
        $repeatpassword = mysqli_real_escape_string($connect,$_POST['repeatpassword']);

        $pass       = password_hash($newpassword, PASSWORD_BCRYPT);
        $repeatpass = password_hash($repeatpassword, PASSWORD_BCRYPT);

        

          if ($newpassword === $repeatpassword) {
            $updatequery =  "UPDATE `signup` SET password='$pass' WHERE token='$token' ";
            $inserted = mysqli_query($connect, $updatequery);
            if ($inserted) {
              $_SESSION['msg'] = "Your Password Has Been Updated";
              header('location: login.php');
            } else {
              $_SESSION['passmsg'] = "Your Password is not updated";
              header('location: reset_password.php');
            }
            }else{
              $_SESSION['passmsg'] = "Your Password is not matching";
            }
          }else{
            $_SESSION['passmsg'] = "NO TOKEN FOUND";
          }
        }
    ?>