<?php
session_start();

// MySQL bağlantısı için gerekli bilgileri girin
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysite";

// MySQL bağlantısını oluşturun
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol edin
if ($conn->connect_error) {
    die("MySQL bağlantısı başarısız: " . $conn->connect_error);
}

// Formdan gelen verileri al
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Veritabanına kaydet
$insertSql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($insertSql) === TRUE) {
    echo "<p>Mesajınız başarıyla gönderildi. Teşekkür ederiz!</p>";
} else {
    echo "<p>Mesaj gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyin.</p>";
}

// MySQL bağlantısını kapat
$conn->close();
?>