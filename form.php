<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $police = $_POST['police'];
    $experience= $_POST['experience'];
    $time= $_POST['time'];
    $behaviour= $_POST['behaviour'];

    
  // Connecting to the Database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "feedback";

  // Create a connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Die if connection was not successful
  if (!$conn){
      die("Sorry we failed to connect: ". mysqli_connect_error());
  }
  else{ 
    // Submit these to a database
    // Sql query to be executed 
    $sql = "INSERT INTO `feed` (`name`, `phone`,`police`,`experience`,`time`,`behaviour`,`dt`) VALUES ('$name', '$phone','$police','$experience','$time','$behaviour',current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if($result){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your entry has been submitted successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>';
    }
    else{
        // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
      
     </div>';
    }

  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/vendor/style.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="assets/css/style.css" rel="stylesheet">

    <title>Feedback Form for Police</title>
</head>
<body>
<!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/hero-img.png" alt="">
        <span>PoliceConnect</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="index.html">About</a></li>
          <li><a class="nav-link scrollto" href="index.html">Contact</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="heading"><h1>Feedback Form For Citizen</h1></div>


    <form action="/SSIP/form.php" method="post">
    <div class=" mx-3">
          <label for="Name" class="form-label">Enter your Name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="name" required>
          <div id="name" class="form-text"></div>
        </div>
        <div class=" mx-3">
            <label for="phone number" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="phone" name="phone" aria-describedby="phone" required>
            <div id="emailHelp" class="form-text">    </div>
          </div>
          <div class=" mx-3">
            <label for="Name" class="form-label">Name of Police Station</label>
            <input type="text" class="form-control" id="police"  name="police" aria-describedby="name">
            <div id="name" class="form-text"></div>
          </div>
          <div class=" mx-3">
            <label for="phone number" class="form-label">How Would you rate the behaviour of police officers?</label><br>
            <input type="radio" id="vehicle1" name="behaviour" value="Excellent" required>
            <label for="vehicle1">Excellent</label><br>
            <input type="radio" id="vehicle2" name="behaviour" value="Good" required>
            <label for="vehicle1">Good</label><br>
            <input type="radio" id="vehicle3" name="behaviour" value="Bad" required>
            <label for="vehicle1">Bad</label><br>
            <input type="radio" id="vehicle4" name="behaviour" value="Poor" required>
            <label for="vehicle1">Poor</label><br>
          </div>
          <div class=" mx-3">
            <label for="phone number" class="form-label">How much time did you wait for your complain to be written?</label><br>
            <input type="text" class="form-control" id="time" name="time" aria-describedby="name">
          </div>
          <div class=" mx-3 my-3">
            <label for="phone number" name="experience" id="experience" class="form-label">How Would you describe your experience with police officers at the police station?</label><br>
            <input type="radio" id="vehicle1" name="experience" value="Extremely Dissatisied" required>
            <label for="vehicle1">Extremely Dissatisfied</label><br>
            <input type="radio" id="vehicle2" name="experience" value="Dissatisfied" required>
            <label for="vehicle1">Dissatisfied</label><br>
            <input type="radio" id="vehicle3" name="experience" value="Satisfied" required>
            <label for="vehicle1">Satisfied</label><br>
            <input type="radio" id="vehicle4" name="experience" value="Extremely Satisfied" required>
            <label for="vehicle1">Extremely Satisfied</label><br>
          </div>


        
        <button type="submit" class="btn btn-primary mx-5">Submit</button>
      </form>
       <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

<div class="footer-top">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span>PoliceConnect</span>
        </a>
        <p>Empowering Citizens through QR Feedback System.</p>
        <div class="social-links mt-3">
          <a href="https://twitter.com/GujaratPolice" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="https://www.facebook.com/dgpgujaratofficial/" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/gujaratpolice_/" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://in.linkedin.com/company/gujarat-police-department" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="index.html">Home</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="about.html">About us</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="#contactus">Contact</a></li>
        </ul>
      </div>


      <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <h4>Contact Us</h4>
        <p>
          Gujrat Samachar Rd, Old City, Saiyedwada, Bhadra, Ahmedabad, Gujarat 380001 <br><br>
          <strong>Phone:</strong>  079-23210108<br>
          <strong>Email:</strong>   info@gandhinagarpolice.com<br>
        </p>

      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>PoliceConnect</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by Code Enthusiasts
  </div>
</div>
</footer><!-- End Footer -->  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>