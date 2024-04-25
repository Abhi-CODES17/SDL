<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

require_once('db_config.php');

$username = $_SESSION['username'];
$title = $_POST['title'];
$description = $_POST['description'];

$sql = "SELECT id FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$user_id = $row['id'];

$sql = "INSERT INTO complaints (user_id, title, description) VALUES ('$user_id', '$title', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Complaint submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
