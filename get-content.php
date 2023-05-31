<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysite";

// Veritabanı bağlantısını oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sorgu oluşturma
$sql = "SELECT image FROM content";

// Sorguyu çalıştırma ve sonucu alma
$result = $conn->query($sql);

// Sonucu dizi olarak alma
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}

// Sonuçları JSON formatında döndürme
echo json_encode($rows);

// Veritabanı bağlantısını kapatma
$conn->close();
?>