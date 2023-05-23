<?php
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
    header("Location: register.html?error=invalid_domain");
    exit();
  }

  // Generate a unique activation code
  $activationCode = generateActivationCode();

  // Validate user input (e.g., check if username or email already exists, enforce password requirements, etc.)

  // If input is valid, create new user with activation code
  // Insert user data into the Users table with is_verified set to 0 and activation_code set to $activationCode

  // Send the activation email to the user
  sendActivationEmail($email, $activationCode);

  // Redirect to a success page or display a success message
  header("Location: activation_pending.html");
  exit();
} else {
  // Redirect to the homepage if accessed directly without submitting the form
  header("Location: index.html");
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
