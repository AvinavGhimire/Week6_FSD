<?php


include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $quantity = (int)$_POST['quantity'];
    
    if (empty($title) || empty($author) || empty($category) || $quantity < 1) {
        echo "<script>alert('All fields are required!'); window.location.href='index.php';</script>";
        exit;
    }
    
    $sql = "INSERT INTO books (title, author, category, quantity) 
            VALUES ('$title', '$author', '$category', $quantity)";
    
    if (mysqli_query($conn, $sql)) {
 
        echo "<script>alert('Book added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='index.php';</script>";
    }
    
    mysqli_close($conn);
    
} else {

    header('Location: index.php');
    exit;
}
?>