<?php
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

// Query untuk mengambil semua kolom dari tabel 'latihan'
$sql = "SELECT * FROM latihan";
$result = $conn->query($sql);
echo "<a href='input/index.html'>Input</a>";

if ($result->num_rows > 0) {
    echo "<table border='1px'>
    <tr>
        <th>ID</th>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
    </tr>";

    // Output data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID"] . "</td>
            <td>" . $row["Kecamatan"] . "</td>
            <td>" . $row["Longitude"] . "</td>
            <td>" . $row["Latitude"] . "</td>
            <td>" . $row["Luas"] . "</td>
            <td align='right'>" . $row["Jumlah_Penduduk"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>