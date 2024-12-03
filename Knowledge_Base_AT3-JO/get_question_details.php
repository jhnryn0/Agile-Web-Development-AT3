<?php
// Include the database configuration file
include('../database/db_config.php');

// Check if ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare and execute the query
    $query = "SELECT title, description, answer FROM questions WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the question exists
    if ($result->num_rows > 0) {
        $question = $result->fetch_assoc();
        echo json_encode($question);
    } else {
        echo json_encode(["error" => "Question not found"]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid or missing question ID"]);
}
?>
