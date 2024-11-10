<?php

session_start();

// Configuration for this page
$pageConfig = [
    'title' => 'Add New Law',
    'styles' => ["../dashboard.css"],
    'scripts' => ["../dashboard.js"],
    'authRequired' => true
];

// Include the header
include_once "../../includes/header.php";

// Database connection
include_once "../../db/connect.php";

// Initialize a message variable
$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are set and not empty
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['fine_amount'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $description = $conn->real_escape_string($_POST['description']);
        $fine_amount = $conn->real_escape_string($_POST['fine_amount']);

        $sql = "INSERT INTO offense (title, description, fine_amount, created_at, updated_at) 
                VALUES ('$title', '$description', '$fine_amount', NOW(), NOW())";

        if ($conn->query($sql) === TRUE) {
            // Redirect to prevent form resubmission
            header("Location: index.php?success=1");
            exit();
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}

// Check for success message in URL after redirect
if(isset($_SESSION['success_message'])){
    $message =$_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

?>

<main>
    <?php include_once "../includes/navbar.php"; ?>
    <div class="dashboard-layout">
        <?php include_once "../includes/sidebar.php"; ?>
        
        <!-- Main content area -->
        <div class="content">
            <div class="container">
                <h2>Add New Law</h2>

                <?php if (!empty($message)) : ?>
                    <p class="message"><?= htmlspecialchars($message); ?></p>
                <?php endif; ?>

                <form action="index.php" method="POST">
                    <div class="field">
                        <label for="title">Title:</label>
                        <input type="text" class="input" id="title" name="title" required>
                    </div>

                    <div class="field">
                        <label for="description">Description:</label>
                        <textarea id="description" class="input" name="description" required></textarea>
                    </div>
                      
                    <div class="field">
                        <label for="fine_amount">Fine Amount:</label>
                        <input type="number" step="0.01" id="fine_amount" class="input" name="fine_amount" required>
                    </div>

                    <button type="submit" class="btn">Add Law</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once "../../includes/footer.php"; ?>
