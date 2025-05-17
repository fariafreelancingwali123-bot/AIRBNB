<?php
$conn = new mysqli("localhost", "u1fkgwiwpmjub", "mp8cjl5322br", "dbhxpt5zjskggk");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$featured = $conn->query("SELECT * FROM properties ORDER BY rating DESC LIMIT 4");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb Clone - Home</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        /* Container for page */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Search Form Styles */
        .search-form {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .search-form input[type="text"],
        .search-form input[type="date"],
        .search-form button {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
            width: 100%;
            max-width: 250px;
        }

        .search-form input[type="text"] {
            background-color: #fff;
        }

        .search-form input[type="date"] {
            background-color: #fff;
        }

        .search-form button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        /* Featured Properties Section */
        .featured-properties {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .property-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 22%;
            overflow: hidden;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .property-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .property-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .property-card img:hover {
            transform: scale(1.05);
        }

        .property-card h3 {
            font-size: 18px;
            margin: 15px 0;
            color: #333;
        }

        .property-card p {
            font-size: 14px;
            color: #777;
        }

        .property-card a {
            display: inline-block;
            background-color: #28a745;
            padding: 8px 12px;
            color: white;
            border-radius: 5px;
            margin-top: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .property-card a:hover {
            background-color: #218838;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .search-form {
                flex-direction: column;
                gap: 10px;
            }

            .property-card {
                width: 48%;
            }
        }

        @media (max-width: 480px) {
            .property-card {
                width: 100%;
            }

            .search-form input[type="text"],
            .search-form input[type="date"],
            .search-form button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Find Your Perfect Stay</h1>
        <form action="listings.php" method="get" class="search-form">
            <input type="text" name="location" placeholder="Enter location" required>
            <input type="date" name="checkin" required>
            <input type="date" name="checkout" required>
            <button type="submit">Search</button>
        </form>

        <h2>Featured Properties</h2>
        <div class="featured-properties">
            <?php while($row = $featured->fetch_assoc()): ?>
                <div class="property-card">
                    <img src="<?= $row['image_url'] ?>" alt="Property Image">
                    <h3><?= $row['title'] ?></h3>
                    <p><?= $row['location'] ?> - $<?= $row['price'] ?>/night</p>
                    <a href="property.php?id=<?= $row['id'] ?>">View Details</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
