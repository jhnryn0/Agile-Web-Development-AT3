<?php
// Include the database configuration file
include('../database/db_config.php');

// Query to fetch all questions
$query = "SELECT id, title FROM questions";
$result = $conn->query($query);

// Check for errors in query execution
if (!$result) {
    echo json_encode(["error" => "Database query failed"]);
    exit;
}

// Prepare the results as an array
$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}

// Return the questions as a JSON response
echo json_encode($questions);
?>
