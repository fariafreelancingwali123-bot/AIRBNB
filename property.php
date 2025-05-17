<?php
$conn = new mysqli("localhost", "u1fkgwiwpmjub", "mp8cjl5322br", "dbhxpt5zjskggk");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM properties WHERE id = $id");
$property = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $property['title'] ?> - Airbnb Clone</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?= $property['title'] ?></h1>
    <img src="<?= $property['image_url'] ?>" alt="Image">
    <p><?= $property['description'] ?></p>
    <p>Location: <?= $property['location'] ?></p>
    <p>Price: $<?= $property['price'] ?>/night</p>
    <a href="book.php?id=<?= $property['id'] ?>">Book Now</a>
</body>
</html>
