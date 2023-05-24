<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false){
    header("location:/index.html?error=you are not loggedin");
    exit;
}
if(!isset($_SESSION['user']) || trim($_SESSION['user']) === ''){
    header("location:dashboard.php?error=you can not candidate to an election");
    exit;
}

if(!isset($_POST['eid']) || trim($_POST['eid']) === ''){
    var_dump($_POST);
}else{


require_once('../dbconnect/dbconnect.php');

$sqlCandidates = 'INSERT INTO candidates(election_id, candidate_name, photo) VALUES (?, ?, NULL)';
$sqlPrograms = 'INSERT INTO programs (candidate_id, program_title, program_description, program_video, program_affiche) VALUES (?, ?, ?, ?, ?)';

// Prepare the statements
$stmtCandidates = $db->prepare($sqlCandidates);
$stmtPrograms = $db->prepare($sqlPrograms);

// Check if the statements were prepared successfully
if ($stmtCandidates === false || $stmtPrograms === false) {
    die('Error: Unable to prepare the statements.');
}

// Bind the parameters for candidates
$electionId = $_POST['eid']; 
$candidateName = $_POST['candidate_name']; 

$stmtCandidates->bind_param('is', $electionId, $candidateName);

// Execute the candidates statement
$stmtCandidates->execute();

// Check if the execution was successful
if ($stmtCandidates->affected_rows > 0) {
    // Retrieve the generated candidate_id
    $candidateId = $stmtCandidates->insert_id;

    // Bind the parameters for programs
    $programTitle = $_POST['title']; 
    $programDescription = $_POST['descr']; 
    $programAffiche = $_POST['affiche'];
    $video_link = "https://www.youtube.com/watch?v=dQw4w9WgXcQ"; 

    $stmtPrograms->bind_param('issss', $candidateId, $programTitle, $programDescription,$video_link,  $programAffiche);

    // Execute the programs statement
    $stmtPrograms->execute();

    // Check if the execution was successful
    if ($stmtPrograms->affected_rows > 0) {
        echo 'Records inserted successfully.';
    } else {
        echo 'Error: Unable to insert records into the programs table.';
    }
} else {
    echo 'Error: Unable to insert records into the candidates table.';
}

// Close the statements and database connection
$stmtCandidates->close();
$stmtPrograms->close();
$db->close();

header('location:dashboard.php');}

?>