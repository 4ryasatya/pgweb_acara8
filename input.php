<?php
$kecamatan = $_POST['kecamatan'];
$luas = $_POST['luas_km2'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];
$long = $_POST['longitude'];
$lat = $_POST['latitude'];

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

$sql = "INSERT INTO data_kecamatan (kecamatan, luas_km2, longitude, latitude, jumlah_penduduk) 
VALUES ('$kecamatan', $luas, $long, $lat, $jumlah_penduduk)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
//header("Location: index.html");
//exit;
