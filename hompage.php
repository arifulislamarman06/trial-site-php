<?php
  session_start();
  include 'dbconfig.php';
  if (!isset($_SESSION['name'])) {

    header('Location:login.php');
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">

    <title>Outdoor Advanture</title>
    <link rel="icon" href="images/favicon.png">
  </head>
  <body>
   <header>


    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
  <a class="navbar-brand" href="#">
    <h1>OUTDOOR <span>ADVANTURE</span></h1>
  </a>
  <button  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img src="images/bar.jpg" alt="bar"></span>
  </button>
    
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Take Action</a>
      </li>
     </ul>
      <div class="user">
        <h3 class="m-0 text-white">
          <a href="logout.php">LOGOUT</a>
        </h3>
      </div>
    </nav>

  </div>


  

        <div class="container">
          <div class="banner-content text-center">
            <h4>Explore the colorful world</h4>
            <span></span>
            <h1>Hi <?php echo $_SESSION['name']; ?></h1>
              <a href="#">LEARN MORE</a>
          </div>
        </div>
   </header>


   <section class="quote-section">
     <div class="container">
         <div class="col-lg-9 m-auto text-center">
           <div class="quote">
             <h2><img src="images/quote.png" alt="quote" class="img-fluid">The world is a book and those who do not travel read only one page.</h2>
             <p>Saint Augustine</p>
           </div>
         </div>
     </div>
   </section>




   <section class="event-section">
     <div class="container">
       <div class="heading">
         <h1>Upcoming Event</h1>
         <span></span>
       </div>
       <div class="row gx-5">
         <div class="col-lg-6 px-5">
           <div class="event">
             <img src="images/banner.jpg" alt="evnt" class="img-fluid">
             <h2>Everest camp trek</h2>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
             <a href="#">Learn More</a>
           </div>
         </div>
         <div class="col-lg-6 px-5">
           <div class="event">
             <img src="images/banner.jpg" alt="evnt" class="img-fluid">
             <h2>Everest camp trek</h2>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
             <a href="#">Learn More</a>
           </div>
         </div>
       </div>
     </div>
   </section>


   <section class="banner-section">
     <div class="container">
       <div class="banner-text">
         <h1>EXPLORE THE WORLD</h1>
         <span></span>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
         <a href="#">Learn more<i class="fas fa-long-arrow-alt-right"></i></a>
       </div>
     </div>
   </section>


   <section class="feature-section">
     <div class="container">
       <div class="row">
         <div class="col-lg-4">
          <div class="text">
           <h3>UPCOMING TOURS & DESTINATIONS</h3>
           <span></span>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
           <a href="#">Learn more</a>
         </div>
         </div>
         <div class="col-lg-4">
           <div class="images">
             <img src="images/snow1.jpg" class="img-fluid">
             <img src="images/snow2.jpg" class="img-fluid gx-5">
           </div>
         </div>
         <div class="col-lg-4">
           <div class="images">
             <img src="images/snow2.jpg" class="img-fluid none">
             <img src="images/snow1.jpg" class="img-fluid">
           </div>
         </div>
       </div>
     </div>
   </section>


   <footer>
     <div class="container">
       <div class="col-lg">
         <h6>123 5th Avenue, NY, 10160, NEW YORK. USA &#10072; Phone Number: 09393-34343 &#10072; Email:abc@gmail.com</h6>
       </div>
       <div class="col-lg">
         <h6>Copyright &copy; 2021 Outdoor Advanture </h6>
         
       </div>
     </div>
   </footer>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


   
  </body>
</html>