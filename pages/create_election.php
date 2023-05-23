<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false){
    header("location:/index.html?error=you are not loggedin");
    exit;
}
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == 0){
    header("location:dashboard.php?error=you can not create an election");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create election</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->


  <!-- Template Main CSS File -->
  <link href="/assets/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    input[type='submit']{
    background-color: #ce1212 !important;
}
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Freshly<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/index.php">Home</a></li>
          <li><a href="dashboard.php">Elections</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>New election</h2>
          <ol>
            <li><a href="dashboard.php">Home</a></li>
            <li>Create election</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
      <div class="d-flex justify-content-center flex-nowrap">
      <form action="process-create-election.php" method="POST" class="w-50 margin-auto" id="form" >
        <div class="form-group">
            <label for="title">Title: </label>
            <input class="form-control"type="text" name="title"  >
        </div>

        <div class="form-group">
            <label for="descr">description: </label>
            <input class="form-control"type="text" name="descr"  >
        </div>

        <div class="form-group">
            <label for="date">Start Date: </label>
            <input type="date" name='start_date' id="startDate">
        </div>

        <div class="form-group">
            <label for="date">End Date: </label>
            <input type="date" name='end_date' id="endDate">
        </div>

        <input class="form-control mt-3 bg-primary text-light" type="submit" value="Create Ingredient">
    </form>

      </div>
      <div class="alert alert-danger" role="alert" id="err"></div>
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



  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    function compareDates() {
        //Get the text in the elements
        var from = document.getElementById('endDate').textContent;
        var to = document.getElementById('startDate').textContent;

        //Generate an array where the first element is the year, second is month and third is day
        var splitFrom = from.split('/');
        var splitTo = to.split('/');

        //Create a date object from the arrays
        var fromDate = Date.parse(splitFrom[0], splitFrom[1] - 1, splitFrom[2]);
        var toDate = Date.parse(splitTo[0], splitTo[1] - 1, splitTo[2]);

        //Return the result of the comparison
        return fromDate < toDate;
    }
    
    endDate.min = new Date().toISOString().split("T")[0];
    var end_date =document.getElementById('endDate').value;
    var start_date =document.getElementById('startDate').value;
    document.getElementById('form').addEventListener('submit', (e)=>{
        console.log(compareDates())
        if(compareDates()){
            e.preventDefault();
            $("#err").html("invalid dates");
        }
        
    })
  </script>

</body>
</html>