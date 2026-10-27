<?php
// Tangkap data dari form (termasuk longitude & latitude)
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Sesuaikan dengan setting MySQL lokal
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan"; // Nama database kamu

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query INSERT sesuai nama tabel 'latihan' dan kolom di phpMyAdmin lokal
$sql = "INSERT INTO latihan (Kecamatan, Longitude, Latitude, Luas, Jumlah_Penduduk)
        VALUES ('$kecamatan', $longitude, $latitude, $luas, $jumlah_penduduk)";

if ($conn->query($sql) === TRUE) {
    // Redirect langsung kembali ke index.php setelah berhasil menginput data
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>