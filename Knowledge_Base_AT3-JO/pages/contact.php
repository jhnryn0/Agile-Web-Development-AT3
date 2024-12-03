<?php
// Include database configuration
include('../includes/db_config.php');

// Initialize variables
$name = $email = $message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $email, $message); // Bind the parameters to the SQL query
        if ($stmt->execute()) {
            // Success message
            echo "<div class='alert alert-success' role='alert'>Your message has been sent successfully!</div>";
        } else {
            // Error message
            echo "<div class='alert alert-danger' role='alert'>There was an error sending your message. Please try again later.</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error in preparing the query.</div>";
    }

    $conn->close();
}
?>
<body>
    <!-- Include Header -->
    <?php include('../includes/header.php'); ?>

    <!-- Main Content Section -->
    <div class="container mt-5">
        <h1>Contact Us</h1>
        <p>If you have any questions, feel free to reach out to us:</p>

        <!-- Contact Info Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Email</h3>
                <p>contact@citewebapp.com</p>
            </div>
            <div class="col-md-6">
                <h3>Phone</h3>
                <p>+123-456-7890</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Address</h3>
                <p>123 CITE Street, Perth, WA 6000</p>
            </div>
        </div>

        <!-- External Links Section -->
        <div class="mt-5">
            <h2>Useful Links</h2>
            <p>Visit the following websites for more information:</p>
            <a href="https://www.citems.com.au" class="btn btn-primary me-3" target="_blank">Visit CITEMS Website</a>
            <a href="https://www.southmetrotafe.wa.edu.au" class="btn btn-secondary" target="_blank">Visit South Metropolitan TAFE</a>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="container mt-5" style="min-height: 50vh;">
        <form method="POST" action="contact.php" class="row g-3 needs-validation" novalidate>
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                <div class="invalid-feedback">Please enter your name.</div>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                <div class="invalid-feedback">Please enter your email.</div>
            </div>
            <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required><?php echo $message; ?></textarea>
                <div class="invalid-feedback">Please enter a message.</div>
            </div>
            <div class="col-10">
                <br>
                <button class="btn btn-primary" type="submit">Send Message</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap validation
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>

    <!-- Include Footer -->
    <?php include('../includes/footer.php'); ?>
</body>
</html>
