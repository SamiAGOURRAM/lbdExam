<?php
session_start();

//empty all of the session variables
$_SESSION = [];

session_destroy();

header("location:/index.php");
exit;
?>
