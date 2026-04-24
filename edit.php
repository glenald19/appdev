<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if (!$student) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['name'], $_POST['email'], $_POST['course'], $id]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="page-shell">
        <div class="site-header">
            <div>
                <h1 class="site-title">Edit Student</h1>
                <p class="subtitle">Update the student information and save the changes.</p>
            </div>
            <a class="button" href="index.php">Back to List</a>
        </div>

        <div class="card">
            <form method="POST" class="form-grid">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" id="course" name="course" value="<?= htmlspecialchars($student['course']) ?>" required>
                </div>
                <button type="submit" class="submit">Update Student</button>
            </form>
        </div>

        <footer class="footer-note">Enjoy the new styling and smoother page experience.</footer>
    </main>
</body>
</html>