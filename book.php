<?php
$conn = new mysqli("localhost", "u1fkgwiwpmjub", "mp8cjl5322br", "dbhxpt5zjskggk");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $conn->query("INSERT INTO bookings (property_id, name, checkin, checkout) VALUES ($id, '$name', '$checkin', '$checkout')");
    echo "✅ Booking Confirmed!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Property</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Book This Property</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="date" name="checkin" required>
        <input type="date" name="checkout" required>
        <button type="submit">Confirm Booking</button>
    </form>
</body>
</html>
