<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

require_once('db_config.php');

$sql = "SELECT * FROM complaints";
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
