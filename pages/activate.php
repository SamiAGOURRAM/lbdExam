<?php
session_start();

if (isset($_GET['code']) && isset($_GET['email'])) {
  $activationCode = $_GET['code'];
  $email = $_GET['email'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "username", "password", "database_name");

  // Check if the activation code and email combination exists in the database
  $query = "SELECT * FROM Users WHERE activation_code = '$activationCode' AND email = '$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    // Activate the user's account by updating the is_verified column to 1
    $query = "UPDATE Users SET is_verified = 1 WHERE activation_code = '$activationCode' AND email = '$email'";
    mysqli_query($conn, $query);

    // Redirect to the activation success page
    header("Location: activation_success.html");
    exit();
  } elseif (mysqli_num_rows($result) > 1) {
    // More than one user found with the same activation code and email combination, handle the situation accordingly
    // You can display an error message or handle the situation based on your requirements
    header("Location: activation_error.html");
    exit();
  } else {
    // No user found with the provided activation code and email combination, redirect to the activation error page
    header("Location: activation_error.html");
    exit();
  }

  mysqli_close($conn);
} else {
  // Redirect to the homepage if the activation code and email are not provided
  header("Location: /index.html");
  exit();
}
?>
