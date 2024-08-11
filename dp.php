<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task1_cp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data_value = isset($_GET['Data']) ? $_GET['Data'] : '';

// To define th Data
$allowed_data = ['front', 'back', 'left', 'right', 'stop'];

// Insert into database
if (in_array($data_value, $allowed_data)) {
    $stmt = $conn->prepare("INSERT INTO control_panel (Data) VALUES (?)");
    $stmt->bind_param("s", $data_value);
    $stmt->execute();
    $stmt->close();
    
    // Store the last clicked button
    $_SESSION['last_button'] = $data_value;
}

$conn->close();

// Redirect back to the Remote
header("Location: index.php");
exit();
?>
