<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Authenticate user (code for authentication function mentioned earlier) !!!!!!!!
  authenticateUser($username, $password);
} else {
  // Redirect to the homepage if accessed directly without submitting the form
  header("Location: index.html");
  exit();
}
?>
