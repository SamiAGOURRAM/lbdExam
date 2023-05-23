<?php 

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false){
    header("location:/index.html?error=you are not loggedin");
    exit;
}
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != true){
    header("location:/dashboard.php?error=you can not create an election");
    exit;
}

require_once('../dbconnect/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['descr'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
  

  
  
    $query = 'INSERT INTO elections (title, description, startDate, endDate) VALUES(?, ?, ? ,?);';
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssss', $title, $description, $startDate, $endDate);
    $stmt->execute();

  
  
    // Redirect to a success page or display a success message
    header("Location:dashboard.php");
  
  } else {
    // Redirect to the homepage if accessed directly without submitting the form
    header("Location:dashboard.php");
    exit();
  }
?>

