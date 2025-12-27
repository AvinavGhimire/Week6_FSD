<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if (isset($_POST['update'])) {
    $stmt = $conn->prepare(
        "UPDATE students SET name=?, email=?, course=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['course'],
        $id
    ]);

    header("Location: index.php");
}
?>

<h2>Edit Student</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $student['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $student['email']; ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $student['course']; ?>"><br><br>
    <button type="submit" name="update">Update</button>
</form>
