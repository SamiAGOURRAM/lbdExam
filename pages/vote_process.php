<?php
// Get the selected candidate from the form submission
$candidateId = $_POST['candidate'];

// Get the user ID of the logged-in student (you can customize this part based on your authentication mechanism)
$userId = 1; // Replace with the actual user ID

// Concatenate the candidate ID and user ID to create the vote string
$voteString = $candidateId . '-' . $userId;

// Generate a hashed vote using the vote string
$hashedVote = password_hash($voteString, PASSWORD_DEFAULT);

$query = "INSERT INTO Votes (election_id, user_id, encrypted_vote, timestamp) VALUES (1, $userId, '$hashedVote', NOW())";


?>