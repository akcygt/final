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

// Formdan gönderilen verileri alın
$contentID = $_POST['contentid'];
$comment = $_POST['comment'];

// Oturum açmış kullanıcının adını alın
$username = $_SESSION['username'];

// Yorumu veritabanına ekle
$sql = "INSERT INTO comments (contentid, username, comment) VALUES ('$contentID', '$username', '$comment')";

if ($conn->query($sql) === TRUE) {
    header("Location: contents.php?id=$contentID");
    exit();
} else {
    echo "<p>Yorum eklenirken bir hata oluştu: " . $conn->error . "</p>";
}

// MySQL bağlantısını kapatın
$conn->close();
?>