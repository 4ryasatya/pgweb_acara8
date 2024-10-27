<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgweb_acara8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['kecamatan'])) {
    $id = $conn->real_escape_string($_GET['kecamatan']); // Sanitize input

    // Prepare the DELETE query
    $sql = "DELETE FROM data_kecamatan WHERE kecamatan='$id'";

    // Run the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
        // Redirect back to the main page after deletion
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No Kecamatan provided to delete.";
}

$conn->close();
