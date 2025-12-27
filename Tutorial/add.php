<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $stmt = $conn->prepare(
        "INSERT INTO students (name, email, course) VALUES (?, ?, ?)"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['course']
    ]); 

    header("Location: index.php");
}
?>

<h2>Add Student</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    <button type="submit" name="submit">Add Student</button>
</form>
