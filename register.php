<?php
include 'db_connect.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

// Check if the username or email already exists
$sql = "SELECT id FROM users WHERE username='$username' OR email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // Insert new user
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
        // Redirect to login page
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Username or email already taken.";
}

$conn->close();
?>
