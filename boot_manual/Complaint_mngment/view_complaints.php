<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

require_once('db_config.php');

$username = $_SESSION['username'];

$sql = "SELECT id FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$user_id = $row['id'];

$sql = "SELECT * FROM complaints WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. " - Description: " . $row["description"]. " - Status: " . $row["status"]. "<br>";
    }
} else {
    echo "No complaints found.";
}

$conn->close();
?>
