<?php
include 'db.php';

$search = "";
if (isset($_GET['category'])) {
    $search = $_GET['category'];
    $result = mysqli_query($conn, "SELECT * FROM books WHERE category LIKE '%$search%'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM books");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Book</h2>
<form action="add_book.php" method="post">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="text" name="category" placeholder="Category" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <button type="submit">Add Book</button>
</form>

<h2>Search by Category</h2>
<form method="get">
    <input type="text" name="category" placeholder="Enter category">
    <button type="submit">Search</button>
</form>

<h2>Book List</h2>
<table>
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Quantity</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['book_id']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td>
        <a href="delete_book.php?id=<?php echo $row['book_id']; ?>" onclick="return confirm('Delete this book?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
