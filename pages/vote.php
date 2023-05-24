
<?php
session_start();
if(!isset($_SESSION['loggedin']) || trim($_SESSION['loggedin']) === ''){
    header('location:/index.html?not logged in');
}
require('../dbconnect/dbconnect.php');
$eid = $_GET['eid'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Voting - dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->


  <!-- Template Main CSS File -->
  <link href="/assets/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

    <a href="dashboard.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo 
        <img src="/assets/img/logo.png" alt="logo">-->
        <h1>Voting System<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a onclick="history.back()">Home</a></li>
          <li><a href="create_election.php">Create an Election</a></li>
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
          <h2 class="text-center">Election dashboard</h2>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
    <div class="wrapper">
        <div class="container-fluid">
        <form method="post" action="vote_process.php">
      <div class="mb-4">
      <p class="text-red-500">
      <?php
        if (isset($_GET['error']) ) {
          echo $_GET['error'];
        }
        ?>
        </p>
        <p class="text-green-500">
      <?php
        if (isset($_GET['success']) ) {
          echo $_GET['success'];
        }
        ?>
        </p>


        <label for="candidate" class="text-lg">Select Candidate:</label>
        <div id='candidates' class="Dashboard_container w-50 d-flex flex-row align-items-center flex-wrap">
            </div> 
          <?php
          // Connect to the database

          // Fetch the candidate data from the database
          $query = "SELECT * FROM candidates NATURAL JOIN programs NATURAL JOIN elections  WHERE election_id = ?";
          $stmt = $db->prepare($query);
          $stmt->bind_param('i',$eid );
          
          $stmt->execute();
          $result = $stmt->get_result();
          $data = $result->fetch_all();

          if (!$result) {

            die("Query failed: " . mysqli_error($db));

          }
          if($result->num_rows >0){
            $_SESSION['eid_vote'] = $eid;
          }
          
          // Close the database connection
          mysqli_close($db);
          ?>
      </div>
    </form>     
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


  <!-- Template Main JS File -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    var data = <?php echo json_encode($data)?>;
    data = data
    console.log(data);

    data.forEach(element => {

        var card = $('<div>', {class: "card"});
        var cardBody = $('<div>', {class: "card-img-top"});
        var text = $('<h5>', {class: "card-title"}).text(element[2]);
        var anchorPoint =  $('<a>', {href :'vote_process?candidate_id='+element[1],class: "bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-3"}).text('Vote for : '+ element[2]);
        var video_program = $('<a>', {href :element[7],class: "mr-3"}).text('Program video');

        cardBody.append(text);
        cardBody.append(anchorPoint);
        cardBody.append(video_program);
        card.append(cardBody);
        $('#candidates').append(card);
        
        
    });
  </script>

</body>
</html>



