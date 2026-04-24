<?php
// Final contribution fix by Pathy-Pat
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="page-shell">
        <div class="site-header">
            <div>
                <h1 class="site-title">Student Records</h1>
                <p class="subtitle">Browse, edit, and remove students from the database with a clean, modern interface.</p>
            </div>
            <a class="button" href="create.php">Add Student</a>
        </div>

        <div class="card">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $s): ?>
                        <tr>
                            <td><?= htmlspecialchars($s['id']) ?></td>
                            <td><?= htmlspecialchars($s['name']) ?></td>
                            <td><?= htmlspecialchars($s['email']) ?></td>
                            <td><?= htmlspecialchars($s['course']) ?></td>
                            <td class="action-links">
                                <a class="action-link edit" href="edit.php?id=<?= $s['id'] ?>">Edit</a>
                                <a class="action-link delete" href="delete.php?id=<?= $s['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <footer class="footer-note">Built with PHP, PDO, and simple reusable styling.</footer>
    </main>
</body>
</html>