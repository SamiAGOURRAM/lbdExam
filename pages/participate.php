<?php
session_start();
if(!isset($_SESSION['loggedin']) || trim($_SESSION['loggedin']) === ''){
    header('location:/index.html?not logged in');
}
if(!isset($_GET['eid']) || trim($_GET['eid']) == ""){
    header('location:dashboard.php?error=chose an election to participate in');
}
$eid = $_GET['eid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Freshly - Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="/assets/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .Dashboard_container{
      max-width: 1270px;
      margin: auto;
    }
    .card{
      padding: 10px;
      margin: 20px;
    }
  </style>
</head>


<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

    <a href="/index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>Election plateform<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="dashboard.php">Elections</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="logout.php"><i class="fa fa-user" aria-hidden="true"></i> Log out</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-center">
          <h2 class="text-center">participate</h2>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="Dashboard_container w-50 d-flex flex-row align-items-center flex-wrap">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/candidate.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Candidate</h5>
                    <a href="candidate.php?eid=<?php echo $eid?>" class="mr-3" title="View Employee Details" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                  </div>
              </div>

              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../assets/vote.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Vote</h5>
                    <a href="vote.php?eid=<?php echo $eid?>" class="mr-3" title="View Employee Details" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                  </div>
              </div>
            </div>        
        </div>
    </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022 - US<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 11AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


  <!-- Template Main JS File -->

</body>
</html>