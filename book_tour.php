<?php
include 'db_connect.php';

$tour_id = $_POST['tour_id'];
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the user exists and password is correct
$sql = "SELECT id, password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $user_id = $row['id'];
        
        // Book the tour
        $sql = "INSERT INTO bookings (user_id, tour_id) VALUES ('$user_id', '$tour_id')";
        if ($conn->query($sql) === TRUE) {
            echo "Tour booked successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
