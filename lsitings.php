<?php
$conn = new mysqli("localhost", "u1fkgwiwpmjub", "mp8cjl5322br", "dbhxpt5zjskggk");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$location = $_GET['location'];
$query = "SELECT * FROM properties WHERE location LIKE '%$location%'";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Listings - Airbnb Clone</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Properties in <?= htmlspecialchars($location) ?></h1>
    <div class="property-list">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="property-card">
                <img src="<?= $row['image_url'] ?>" alt="Property">
                <h3><?= $row['title'] ?></h3>
                <p>$<?= $row['price'] ?>/night - <?= $row['location'] ?></p>
                <a href="property.php?id=<?= $row['id'] ?>">View Details</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
