<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vote</title>
  <!-- Include the Tailwind CSS CDN link -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mx-auto mt-5">
    <h2 class="mb-4 text-2xl font-bold">Vote</h2>
    <form method="post" action="vote_process.php">
      <div class="mb-4">
        <label for="candidate" class="text-lg">Select Candidate:</label>
        <select class="form-select mt-1 block w-full" id="candidate" name="candidate">
          <?php
          // Connect to the database
          $conn = mysqli_connect("localhost", "username", "password", "database_name");

          // Check if the connection was successful
          if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
          }

          // Fetch the candidate data from the database
          $query = "SELECT candidate_id, candidate_name FROM Candidates";
          $result = mysqli_query($conn, $query);

          if (!$result) {
            die("Query failed: " . mysqli_error($conn));
          }

          // Loop through the candidate data and generate the options dynamically
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['candidate_id'] . '">' . $row['candidate_name'] . '</option>';
          }

          // Close the database connection
          mysqli_close($conn);
          ?>
        </select>
      </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Vote
      </button>
    </form>
  </div>
</body>

</html>
