<?php
require 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES (:name, :email, :course)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['name' => $name, 'email' => $email, 'course' => $course])) {
        $message = 'Student added successfully.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="page-shell">
        <div class="site-header">
            <div>
                <h1 class="site-title">Add Student</h1>
                <p class="subtitle">Enter the student details below and save them to the database.</p>
            </div>
            <a class="button" href="index.php">Back to List</a>
        </div>

        <div class="card">
            <?php if ($message): ?>
                <div class="notice"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <form method="POST" class="form-grid">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" id="course" name="course" placeholder="Course" required>
                </div>
                <button type="submit" class="submit">Add Student</button>
            </form>
        </div>

        <footer class="footer-note">Style loaded from <code>style.css</code>.</footer>
    </main>
</body>
</html>