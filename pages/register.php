<?php
require_once('../dbconnect/dbconnect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if the email domain is "um6p.ma"
  $allowedDomain = "um6p.ma";
  $emailParts = explode("@", $email);
  $domain = end($emailParts);

  if ($domain !== $allowedDomain) {
    // Redirect back to the registration page with an error message
    header("Location: register_view.php?error=invalid_domain");
    exit();
  }

  // Generate a unique activation code
  $activationCode = generateActivationCode();


  $query = 'SELECT * FROM users WHERE email = ?;';
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows >0){
    header("Location: register_view.php?error=email_already exists");
    exit;
  }
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  $query = 'INSERT INTO  users (username, email, password_user, is_admin, is_verified, activation_code) VALUES (?, ?, ?, 0, 1, ?);';

  $stmt = $db->prepare($query);
  $stmt->bind_param('ssss',$username, $email, $hashed_password, $activationCode );
  $stmt->execute();




  // Validate user input (e.g., check if username or email already exists, enforce password requirements, etc.)

  // If input is valid, create new user with activation code
  // Insert user data into the Users table with is_verified set to 0 and activation_code set to $activationCode

  // Send the activation email to the user
  //sendActivationEmail($email, $activationCode);

  // Redirect to a success page or display a success message
  header("Location: /index.html");

} else {
  // Redirect to the homepage if accessed directly without submitting the form
  header("Location: /index.html");
  exit();
}


function generateActivationCode() {
  // Generate a unique activation code (you can customize this code generation according to your preference)
  return md5(uniqid());
}

function sendActivationEmail($email, $activationCode) {
  // Send the activation email to the user
  $subject = "Activation de votre compte";
  $message = "Bonjour,\n\n";
  $message .= "Cliquez sur le lien suivant pour activer votre compte : \n";
  $message .= "http://example.com/activate.php?email=".$email."&code=" . $activationCode . "\n\n";
  $message .= "Cordialement,\n";
  $message .= "Votre équipe de gestion de vote";

  // You can use PHP's mail() function or a library like PHPMailer to send the email
  // Example using mail() function:
  mail($email, $subject, $message);
}


?>
