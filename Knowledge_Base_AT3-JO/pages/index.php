<?php
// Include database configuration
include('../includes/db_config.php');
?>
<!-- Include Header -->
<?php include('../includes/header.php'); ?>

<!-- Welcome message -->
<div class="container mt-4">
    <h1>Welcome to Learning Skill Knowledge Base</h1>
</div>

<!-- Brief overview -->
<div class="container mt-3">
    <p>
        Welcome to the Learning Skill Knowledge Base! This platform provides a collection of educational resources designed to enhance your learning experience. Explore various topics and get access to comprehensive questions and answers that will help you understand key concepts better. Feel free to browse and expand your knowledge!
    </p>
</div>

<div class="container mt-5">
    <h2>All Questions</h2>
    <div id="questionList" class="list-group">
        <?php
        // Query to fetch questions from the database
        $query = "SELECT id, title FROM questions";
        $result = $conn->query($query);

        // Check if there are results
        if ($result->num_rows > 0) {
            // Loop through each row and display it
            while ($row = $result->fetch_assoc()) {
                echo '<a href="question.php?id=' . $row['id'] . '" class="list-group-item list-group-item-action">' . htmlspecialchars($row['title']) . '</a>';
            }
        } else {
            echo '<p>No questions available.</p>';
        }
        ?>
    </div>
</div>

<!-- Include Footer -->
<?php include('../includes/footer.php'); ?>
