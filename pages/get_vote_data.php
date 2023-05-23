<?php
// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database_name");

// Check if the connection was successful
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Fetch the encrypted vote data from the database
$query = "SELECT encrypted_vote
          FROM Votes";
$result = mysqli_query($conn, $query);

if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// Initialize an empty array to store the decrypted votes
$decryptedVotes = array();

// Decrypt the votes
while ($row = mysqli_fetch_assoc($result)) {
  $decryptedVote = decryptVote($row['encrypted_vote']);
  $decryptedVotes[] = $decryptedVote;
}

// Count the votes for each candidate
$voteCounts = array_count_values($decryptedVotes);

// Retrieve the candidate names from the Candidates table
$candidateNames = array();
foreach ($voteCounts as $candidateId => $count) {
  $candidateNames[$candidateId] = getCandidateName($candidateId);
}

// Prepare the vote data for chart rendering
$voteData = array();
foreach ($voteCounts as $candidateId => $count) {
  $voteData[] = array(
    'candidate_name' => $candidateNames[$candidateId],
    'vote_count' => $count
  );
}

// Close the database connection
mysqli_close($conn);

// Send the vote data as JSON response
header('Content-Type: application/json');
echo json_encode($voteData);


// Decrypt the vote
// Decrypt the vote string
function decryptVote($encryptedVote) {
    // Extract the candidate ID and user ID from the encrypted vote
    $voteParts = explode('-', $encryptedVote);
    $candidateId = $voteParts[0];
    $userId = $voteParts[1];
  
    // Reconstruct the original vote string
    $voteString = $candidateId . '-' . $userId;
  
    // Verify the hashed vote against the reconstructed vote string
    if (password_verify($voteString, $encryptedVote)) {
      return $candidateId;
    } else {
      // Invalid or tampered vote
      return null;
    }
  }
  

// Get the candidate name from the Candidates table
function getCandidateName($candidateId) {
  // Connect to the database
  $conn = mysqli_connect("localhost", "username", "password", "database_name");

  // Check if the connection was successful
  if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
  }

  // Fetch the candidate name from the Candidates table
  $query = "SELECT candidate_name
            FROM Candidates
            WHERE candidate_id = $candidateId";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }

  // Get the candidate name
  $row = mysqli_fetch_assoc($result);
  $candidateName = $row['candidate_name'];

  // Close the database connection
  mysqli_close($conn);

  return $candidateName;
}
?>
