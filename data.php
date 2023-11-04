<?php
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

?>
<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Poppins:wght@700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Feedback Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">



  <style>
    *{
        font-family: 'Poppins', sans-serif;
  
    }
    .title h1{
        color: Purple;
        font-size: 50px;
        font-weight:bold;
        text-decoration: underline;
        text-underline-offset: 8px;
        text-align: center;
        margin: 80px 80px;
    }
    .contain{
        margin: -254px 50px;
        display: inline;
    }
    .welcome{
      margin: 129px 168px;
    }
  </style>

    <script>
        let a;
        let date;
        let time;
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
        setInterval(() => {
        a= new Date();
        date= a.toLocaleDateString(undefined, options);
     time=a.getHours() + ':'+ a.getMinutes() + ':' + a.getSeconds();
        document.getElementById('time').innerHTML=time+ " on " + date;
    }, 1000);
    </script>
   

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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <div class="welcome">
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading"> <h4 class="alert-heading"> Welcome - Mr.<?php echo $_SESSION['username']?></h4></h4>
  <p>Police Authority</p>
  <hr>
  <p>Current Timestamp:</p>
  <p class="mb-0" id="time"></p>
</div>
  </div>
  

  <div class="title"><h1>Feedback Form Data</h1></div>
  <div class="contain">
      <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S no.</th>
          <th scope="col">Name of Person</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Name of Police Station</th>
          <th scope="col">Experience at Police Station</th>
          <th scope="col">Time Taken to Hear an Individual</th>
          <th scope="col">Behaviour Of Police Officer</th>
          <th scope="col">Date & Time</th>
  
  
        </tr>
      </thead>
      <tbody>
      <?php
      $sql="SELECT * FROM `feed`";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      $sno=0;
    while($row = mysqli_fetch_assoc($result)){
        $sno=$sno+1;
          echo "
          <tr>
          <th scope='row'>". $sno." </th>
          <td>". $row['name']." </td>
          <td>". $row['phone']."</td>
          <td>". $row['police']." </td>
          <td>". $row['experience']."</td>
          <td>". $row['time']."</td>
          <td>". $row['behaviour']."</td>
          <td>". $row['dt']."</td>
        </tr>";   
       
      
       
          echo "<br>";
      }
      ?>
       
      </tbody>
    </table>
  </div>
  <hr>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  
    <script>	
  let table = new DataTable('#myTable');</script>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin: 20px">

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>