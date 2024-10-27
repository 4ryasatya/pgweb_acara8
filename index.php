<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <link rel="stylesheet" href="style_table.css"> <!-- Link to CSS file -->
</head>
<body>
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
$sql = "SELECT kecamatan, luas_km2, longitude, latitude, jumlah_penduduk FROM data_kecamatan";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
    <th>Kecamatan</th>
    <th>Luas (km2)</th>
    <th>Longitude</th>
    <th>Latitude</th>
    <th>Jumlah Penduduk</th>
    <th>Delete Action</th>";

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["kecamatan"] . "</td><td>" .
            $row["luas_km2"] . "</td><td align='right'>" .
            $row["longitude"] . "</td><td>" .
            $row["latitude"] . "</td><td>" .
            $row["jumlah_penduduk"] . "</td>" .
            "<td><a href='delete.php?kecamatan=" . urlencode($row['kecamatan']) . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td></tr>";

        // Add a delete link with the row's ID, pointing to input.php
        // echo "<td><a href='input.php?action=delete&id=" . $row['kecamatan'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>

