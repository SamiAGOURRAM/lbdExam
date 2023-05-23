<?php
session_start();
require_once('../dbconnect/dbconnect.php');

  $email = $_POST['email'];
  $password = $_POST['password'];
$query = 'SELECT * FROM users WHERE email = ?';
$stmt = $db->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result =$stmt->get_result();

if($result->num_rows == 0){
  header('location:/index.html?error=email does not exist');
  exit;
}
$row = $result->fetch_assoc();
if(!password_verify($password, $row['password_user'])){
  header("location:/index.html?error=Incorrect password");
  exit;
}
if($row['is_verified']==0){
  header("location:/index.html?error=please verify your email address");
  exit;
}
$_SESSION['loggedin'] = true;
$_SESSION['user'] = $row['user_id'];
$_SESSION['is_admin'] = $row['is_admin'];
header('location:dashboard.php');
  // Authenticate user (code for authentication function mentioned earlier) !!!!!!!!

  // Redirect to the homepage if accessed directly without submitting the form

?>
