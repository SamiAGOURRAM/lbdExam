<?php
session_start();
if(!isset($_SESSION['loggedin']) || trim($_SESSION['loggedin']) === ''){
    header('location:/index.html?error=not logged in');
    exit;
}
if(!isset($_GET['candidate_id']) || !isset($_SESSION['user']) || !isset($_SESSION['eid_vote'])){
    header('location:dashboard.php?error=oops something went wrong!');
    exit;
}
require('../dbconnect/dbconnect.php');
// Get the selected candidate from the form submission
$candidateId = $_GET['candidate_id'];
$user_id = $_SESSION['user'];
$election_id = $_SESSION["eid_vote"];





// Get the user ID of the logged-in student (you can customize this part based on your authentication mechanism)

$query = "INSERT INTO votes (election_id, user_id, vote, vote_timestamp) VALUES (?, ?, ?, NOW())";
$sql = $db->prepare($query);
$sql->bind_param('iii', $election_id, $user_id, $candidateId);
if($sql->execute()){
    header('location:dashboard.php?success=Your vote is registred thank you !');
    exit;
}else{
    header('location:dashboard.php?error=oops something went wrong!');
}
?>