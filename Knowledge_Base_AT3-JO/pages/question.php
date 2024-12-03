<?php
// Include database configuration
include('../includes/db_config.php');

// Fetch question ID from the URL (sanitize input to prevent issues)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ensure ID is valid before proceeding
if ($id > 0) {
    // Query to fetch the specific question based on ID
    $query = "SELECT * FROM questions WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the question data
        $data = $result->fetch_assoc();
    } else {
        die("Question not found.");
    }
} else {
    die("Invalid question ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo htmlspecialchars($data['title']); ?></title>
</head>
<body>
    <!-- Include Header -->
    <?php include('../includes/header.php'); ?>

    <!-- Question Details Section -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Question Details</h2>
        <div class="accordion" id="accordionQuestions">
            <!-- Question Item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $data['id']; ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $data['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $data['id']; ?>">
                        <?php echo htmlspecialchars($data['title']); ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $data['id']; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $data['id']; ?>" data-bs-parent="#accordionQuestions">
                    <div class="accordion-body">
                        <!-- Question description and answer -->
                        <h4>Description:</h4>
                        <p><?php echo nl2br(htmlspecialchars($data['description'])); ?></p>
                        <h4>Answer:</h4>
                        <p><?php echo nl2br(htmlspecialchars($data['answer'])); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include('../includes/footer.php'); ?>
</body>
</html>
