<!DOCTYPE html>
<html>
<head>
    <title>Tour Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .tour-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .tour-container h1 {
            text-align: center;
        }
        .tour {
            margin: 20px 0;
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        .tour:last-child {
            border-bottom: none;
        }
        .tour h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="tour-container">
        <h1>Tour Details</h1>
        <?php
        include 'db_connect.php';

        // Fetch tour details
        $sql = "SELECT * FROM tours";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='tour'>";
                echo "<h2>Tour ID: " . $row["id"] . "</h2>";
                echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
                echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                echo "<p><strong>Price:</strong> $" . $row["price"] . "</p>";
                echo "<p><strong>Available From:</strong> " . $row["available_from"] . "</p>";
                echo "<p><strong>Available To:</strong> " . $row["available_to"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No tours available.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
